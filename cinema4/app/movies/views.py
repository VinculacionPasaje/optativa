from django.shortcuts import render, redirect
from app.movies.forms import CategoriaForm, ActorForm, MovieForm
from django.contrib import messages
from django.db import connection
from django.core.files.storage import FileSystemStorage

# Create your views here.
def index(request):
    return render(request, 'movies/index.html');

def categoria_create(request):
    if request.method=='POST':
        form= CategoriaForm(request.POST)
        if form.is_valid():
            #el form.save() guarda los datos del formulario pero para guardar con stored procedure se utiliza el cursor
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("insert_categorie", (request.POST['categorie'],))
            cursor.close()
            messages.success(request, 'Categoria agregada correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:categoria_crear')
    else:
        form= CategoriaForm()
    return render(request, 'movies/categorias_form.html', {'form': form})

def actor_create(request):
    if request.method=='POST':
        form= ActorForm(request.POST)
        if form.is_valid():
            #el form.save() guarda los datos del formulario pero para guardar con stored procedure se utiliza el cursor
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("insert_actor", (request.POST['name'],request.POST['last_name'],request.POST['birthdate'],))
            cursor.close()
            messages.success(request, 'Actor agregado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:actor_crear')
    else:
        form= ActorForm()
    return render(request, 'movies/actor_form.html', {'form': form})

def movie_create(request):
    if request.method=='POST':
        

        form= MovieForm(request.POST, request.FILES)
       
      
      
        if form.is_valid():
            
            #el form.save() guarda los datos del formulario pero para guardar con stored procedure se utiliza el cursor
            #form.save()
            foto = request.FILES['path']  #obtengo la imagen
            nombre_imagen=  foto.name # me da el nombre de la imagen por ejemplo -> imagen.jpg
      
            fs = FileSystemStorage()
            filename = fs.save(foto.name, foto) # me guarda la foto en el server
            uploaded_file_url = fs.url(filename) # me da la ruta del archivo -> /media/imagen.jpg
            
          
            cursor = connection.cursor()
            cursor.callproc("insert_movie", (request.POST['name'],request.POST['year'],request.POST['description'],request.POST['duration'], request.POST['productora'],nombre_imagen,request.POST['director'],request.POST['categories'],))
            cursor.close()

            cursor2 = connection.cursor()
            cursor2.execute("BEGIN")
            cursor2.callproc("SELECT_ID_MOVIE", [request.POST['name'],request.POST['year']])
            id_movies = cursor2.fetchall()
            cursor2.execute("COMMIT")
            cursor2.execute("END")
            cursor2.close()


            for item in id_movies:
                id_movie = item
            
            actores = request.POST.getlist('actors')  #aqui obtengo todos los id de los actores
            cursor3 = connection.cursor()
            for actor in actores:
                cursor3.callproc("insert_movie_actor", (id_movie,actor)) #aqui se llena la tabla de mucho a muchos movies_actors
            
            
            cursor3.close()

            messages.success(request, 'Pelicula agregado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:movie_crear')
    else:
        form= MovieForm()
    return render(request, 'movies/movie_form.html', {'form': form})


