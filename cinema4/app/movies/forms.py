from django import forms

from app.movies.models import Categorie, Actor,Movie
from app.servers.models import Server

class CategoriaForm(forms.ModelForm):

    class Meta:
        model= Categorie

        fields=[
            'categorie',
           
        ]

        labels={
            'categorie': 'Categoria',
        }

        widgets={
            'categorie': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese la categoria'}),

        }

class ActorForm(forms.ModelForm):
    
    birthdate = forms.DateField(widget=forms.DateInput(format=('%d/%m/%Y'), attrs={  'id':'datepicker', 'class':'form-control', 'placeholder':'Seleccione fecha de nacimiento'}))

    class Meta:
        model= Actor

        fields=[
            'name',
            'last_name',
            'birthdate',
           
        ]

        labels={
            'name': 'Nombre',
            'last_name': 'Apellidos',
            'birthdate': 'Fecha de Nacimiento',
        }

        widgets={
            'name': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el nombre del actor'}),
            'last_name': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el apellido del actor'}),


        }

class MovieForm(forms.ModelForm):
    path = forms.ImageField();
    cover = forms.ImageField();
    fecha = forms.DateField(widget=forms.DateInput(format=('%d/%m/%Y'), attrs={  'id':'datepicker', 'class':'form-control', 'placeholder':'Seleccione fecha de subida'}))
    
    

    class Meta:
        model= Movie

        fields=[
            'name',
            'year',
            'description',
            'duration',
            'productora',
            'path',
            'cover',
            'director',
            'categories',
            'actors',
            'trailer',
            'fecha',
           
        ]

        labels={
            'name': 'Titulo Pelicula',
            'year': 'Año Lanzamiento',
            'description': 'Descripción',
             'duration': 'Duración',
             'productora': 'Produtora',
             'path': 'Portada',
             'cover': 'Cover',
             'director': 'Director Film',
             'categories': 'Categoria',
             'actors': 'Reparto del Film',
             'trailer': 'Trailer del Film',
             'birthdate': 'Fecha de subida',
        }

        widgets={
            'name': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el titulo de la pelicula'}),
            'year': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el año de lanzamiento'}),
             'description': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese la sipnosis'}),
             'duration': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese la duracion'}),
             'productora': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el productor de la pelicula'}),
             'director': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el director de la pelicula'}),
             'categories': forms.Select(attrs={'class': 'form-control'}),
             'actors': forms.CheckboxSelectMultiple(),
             'trailer': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el trailer de la pelicula'}),


        }


    

    
