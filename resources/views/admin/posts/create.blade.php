@extends('layouts.admin')

@section('content')

    <form method="POST" action="{{ route('admin.posts.store') }}">

        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " id="title" name="title" value="{{old('title')}}">
            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover url</label>
            <input type="text" class="form-control @error('cover_image') is-invalid @enderror " id="cover_image" name="cover_image" value="{{old('cover_image')}}">
            @error('cover_image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Descrizione del progetto</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content">{{old('content')}}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select class="form-select" name="type_id" id="type" aria-label="Default select">
          <option value="">Scegli il tipo di linguaggio</option>
          @foreach ($types as $type)
            <option @if ($type->id == old('type_id')) selected @endif value="{{ $type->id }}">
              {{ $type->name }}
            </option>
          @endforeach
        </select>
      </div>

        <button type="submit" class="btn btn-primary">Salva</button>

    </form>

@endsection