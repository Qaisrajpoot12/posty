@extends('user.layout.app')

@section('heading', 'Add')

@section('right_top_button')
    <a href="{{ route('home') }}" class="btn btn-primary"><i class="fa fa-eye"></i> View All</a>
@endsection

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="mb-4">
                                        <label class="form-label">Title *</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}">

                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <label class="form-label">Content *</label>
                                        @error('content')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <textarea name="content" class="form-control h_100" cols="30" rows="10">{{ old('content') }}</textarea>

                                    </div>

                                    <div class="mb-4">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <label class="form-label">Cover Image *</label>
                                        <div>
                                            <input type="file" name="image">
                                        </div>
                                        <div>
                                            <img src="" alt="">
                                        </div>

                                    </div>


                                    <div class="mb-4">
                                        <label class="form-label"></label>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
