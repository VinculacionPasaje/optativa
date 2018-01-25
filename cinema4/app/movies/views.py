from django.shortcuts import render, redirect
from app.movies.forms import CategoriaForm, ActorForm, MovieForm
from django.contrib import messages
from django.db import connection
from django.core.files.storage import FileSystemStorage
import cx_Oracle 
from PIL import Image
from app.movies.models import Categorie, Actor, Movie
from django.core.paginator import Paginator, EmptyPage, PageNotAnInteger

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
            print(request.POST['birthdate'])
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
            
            nameimg =foto.name
            path= 'C:\\xampp\\htdocs\\optativa\\cinema4\\media\\'
            imagpath = path+nameimg
            imag = Image.open (imagpath,mode='r')
            imag.save('C:\\xampp\\htdocs\\optativa\\cinema2\\public\\fotos\\'+foto.name)
            
          
            cursor = connection.cursor()
            cursor.callproc("insert_movie", (request.POST['name'],request.POST['year'],request.POST['description'],request.POST['duration'], request.POST['productora'],nombre_imagen,request.POST['director'],request.POST['categories'],request.POST['trailer'],))
            cursor.close()

            cursor2 = connection.cursor()
            result = cursor2.callfunc('SELECT_ID_MOVIE', cx_Oracle.NUMBER, [request.POST['name'],request.POST['year']] )
            cursor2.close()


            
            
            actores = request.POST.getlist('actors')  #aqui obtengo todos los id de los actores
            cursor3 = connection.cursor()
            for actor in actores:
                cursor3.callproc("insert_movie_actor", (result,actor)) #aqui se llena la tabla de mucho a muchos movies_actors
            
            
            cursor3.close()

            messages.success(request, 'Pelicula agregado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:movie_crear')
    else:
        form= MovieForm()
    return render(request, 'movies/movie_form.html', {'form': form})

def categoria_listar(request):
    djangoCursor = connection.cursor()
    cursor = djangoCursor.connection.cursor()

    #cursor = connection.cursor()
    #cursor.execute("select * from CATEGORIES where state=1")
    #categoria = cursor.fetchall()


    resultado = cursor.var(cx_Oracle.CURSOR)
    estado=1
    cursor.callproc('SELECT_CATEGORIA_ALL', (estado,resultado))
    categoria= resultado.getvalue().fetchall()
    cursor.close()
    
   
    
   
    
    #categoria= Categorie.objects.all().filter(state=1);
    
 
    page = request.GET.get('page', 1)
    paginator = Paginator(categoria, 3)
    try:
        cat = paginator.page(page)
    except PageNotAnInteger:
        cat = paginator.page(1)
    except EmptyPage:
        cat = paginator.page(paginator.num_pages)
    
    contexto={'categorias': cat}
    
    return render(request, 'movies/categorias_listar.html', contexto)


def actor_listar(request):
    djangoCursor = connection.cursor()
    cursor = djangoCursor.connection.cursor()

    #cursor = connection.cursor()
    #cursor.execute("select * from CATEGORIES where state=1")
    #categoria = cursor.fetchall()

    
    resultado = cursor.var(cx_Oracle.CURSOR)
    estado=1
    cursor.callproc('SELECT_ACTORES_ALL', (estado,resultado))
    actores= resultado.getvalue().fetchall()
    cursor.close()
    
   
    
   
    
    #categoria= Categorie.objects.all().filter(state=1);
    
 
    page = request.GET.get('page', 1)
    paginator = Paginator(actores, 3)
    try:
        cat = paginator.page(page)
    except PageNotAnInteger:
        cat = paginator.page(1)
    except EmptyPage:
        cat = paginator.page(paginator.num_pages)
    
    contexto={'actores': cat}
    
    return render(request, 'movies/actores_listar.html', contexto)

def movie_listar(request):
    djangoCursor = connection.cursor()
    cursor = djangoCursor.connection.cursor()

    #cursor = connection.cursor()
    #cursor.execute("select * from CATEGORIES where state=1")
    #categoria = cursor.fetchall()

    
    resultado = cursor.var(cx_Oracle.CURSOR)
    estado=1
    cursor.callproc('SELECT_MOVIES_ALL', (estado,resultado))
    movies= resultado.getvalue().fetchall()
    
    cursor.close()
    
   
    
   
    
    #categoria= Categorie.objects.all().filter(state=1);
    
 
    page = request.GET.get('page', 1)
    paginator = Paginator(movies, 3)
    try:
        cat = paginator.page(page)
    except PageNotAnInteger:
        cat = paginator.page(1)
    except EmptyPage:
        cat = paginator.page(paginator.num_pages)
    
    contexto={'movies': cat}
    
    return render(request, 'movies/movies_listar.html', contexto)

def categoria_edit(request, id_categoria):
    categoria= Categorie.objects.get(id=id_categoria)
    
    if request.method=='GET':
        form= CategoriaForm(instance=categoria)
        
      
    else:
        form= CategoriaForm(request.POST, instance=categoria)
        if form.is_valid():
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("UPDATE_CATEGORIA_MOVIE", (id_categoria, request.POST['categorie'],))
            cursor.close()
            messages.success(request, 'Categoria modificado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:categoria_listar')
    return render(request, 'movies/categorias_form.html', {'form': form})

