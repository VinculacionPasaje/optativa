from django import forms

from app.servers.models import Server, Language

class LenguajeForm(forms.ModelForm):

    class Meta:
        model= Language

        fields=[
            'language',
           
        ]

        labels={
            'language': 'Idioma',
        }

        widgets={
            'language': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el idioma'}),

        }
    
class ServerForm(forms.ModelForm):
  
    
    

    class Meta:
        model= Server

        fields=[
            'name',
            'embed_code',
            'languages',
            'movies',
           
           
        ]

        labels={
            'name': 'Nombre del Servidor',
            'embed_code': 'Ingrese el código embebido',
            'languages': 'Seleccione el idioma',
            'movies': 'Seleccione la pelicula',

        }

        widgets={
            'name': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el nombre del servidor'}),
            'embed_code': forms.TextInput(attrs={'class': 'form-control', 'placeholder': 'Ingrese el código embebido'}),
            'languages': forms.Select(attrs={'class': 'form-control'}),
            'movies': forms.Select(attrs={'class': 'form-control'}),
          


        }