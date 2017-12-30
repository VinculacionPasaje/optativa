from django.shortcuts import render, redirect
from app.movies.forms import CategoriaForm
from django.contrib import messages

# Create your views here.
def index(request):
    return render(request, 'movies/index.html');

def categoria_create(request):
    if request.method=='POST':
        form= CategoriaForm(request.POST)
        if form.is_valid():
            form.save()
            messages.success(request, 'Categoria agregada correctamente!')
        else:
            messages.error(request, 'ah ocurrido un error') 
        return redirect('movies:categoria_crear')
    else:
        form= CategoriaForm()
    return render(request, 'movies/categorias_form.html', {'form': form})
