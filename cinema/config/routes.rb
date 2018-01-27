Rails.application.routes.draw do
  # For details on the DSL available within this file, see http://guides.rubyonrails.org/routing.html
  #get '/actors', to: 'actors#index'
  #get '/actors/new', to: 'actors#new'
  #post '/actors', to: 'actors#create'
  #get '/actors/:id/edit', to: 'actors#edit', as: 'edit_actor'
  #patch'/actors/:id', to: 'actors#update'
  #put'/actors/:id', to: 'actors#update'
  #get '/actors/:id', to: 'actors#show', as: 'actor'
  ##delete '/actors/:id', to: 'actors#delete'

  resources :actors
  get '/series', to: 'series#index'
  get '/series/new', to: 'series#new'
  post '/series', to: 'series#create'
  get '/series/:id/edit', to: 'series#edit', as: 'edit_serie'
  patch'/series/:id', to: 'series#update'
  put'/series/:id', to: 'series#update'
  get '/series/:id', to: 'series#show', as: 'serie'
  
  get '/seasons', to: 'seasons#index'
  get '/seasons/new', to: 'seasons#new'
  post '/seasons', to: 'seasons#create'
  get '/seasons/:id/edit', to: 'seasons#edit', as: 'edit_season'
  patch'/seasons/:id', to: 'seasons#update'
  put'/seasons/:id', to: 'seasons#update'
  get '/seasons/:id', to: 'seasons#show', as: 'season'

  get '/chapters', to: 'chapters#index'
  get '/chapters/new', to: 'chapters#new'
  post '/chapters', to: 'chapters#create'
  get '/chapters/:id/edit', to: 'chapters#edit', as: 'edit_chapter'
  patch'/chapters/:id', to: 'chapters#update'
  put'/chapters/:id', to: 'chapters#update'
  get '/chapters/:id', to: 'chapters#show', as: 'chapter'




end
