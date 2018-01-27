class SeriesController < ApplicationController
		layout 'base'

	def index
		@series = Serie.where(:state => '1')
	end

	def new
		@serie = Serie.new
		@categories= Category.where(:state => '1')
	end

	def show
		@serie = Serie.find(params[:id])
		@serie.update(:state => "0")
		redirect_to series_path

	end
	def edit
		@serie = Serie.find(params[:id])
		@categories= Category.where(:state => '1')

	end

	def create
		@serie = Serie.new serie_params

		if @serie.save
			flash[:success] = "Registro guardado correctamente!"
		
		else
			flash[:danger] = "Error! No se pudo guardar !"

		end
		redirect_to :controller => 'series', :action => 'new'

	end


	def update
		@serie = Serie.find(params[:id])
		if @serie.update(serie_params)
			redirect_to series_path
		else 
			render :new
		end


	end


	private 
	def serie_params
		params.require(:serie).permit :name, :year, :description, :director, :productora, :photo, :path, :category_id, :trailer
	end


end