def actor_edit(request, id_actor):
    actor= Actor.objects.get(id=id_actor)
    
    if request.method=='GET':
        form= ActorForm(instance=actor)
        
      
    else:
        form= ActorForm(request.POST, instance=actor)
        if form.is_valid():
            #form.save()
            cursor = connection.cursor()
            cursor.callproc("UPDATE_ACTORES", (id_actor, request.POST['name'],request.POST['last_name'],request.POST['birthdate'],))
            cursor.close()
            messages.success(request, 'Actor modificado correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:actor_listar')
    return render(request, 'movies/actor_form.html', {'form': form})


def movie_edit(request, id_movie):
    movie= Movie.objects.get(id=id_movie)
    
    if request.method=='GET':
        form= MovieForm(instance=movie)
        
      
    else:
        form= MovieForm(request.POST, request.FILES, instance=movie)
        if form.is_valid():
            if request.FILES:
                print("Se eligio una nueva imagen")
                foto = request.FILES['path']  #obtengo la nombre
            
                nombre_imagen=  foto.name # me da el nombre de la imagen por ejemplo -> imagen.jpg
        
                fs = FileSystemStorage()
                filename = fs.save(foto.name, foto) # me guarda la foto en el server
                uploaded_file_url = fs.url(filename) # me da la ruta del archivo -> /media/imagen.jpg
                
                nameimg =foto.name
                path= 'C:\\xampp\\htdocs\\optativa\\cinema4\\media\\'
                imagpath = path+nameimg
                imag = Image.open (imagpath,mode='r')
                imag.save('C:\\xampp\\htdocs\\optativa\\cinema2\\public\\fotos\\'+foto.name)
                
                cursor = connection.cursor()
                cursor.callproc("UPDATE_MOVIES", (id_movie,request.POST['name'],request.POST['year'],request.POST['description'],request.POST['duration'], request.POST['productora'],nombre_imagen,request.POST['director'],request.POST['categories'],request.POST['trailer'],))
                cursor.close()

                cursor2 = connection.cursor()
                result = cursor2.callfunc('SELECT_ID_MOVIE', cx_Oracle.NUMBER, [request.POST['name'],request.POST['year']] )
                cursor2.close()

                actores = request.POST.getlist('actors')  #aqui obtengo todos los id de los actores
                cursor3 = connection.cursor()
                for actor in actores:
                    cursor3.callproc("insert_movie_actor", (result,actor)) #aqui se llena la tabla de mucho a muchos movies_actors
                
                
                cursor3.close()


                messages.success(request, 'Pelicula modificada correctamente!')
            else:
                print("No se actualizó la imagen")
                cursor = connection.cursor()
                cursor.callproc("UPDATE_MOVIES2", (id_movie,request.POST['name'],request.POST['year'],request.POST['description'],request.POST['duration'], request.POST['productora'],request.POST['director'],request.POST['categories'],request.POST['trailer'],))
                cursor.close()

                cursor2 = connection.cursor()
                result = cursor2.callfunc('SELECT_ID_MOVIE', cx_Oracle.NUMBER, [request.POST['name'],request.POST['year']] )
                cursor2.close()

                actores = request.POST.getlist('actors')  #aqui obtengo todos los id de los actores
                cursor3 = connection.cursor()
                for actor in actores:
                    cursor3.callproc("insert_movie_actor", (result,actor)) #aqui se llena la tabla de mucho a muchos movies_actors
                
                
                cursor3.close()


                messages.success(request, 'Pelicula modificada correctamente!')
   
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:movie_listar')
    return render(request, 'movies/movie_form.html', {'form': form})

def categoria_delete(request, id_categoria):
    categoria= Categorie.objects.get(id=id_categoria)
    if request.method=='POST':
        #mascota.delete()
        cursor = connection.cursor()
        cursor.callproc("DELETE_CATEGORIA_MOVIE", (id_categoria,))
        cursor.close()
        messages.success(request, 'Categoria eliminada correctamente!')
        return redirect('movies:categoria_listar')
    return render(request, 'movies/categoria_delete.html', {'category': categoria})

def actor_delete(request, id_actor):
    actor= Actor.objects.get(id=id_actor)
    if request.method=='POST':
        #mascota.delete()
        cursor = connection.cursor()
        cursor.callproc("DELETE_ACTOR", (id_actor,))
        cursor.close()
        messages.success(request, 'Actor eliminado correctamente!')
        return redirect('movies:actor_listar')
    return render(request, 'movies/actor_delete.html', {'actor': actor})

def movie_delete(request, id_movie):
    movie= Movie.objects.get(id=id_movie)
    if request.method=='POST':
        #mascota.delete()
        cursor = connection.cursor()
        cursor.callproc("DELETE_MOVIE", (id_movie,))
        cursor.close()
        messages.success(request, 'Pelicula eliminada correctamente!')
        return redirect('movies:movie_listar')
    return render(request, 'movies/movie_delete.html', {'movie': movie})






