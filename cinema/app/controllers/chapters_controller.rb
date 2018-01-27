class ChaptersController < ApplicationController
	layout 'base'

	def index
		@chapters = Chapter.where(:state => '1')
	end

	def new
		@chapter = Chapter.new
		@seasons= Season.where(:state => '1')
	end

	def show
		@chapter = Chapter.find(params[:id])
		@chapter.update(:state => "0")
		redirect_to chapters_path

	end
	def edit
		@chapter = Chapter.find(params[:id])
		@seasons= Season.where(:state => '1')

	end

	def create
		@chapter = Chapter.new chapter_params

		if @chapter.save
			flash[:success] = "Registro guardado correctamente!"
		
		else
			flash[:danger] = "Error! No se pudo guardar !"

		end
		redirect_to :controller => 'chapters', :action => 'new'

	end


	def update
		@chapter = Chapter.find(params[:id])
		if @chapter.update(chapter_params)
			redirect_to chapters_path
		else 
			render :new
		end


	end


	private 
	def chapter_params
		params.require(:chapter).permit :name, :season_id
	end
end
