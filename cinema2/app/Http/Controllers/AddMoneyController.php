<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Validator;
use URL;
use Session;
use Redirect;
use Illuminate\Support\Facades\Input;
/** All Paypal Details class **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use DB;
use PDO;
use \Datetime;
use Illuminate\Support\Facades\Auth;

class AddMoneyController
{
    private $_api_context;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
        
        /** setup PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    /**
     * Show the application paywith paypalpage.
     *
     * @return \Illuminate\Http\Response
     */
    public function payWithPaypal()
    {
       
            if(Auth::check()){
                $id = Auth::user()->id;
                $subscription = DB::select("SELECT get_subscription($id) AS mfrc FROM dual"); 
            }else{
                $subscription=0;
            }
        

        if(count($subscription)){
         $fecha_actual=date("Y-m-d");


         $datetime = $subscription[0]->date_end; 
         $dt= strtotime($datetime); //make timestamp with datetime string 

         $fecha_fin= date('Y-m-d', $dt);

         $datetime1 = new DateTime($fecha_actual);
         $datetime2 = new DateTime($fecha_fin);

        $diff = $datetime1->diff($datetime2);


        }

        
        
        #dd($diff->days . ' days ');
         return view('administration.premium.index', compact('subscription', 'diff'));
    }
    /**
     * Store a details of payment with paypal.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postPaymentWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Subscripción Premium Cinema Tv') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice(0.15); /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(0.15);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Pago por realizar subscripción mensual a Cinema TV');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('payment.status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                \Session::put('error','Connection timeout');
                return Redirect::route('addmoney.paywithpaypal');
                /** echo "Exception: " . $ex->getMessage() . PHP_EOL; **/
                /** $err_data = json_decode($ex->getData(), true); **/
                /** exit; **/
            } else {
                \Session::put('error','Ocurrio algún error, lo sentimos por el incoveniente');
                return Redirect::route('addmoney.paywithpaypal');
                /** die('Some error occur, sorry for inconvenient'); **/
            }
        }
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        \Session::put('error','Ah ocurrido un error');
        return Redirect::route('addmoney.paywithpaypal');
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error','Pago fallido');
            return Redirect::route('addmoney.paywithpaypal');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') { 

            $id = Auth::user()->id;
            $subscription = DB::select("SELECT get_subscription($id) AS mfrc FROM dual"); 
        

            if(count($subscription)){

            $fecha_actual=date("d/m/Y");

            $fecha_actual2=date("d-m-Y");

          
            $nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha_actual2 ) ) ;
            $nuevafecha2 = date ( 'd/m/Y' , $nuevafecha );

                    //se hace un update A LOS CAMPOS STATE, DATE_START, DATE_END DEL registro del usuario en la tabla subscripcion
                     DB::update('call UPDATE_SUBSCRIPCION(?,?,?,?)',[$id, $fecha_actual, $nuevafecha2, '1']);

            }else{

            $fecha_actual=date("d/m/Y");

            $fecha_actual2=date("d-m-Y");

          
            $nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha_actual2 ) ) ;
            $nuevafecha2 = date ( 'd/m/Y' , $nuevafecha );

                //se hace un insert a la tabla subscripcion

            //PARA EJECUTAR STORED PROCEDURED INSER con CALL EN PLSQL
            DB::insert('call insert_subscripcion(?,?,?,?)',[$fecha_actual, $nuevafecha2, $id, 1]);


            }
            
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            \Session::put('success','Pago realizado correctamente');
            return Redirect::route('addmoney.paywithpaypal');
        }
        \Session::put('error','Error al realizar el pago');
        return Redirect::route('addmoney.paywithpaypal');
    }
  }
