from django import forms

from app.movies.models import Categorie

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
            'categorie': forms.TextInput(attrs={'class': 'form-control'}),

        }
    

    
