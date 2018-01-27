class Chapter < ApplicationRecord
	belongs_to :season
	before_save :default_values
	def default_values
	    self.state ||= '1' 

	end
end
