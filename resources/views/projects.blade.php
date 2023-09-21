<x-app-layout>
    <x-slot name="header">
        {{-- Hier komt het filter systeem --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Fitler systeem op categories --}}
            <div class="filters">
                <p class="filterp"> | </p>
                <a href="{{route('projects.index')}}">Alles</a>
                <p class="filterp"> | </p>
                @foreach($caterogies as $category)
                    <a href="{{ route('categorie.show', $category->id) }}">{{$category->name}}</a>
                    <p class="filterp"> | </p>
                @endforeach
            </div>        
            <div class="wrapper">
                @if(Auth::user() != NULL)
                    <a href="{{ route('project.create') }}" class="projectcreate">Maak een project aan</a>    
                @endif    
                <div class="projects">
                    {{-- Zorgt ervoor dat alle projecten in losse projecten word getoont --}}
                    @foreach($projects as $project)
                    {{-- Alles wat er van het project word getoond --}}
                        <div class="project">
                            <a href="{{ route('projects.show', $project->id) }}">
                            <div class="image">
                                {{-- Haalt alle afbeeldingen op --}}
                                @foreach($project->images as $image)
                                    <img class="projectimage" src="{{asset('images/' . $image->image)}}" alt="{{$image->image}}">
                                    @break;
                                @endforeach
                            </div>
                            <p class="title">{{$project->title}}</p>
                            </a>
                        </div>
                    @endforeach                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>