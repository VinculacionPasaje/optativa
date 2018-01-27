class Actor < ApplicationRecord
	before_save :default_values
	def default_values
	    self.state ||= '1' 
	end

	validates :name, :lastname, :birthday, presence: true




end
