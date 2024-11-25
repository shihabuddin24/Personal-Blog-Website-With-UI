@extends('layouts.homemaster')

@section('slug')
Welcome To Blogs
@endsection

@section('content')
<x-breadcum slogan="Blogs" subslogan="Edit Blogs"></x-breadcum>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Edit Blogs</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="p-2">
                            <form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Blogs Category</label>
                                    <div class="col-md-10">
                                        <select class="form-select" name="category_id">
                                            <option value="" disabled selected>Select Category</option>
                                            @foreach ($category as $category)
                                                <option {{$blog->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="simpleinput">Blogs Title</label>
                                    <div class="col-md-10">
                                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Enter Title" name="title" value="{{$blog->title}}">
                                        @error('title')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="example-email">Blogs Slug</label>
                                    <div class="col-md-10">
                                        <input type="text" id="slug" class="form-control" placeholder="Enter Slug" name="slug" value="{{$blog->slug}}">
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="example-email">Short Description</label>
                                    <div class="col-md-10">
                                        <textarea type="text" id="style_textarea" class="form-control @error('short_description') is-invalid @enderror" placeholder="Enter Short Description Here" name="short_description" cols="30" rows="8"> {{$blog->short_description}} </textarea>
                                        @error('short_description')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="example-email">Description</label>
                                    <div class="col-md-10">
                                        <textarea type="text" id="style_textarea" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description Here" name="description" cols="30" rows="11"> {{$blog->description}} </textarea>
                                        @error('description')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label class="col-md-2 col-form-label" for="example-password">Blogs Thumbnail</label>
                                    <div class="col-md-10">
                                        <img id="blog_image" src="{{ asset('uploads/blog') }}/{{$blog->thumbnail}}" alt="" style="height: 70%; width:20%">
                                        <input onchange="document.querySelector('#blog_image').src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control @error('thumbnail') is-invalid @enderror" id="image" name="thumbnail">
                                        @error('thumbnail')
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


@section('script')
@if (session('blog'))
<script>
    Toastify({
  text: "{{ session('blog') }}",
  duration: 3000,
  destination: "https://github.com/apvarun/toastify-js",
  newWindow: true,
  close: true,
  gravity: "top", // `top` or `bottom`
  position: "center", // `left`, `center` or `right`
  stopOnFocus: true, // Prevents dismissing of toast on hover
  style: {
    background: "linear-gradient(to right, #00b09b, #96c93d)",
  },
  onClick: function(){} // Callback after click
}).showToast();
</script>

@endif


<script>
  tinymce.init({
    selector: '#style_textarea',
    plugins: [
      'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
      'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
      'importword', 'exportword', 'exportpdf'
    ],
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
    exportpdf_converter_options: { 'format': 'Letter', 'margin_top': '1in', 'margin_right': '1in', 'margin_bottom': '1in', 'margin_left': '1in' },
    exportword_converter_options: { 'document': { 'size': 'Letter' } },
    importword_converter_options: { 'formatting': { 'styles': 'inline', 'resets': 'inline', 'defaults': 'inline', } },
    // Keep the default background color
    content_style: 'body { background: inherit; color: inherit; }' // Inherit default styles
  });
</script>


@endsection
