In dit project hebben wij verschillende soorten eisen

# Eisen

## LowerCamalCase
Wij hebben lowerCamalCase voor variables. Gebruik ook een logische naamgeving voor de variables.

Hier voorbeeld van lowerCamalCase in die uit mijn project komt.

/* Dit is PHP Code */
```//Kijk of er een image mee is gegeven
if($request->images != NULL && $request->hasFile('images')){  
    //Loop erdoorheen   
    foreach($request->images as $image){
        //Sla de image op
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
    
        Image::create([
            'image' => $imageName,
            'project_id' => $project->id,
        ]);
    }   
}
```

## UpperCamalCase
UpperCamalCase gebruiken we voor model en controller namen. Gebruik ook een logische naamgeving voor de Models en Controllers.

Hier wat voorbeelden van UpperCamalCase:

ProjectController
ContactController
ProfileController

Project
Image
Caterogy

## Inspringen

Let erop dat je tijdens het programmeren goed inspringt en alels overzichtelijk neerzet, zodat het leesbaar is voor iedereen.

/* PHP

```
foreach($images as $image){
    $imageName = $image->image;
    File::delete(public_path('images/' . $imageName));
    $image->delete();
}
```

Zoals je hier ziet is er ingesprongen en zit er verschil tussen de lijnen zodat het overzichtelijk is.
Hiervoor gebruiken wij ook tabs om in te springen

## Laravel regels

Daarnaast houwen we ons aan de laravel mappen structuur en regels.

## Models

Als er gevoelige informatie word gedeeld gebruiken we fillable[] en zorgen we ervoor dat niet alles geupdate kan worden.

Daarnaast heb ik gaurded[] gebruikt. Omdat er geen gevoelige informatie word gedeeld. En ik
de enigste zou zijn die projecten etc aan maakt.

Alleen bij de user is er wel fillable[] gebruikt.

# Style

We gebruiken als background de 'background-home.jpg' die in public/images staat.
Daarnaast gebruiken we over het algemeen een witte lettertype. Alleen als het niet leesbaar is gebruiken we een zwarte lettertype.
We gebruiken als font de default van html.

Ook als je een form aanmaakt hebben wij hiervoor al classes klaar staan die je kan gebruiken.



