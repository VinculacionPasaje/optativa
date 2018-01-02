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
    
    birthdate = forms.DateField(widget=forms.DateInput(format=('%d-%m-%Y'), attrs={'class':'form-control', 'placeholder':'Seleccione fecha de nacimiento'}))

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
    
    duration = forms.TimeField(widget=forms.TimeInput(format='%H:%M'))

    class Meta:
        model= Movie

        fields=[
            'name',
            'year',
            'description',
            'duration',
            'productora',
            'path',
            'director',
            'categories_id',
            'actors',
           
        ]

        labels={
            'name': 'Titulo Pelicula',
            'year': 'Año Lanzamiento',
            'description': 'Descripción',
             'duration': 'Duración',
             'productora': 'Produtora',
             'path': 'Portada',
             'director': 'Director Film',
             'categories_id': 'Categoria',
             'actors': 'Reparto del Film',
        }

        widgets={
            'name': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el titulo de la pelicula'}),
            'year': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el año de lanzamiento'}),
             'description': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese la sipnosis'}),
             'productora': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el productor de la pelicula'}),
             'director': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el director de la pelicula'}),
             'categories_id': forms.Select(attrs={'class': 'form-control'}),
             'actors': forms.CheckboxSelectMultiple(),


        }


    

    
