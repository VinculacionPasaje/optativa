class Serie< ApplicationRecord
	belongs_to :category
	has_many :seasons

	has_many :actors_series
	has_many :actors, through: :actors_series
	attr_reader :actors
	def actors=(value)
		@actors = value

	end

	after_create  :save_actors

	def save_actors
		@actors.each do |actor_id|
			ActorsSeries.create(actor_id: actor_id, serie_id: self.id)
		end
	end

	def update_actors
		ActorsSeries.where(serie_id: self.id).delete_all
	end

	FOTOS = 'C:/xampp/htdocs/optativa/cinema2', 'public', 'fotos'
	DEFAULT = Rails.root, 'public', 'photo_store'


	before_save :default_values,:update_actors, :save_actors
	def default_values
	    self.state ||= '1' 

	end

	#validates :name, :year, :description, :director, :productora, :photo, :path, :category_id



	after_save :guardar_foto
	def photo=(file_data)
		unless file_data.blank?
			@file_data = file_data
			self.path = file_data.original_filename
		end
	end

	

	def photo_namephoto
		"/fotos/#{id}.#{path}"
	end

	def has_photo?
		File.exist? photo_filename
	end

	def photo_filename
		File.join FOTOS, "#{id}.#{path}"
	end

	def photo_filename2
		File.join DEFAULT, "#{id}.#{path}"
	end


	def guardar_foto
		if @file_data
			FileUtils.mkdir_p FOTOS
			File.open(photo_filename, 'wb') do |f|
				f.write(@file_data.read)
			end

		end
	end

	
	



end
