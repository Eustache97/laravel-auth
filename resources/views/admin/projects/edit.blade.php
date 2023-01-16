@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="text-center">Modifica {{ $project->title }}</h2>
        <div class="row justify-content-center">
            <div class="col-8">
                @include('partials.errors')
                <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" id="title" name="title" class="form-control"
                            value="{{ old('title', $project->title) }}">
                    </div>
                    <div class="form-group mb-3">
                        <label for="cover_image">Immagine</label>
                        <input type="file" id="cover_image" name="cover_image"
                            class="form-control @error('cover_image')
                        is-invalid 
                        @enderror">
                        @error('cover_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="image_preview">
                            @if ($project->cover_image)
                                <div class="w-25 mt-3 mb-3">
                                    <img src="{{ asset('storage/' . $project->cover_image) }}" alt="">
                                </div>
                            @else
                                <div class="w-25 py-4 text-center text-white bg-secondary mt-3 mb-3">
                                    Nessun immagine caricata in precedenza
                                </div>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Descrizione</label>
                            <textarea name="description" id="description" rows="10" class="form-control">{{ old('description', $project->description) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-warning">Salva</button>
                        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Indietro</a>
                </form>
            </div>
        </div>
    </div>
@endsection
