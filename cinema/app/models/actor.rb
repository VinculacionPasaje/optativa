class Actor < ApplicationRecord
	before_save :default_values

	has_many :actors_series
	has_many :series, through: :actors_series


	def default_values
	    self.state ||= '1' 
	end

	validates :name, :last_name, :birthdate, presence: true




end
