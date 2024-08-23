@extends('user.layout.app')

@section('heading', 'View detail')

@section('right_top_button')
    <a href="{{ route('posts.index') }}" class="btn btn-primary"> View All</a>
@endsection

@section('main_content')

    <div class="section-body">
        <div class="row">
            <div class="col-md-12">

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card" style="width: 100%">
            <img src="{{ asset('post_images/' . $post->image) }}" class="card-img-top img-fluid" alt="loading...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <p class="card-text"><strong>  Author : {{ $post->user->name }} </strong></p>
                    <p class="card-text"> {{ $post->created_at->diffForHumans() }}</p>
                </div>
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>



            </div>
        </div>
    </div>

</div>



            </div>
        </div>
    </div>



@endsection
