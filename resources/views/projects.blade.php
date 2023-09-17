<x-app-layout>
    <x-slot name="header">
        {{-- Hier komt het filter systeem --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="filters">
                @foreach($caterogies as $caterogy)
                    <p>{{$caterogy->name}}</p>
                @endforeach
            </div>        
            <div class="wrapper">
                <a href="{{ route('project.create') }}" class="projectcreate">Maak een project aan</a>        
                <div class="projects">
                    {{-- Zorgt ervoor dat alle projecten in losse projecten word getoont --}}
                    @foreach($projects as $project)
                    {{-- Alles wat er van het project word getoond --}}
                        <div class="project">
                            <a href="{{ route('projects.show', $project->id) }}">
                            <div class="image">
                                {{-- Haalt alle afbeeldingen op --}}
                                @foreach($project->images as $image)
                                    <img class="projectimage" src="{{asset('images/' . $image->image)}}" alt="test.jpg">
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