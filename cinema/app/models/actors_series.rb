class ActorsSeries < ApplicationRecord
	self.table_name = "actors_series"
  belongs_to :actor
  belongs_to :serie
end
