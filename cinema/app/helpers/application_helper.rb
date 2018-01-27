module ApplicationHelper
	def date_mdY(date)
		  if date.nil?
		    ""
		  else
		    Date.parse(date).strftime("%Y-%m-%d")

		  end
	end
end
