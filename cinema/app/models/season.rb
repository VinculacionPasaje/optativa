class Season < ApplicationRecord
	belongs_to :serie
	has_many :chapters
	FOTOS = 'C:/xampp/htdocs/optativa/cinema2', 'public', 'fotos'


	before_save :default_values
	def default_values
	    self.state ||= '1' 

	end

	#validates :name, :year, :description, :director, :productora, :photo, :path, :category_id



	after_save :guardar_foto, :guardar_cover
	def photo=(file_data)
		unless file_data.blank?
			@file_data = file_data
			self.path = file_data.original_filename
		end
	end

	def photo_filename
		File.join FOTOS, "#{id}.#{path}"
	end

	

	def guardar_foto
		if @file_data
			FileUtils.mkdir_p FOTOS
			File.open(photo_filename, 'wb') do |f|
				f.write(@file_data.read)
			end

		end
	end

	#para cover
	def coverphoto=(file_data)
		unless file_data.blank?
			@file_data = file_data
			self.cover = file_data.original_filename
		end
	end

	def cover_filename
		File.join FOTOS, "#{id}.#{cover}"
	end

	

	def guardar_cover
		if @file_data
			FileUtils.mkdir_p FOTOS
			File.open(cover_filename, 'wb') do |f|
				f.write(@file_data.read)
			end

		end
	end

end
