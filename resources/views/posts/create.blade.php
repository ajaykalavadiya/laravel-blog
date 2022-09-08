@extends('layouts.app')

@section('content')

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Post') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="{{route('posts.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="col-form-label">{{ __('Title') }}</label>
                                <input type="text" name="title"  value="{{ old('title') }}" class="@error('title') is-invalid @enderror form-control">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="col-form-label">{{ __('Description') }}</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="@error('description') is-invalid @enderror form-control">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="col-form-label">{{ __('Publish Date') }}</label>
                                <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date') }}" class="@error('publication_date') is-invalid @enderror form-control">
                                @error('publication_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        tinymce.init({
            selector: 'textarea#description', });
    </script>

@endsection
