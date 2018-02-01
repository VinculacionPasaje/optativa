class ActorsController < ApplicationController
	layout 'base'

	def index
		@actors = Actor.where(:state => '1')
	end


	def new
		@actor = Actor.new
	end

	def show
		@actor = Actor.find(params[:id])
		@actor.update(:state => "0")
		redirect_to actors_path

	end



	def edit
		@actor = Actor.find(params[:id])
	end


	def create
		@actor = Actor.new actor_params

		if @actor.save
			flash[:success] = "Registro guardado correctamente!"
		
		else
			flash[:danger] = "Error! No se pudo guardar !"

		end
		redirect_to :controller => 'actors', :action => 'new'

	end

	def update
		@actor = Actor.find(params[:id])
		if @actor.update(actor_params)
			redirect_to actors_path
		else 
			render :new
		end


	end

	def destroy
		@actor = Actor.find(params[:id])
		@actor.destroy
		redirect_to actors_path

	end

	private 
	def actor_params
		params.require(:actor).permit :name, :last_name, :birthdate
	end
end
