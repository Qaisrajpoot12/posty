@extends('user.layout.app')

@section('heading', 'Dashboard')
@section('right_top_button')
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
@endsection
@section('main_content')
    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fa fa-home"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Posts</h4>
                    </div>
                    <div class="card-body">



                     {{$post->count() ?? ''}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <section class="section">
                <div class="section-header">
                    <h1>Post list</h1>



                </div>
            </section>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Description</th>

                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($post as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>



                                                            <img class="list-img"
                                                                src="{{ asset('post_images/'.$row->image) }}"
                                                                alt="Image">


                                                    </td>
                                                    <td>{{ $row->title }}</td>
                                                    <td>{{ $row->content }}</td>
                                                    <td>{{ $row->created_at->diffForHumans() }}</td>



                                                    <td class="pt_10 pb_10">
                                                        <a href="{{ route('posts.show', ['post' => $row->id]) }}"
                                                            class="btn btn-success">View</a>
                                                        <a href="{{ route('posts.edit', ['post' => $row->id]) }}"
                                                            class="btn btn-primary">Edit</a>
                                                            <form action="{{ route('posts.destroy', $row->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>


                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
