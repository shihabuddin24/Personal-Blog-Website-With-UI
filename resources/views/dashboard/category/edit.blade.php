@extends('layouts.homemaster')

@section('slug')
Welcome To Category
@endsection

@section('content')
<x-breadcum slogan="Category" subslogan="Edit Category"></x-breadcum>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Edit Category</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Category Title</label>
                                    <div class="col-md-10">
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title" name="title" value="{{ ($category->title) }}">
                                        @error('title')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="example-email">Category Slug</label>
                                    <div class="col-md-10">
                                        <input type="text" id="slug" class="form-control" placeholder="Enter Slug" name="slug" value="{{ $category->slug }}">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="example-password">Category Image</label>
                                    <div class="col-md-10">
                                        <img id="cate_image" src="{{ asset('uploads/category') }}/{{ $category->image }}" alt="" style="height: 70%; width:20%">
                                        <input onchange="document.querySelector('#cate_image').src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                                        @error('image')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
        </div> <!-- end card -->
    </div><!-- end col -->
</div>

@endsection
