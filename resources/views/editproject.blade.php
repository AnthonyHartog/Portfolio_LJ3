<x-app-layout>
    <x-slot name="header">
        {{-- Hier komt het filter systeem --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">      
            <div class="wrapper">
                <div class="formcenter">
                    @if($errors->any())
                    @foreach($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                    @endif
                    {{-- Form om een project aan te maken --}}
                    <form class="formproject" action="{{ route('project.update',$project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                                <div class="form-group">
                                    <strong>Titel:</strong>
                                    <input type="text" name="title" class="form-control" placeholder="Titel" value="{{$project->title}}">
                                    @error('title')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <strong>Verwijder afbeeldingen</strong>
                                    @foreach($project->images as $image)
                                    <div class="imageedit">
                                        <img style="width: 150px;" src="{{asset('images/' . $image->image)}}" alt="test.jpg">
                                        <input type="checkbox" name="deleteimages[]" value="{{$image->id}}">
                                    </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <strong>Voeg afbeeldingen toe:</strong>
                                    <input type="file" name="images[]" class="form-control" multiple="true">
                                    @error('images')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <strong>Beschrijving:</strong>
                                    <textarea name="description" cols="30" rows="10" placeholder="Inhoud">{{$project->description}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <strong>Caterogie:</strong>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach($caterogies as $caterogie)
                                            <option value="{{$caterogie->id}}" {{ $project->caterogie_id == $caterogie->id ? 'selected' : '' }}>{{$caterogie->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('content')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
            
                            <input type="hidden" name="user_id" value="{{Auth::id()}}">
                            
                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>