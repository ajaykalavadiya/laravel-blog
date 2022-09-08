@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                @foreach($posts as $post)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{!! $post->description !!}</p>
                        <p class="card-text"><small class="text-muted">Published {{$post->publication_date->diffForHumans()}}</small></p>
                    </div>
                </div>
                @endforeach

                <div class="d-flex justify-content-center pt-3">
                {{$posts->withQueryString()->links()}}
                </div>

            </div>
        </div>
    </div>
@endsection
