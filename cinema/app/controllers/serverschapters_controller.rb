class ServerschaptersController < ApplicationController

	layout 'base'

	def index
		@serverschapters = Serverschapter.where(:state => '1')
	end

	def new
		@serverschapter = Serverschapter.new
		@languages= Language.where(:state => '1')
		@chapters= Chapter.where(:state => '1')

	end

	def show
		@serverschapter = Serverschapter.find(params[:id])
		@serverschapter.update(:state => "0")
		redirect_to serverschapters_path

	end

	def edit
		@serverschapter= Serverschapter.find(params[:id])
		@languages= Language.where(:state => '1')
		@chapters= Chapter.where(:state => '1')

	end

	def update
		@serverschapter= Serverschapter.find(params[:id])
		if @serverschapter.update(serverschapters_params)
			redirect_to serverschapters_path
		else 
			render :new
		end


	end


	def create
		@serverschapter = Serverschapter.new serverschapters_params

		if @serverschapter.save
			flash[:success] = "Registro guardado correctamente!"
		
		else
			flash[:danger] = "Error! No se pudo guardar !"

		end
		redirect_to :controller => 'serverschapters', :action => 'new'

	end

	private 
	def serverschapters_params
		params.require(:serverschapter).permit :name, :embed_code, :language_id, :chapter_id
	end

end
