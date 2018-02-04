<?php

namespace App\Http\Controllers;



use App\Http\Requests\SubscriptionRequest;
use Illuminate\Http\Request;

use App\Subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class SubscriptionController extends Controller
{
     public function index(){
        $subscripciones = Subscription::where('state',1)->orderBy('id')->paginate(10);
        return View('administration.subscripciones.index',compact('subscripciones'));

    }
    public function create(){
        
    }

    public function store(ExpositoresRequest $request){


    }

    public function edit($id){
       

    }

    public function update(ExpositoresEditRequest $request, $id){
   



    }

    public function destroy($id, Request $request)
    {
        $subscripciones = Subscription::find($id);
        $subscripciones->state = 0;
        $subscripciones->save();

        $message = "Subscripción dada de baja";
        if ($request->ajax()) {
            return response()->json([
                'id'      => $subscripciones->id,
                'message' => $message
            ]);
        }
    }
}
