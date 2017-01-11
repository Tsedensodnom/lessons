class HomeController < ApplicationController
    def index
        @title = "Custom title"
        @content = "Custom content text"
    end
    
    def about
    end
    
    def contact
    end
    
    def page
        @id = params[:id]
    end
end