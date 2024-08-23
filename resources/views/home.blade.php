
@extends('client.app')

@section('main_content')
    <div class="container">
        <div class="row my-3 blog_row">

            @forelse ($post as $item)
                <div class="col-md-4  my-2">
                    <div class="blog">
                        <div class="blog-image">
                            <img src="{{ asset('post_images/' . $item->image) }}">
                            <div class="date">{{ $item->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="blog-content">
                            <h2>{{ $item->title }}</h2>
                            <p>{{ $item->content }}</p>
                            <a href="{{route('blog.detail',$item->id)}}">Read More</a>
                        </div>
                    </div>
                </div>
            @empty
                <h2>No Post Found !!</h2>
            @endforelse



        </div>

    </div>

    </div>



@endsection
