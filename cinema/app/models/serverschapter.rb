class Serverschapter < ApplicationRecord
	belongs_to :language
	belongs_to :chapter

	before_save :default_values
	def default_values
	    self.state ||= '1' 

	end
end
