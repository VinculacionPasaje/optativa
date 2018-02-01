class Chapter < ApplicationRecord
	belongs_to :season
	before_save :default_values

	has_many :servers_chapters
	def default_values
	    self.state ||= '1' 

	end
end
