@extends('layouts.app')


@section('content')
    @foreach ($posts as $post)
         <h1>{{$post->title}} </h1>
         <p> {{$post->body}} </p>
         @foreach ($post->images as $image)
             <img class="img-fluid" src=" {{$image->image}} " alt="">
         @endforeach
    @endforeach
@endsection