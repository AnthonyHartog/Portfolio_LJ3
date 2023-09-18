<x-app-layout>
    <x-slot name="header">
        {{-- Hier komt het filter systeem --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">   
            <div class="wrapper">
                @foreach($project->images as $image)
                    <img src="{{asset('images/' . $image->image)}}" alt="test.jpg">
                @endforeach
                <h1 id="projectname">{{$project->title}}</h1>   
                <p>{{$project->description}}</p> 
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
        </div>
    </div>
    
</x-app-layout>