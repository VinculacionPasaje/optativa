class SeasonsController < ApplicationController
	layout 'base'

	def index
		@seasons = Season.where(:state => '1')
	end

	def new
		@season = Season.new
		@series= Serie.where(:state => '1')
	end

	def show
		@season = Season.find(params[:id])
		@season.update(:state => "0")
		redirect_to seasons_path

	end
	def edit
		@season = Season.find(params[:id])
		@series= Serie.where(:state => '1')

	end

	def create
		@season = Season.new season_params

		if @season.save
			flash[:success] = "Registro guardado correctamente!"
		
		else
			flash[:danger] = "Error! No se pudo guardar !"

		end
		redirect_to :controller => 'seasons', :action => 'new'

	end


	def update
		@season = Season.find(params[:id])
		if @season.update(season_params)
			redirect_to seasons_path
		else 
			render :new
		end


	end


	private 
	def season_params
		params.require(:season).permit :season, :year, :description,:photo, :path, :serie_id
	end
end
