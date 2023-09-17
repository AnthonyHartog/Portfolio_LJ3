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
                <h1>{{$project->title}}</h1>   
                <p>{{$project->description}}</p>            
        </div>
    </div>
</x-app-layout>