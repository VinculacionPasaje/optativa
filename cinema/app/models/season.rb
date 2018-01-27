class Season < ApplicationRecord
	belongs_to :serie
	has_many :chapters
	FOTOS = 'C:/xampp/htdocs/optativa/cinema2', 'public', 'fotos'


	before_save :default_values
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

	


	def guardar_foto
		if @file_data
			FileUtils.mkdir_p FOTOS
			File.open(photo_filename, 'wb') do |f|
				f.write(@file_data.read)
			end

		end
	end

end
