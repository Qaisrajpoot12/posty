
@extends('client.app')

@section('main_content')
    <div class="container">
        <div class="row my-3 ">


                <div class="col-md-12  my-2">
                    <div class="blog">
                        <div class="blog-image">
                            <img src="{{ asset('post_images/' . $post->image) }}" style="height: 500px;object-fit:cover">
                            <div class="date">{{ $post->created_at->diffForHumans() }}</div>
                            <div class="date "  style="right:10px;left:unset" title="Author">Author : {{ $post->user->name }}</div>
                        </div>
                        <div class="blog-content">
                            <h2>{{ $post->title }}</h2>
                            <p>{{ $post->content }}</p>
                        </div>
                    </div>
                </div>




        </div>

    </div>

    </div>



@endsection
