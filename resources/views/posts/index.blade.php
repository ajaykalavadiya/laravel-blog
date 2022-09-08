@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">


                <div class="d-flex justify-content-end mb-3">
                    <a class="btn btn-success" href="{{route('posts.create')}}">Add New</a>
                </div>

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th style="width: 180px"><a href="{{ route('posts.index',['sort' => 'publication_date','direction' => request()->direction == 'asc' ? 'desc':'asc']) }}">Publication Date</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->publication_date->format('j F Y')}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center pt-3">
                    {{$posts->withQueryString()->links()}}
                </div>

            </div>
        </div>
    </div>

    <script>

    </script>
@endsection
