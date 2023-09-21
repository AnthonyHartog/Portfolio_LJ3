<x-app-layout>
    <x-slot name="header">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">   
            <div class="wrapper">
                <div class="slideshow">
                    <div class="slideshow-images">
                        @foreach($project->images as $image)
                        <img class="slideshow-image" src="{{asset('images/' . $image->image)}}" alt="test.jpg">
                      @endforeach
                    </div>
                    <div class="slideshow-buttons">
                        <button class="previous">Vorige</button>
                        <button class="next">Volgende</button>
                    </div>
                  </div>
                  <div class="project-information">
                    <h1 id="projectname">{{$project->title}}</h1>   
                    <p>{{$project->description}}</p> 
                    @if(Auth::user() != NULL)
                        <a href="{{ route('project.edit', $project->id) }}">Bewerken</a>
                        <button id="showdestroy" style="display: show;">Verwijderen</button>
                        <form id="deleteform" style="display: none;" action="{{ route('project.destroy', $project->id) }}" method="Post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="font-weight: bold;">Verwijder nu</button>
                        </form>
                        <script>
                        //Kijk of er opgedrukt is
                        document.getElementById('showdestroy').addEventListener('click', function(){
                                //Haal de project naam op
                                let projectName = document.getElementById('projectname').textContent;
    
                                //Vraag of ze het zeker weten
                                let answer = prompt('Weet je het zeker? Typ het projectnaam');
                                //Kijken of het antwoord goed is
                                if(answer == projectName){
                                    //Laat het form zien en de a verdwijnen
                                    document.getElementById('deleteform').style.display = "block";
                                    document.getElementById('showdestroy').style.display = "none";
                                }
                            })
                        </script>
                    @endif
                  </div>
        </div>
    </div>
    {{-- Slide show javascript --}}
    <script>
        $(document).ready(function() {
          // Maak een variabele voor de huidige afbeelding
          var currentImage = 0;
          // Maak een functie om de volgende afbeelding weer te geven
          function nextImage() {
            // Verhoog de huidige afbeelding
            currentImage++;
            // Als de huidige afbeelding hoger is dan het aantal afbeeldingen, reset het dan
            if (currentImage >= $('img').length) {
              currentImage = 0;
            }
            // Toon de volgende afbeelding
            $('img').hide();
            $('img').eq(currentImage).show();
          }
        
          // Maak een functie om de vorige afbeelding weer te geven
          function previousImage() {
            // Verlaag de huidige afbeelding
            currentImage--;
            // Als de huidige afbeelding lager is dan 0, reset het dan
            if (currentImage < 0) {
              currentImage = $('img').length - 1;
            }
            // Toon de vorige afbeelding
            $('img').hide();
            $('img').eq(currentImage).show();
          }
          // Voeg een evenementlistener toe aan de `next`-knop
          $('.next').on('click', nextImage);
          // Voeg een evenementlistener toe aan de `previous`-knop
          $('.previous').on('click', previousImage);
            // Voer de nextImage()-functie één keer uit na 1 seconde
            setTimeout(nextImage, 0);
        });
        nextImage();
        </script>   
</x-app-layout>
