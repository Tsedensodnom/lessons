Rails.application.routes.draw do
    get '/', to: 'home#index'
    get '/about', to: 'home#about'
    get '/contact', to: 'home#contact'
    
    get '/page/:id', to: 'home#page'
end
