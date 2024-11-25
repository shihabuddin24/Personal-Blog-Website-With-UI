@extends('layouts.homemaster')

@section('slug')
Welcome To Blogs
@endsection

@section('content')

<x-breadcum slogan="Blogs" subslogan="Show Blogs"></x-breadcum>

<div class="row">
    <div class="col-lg-12">
            <div class="card-body">
                <h4 class="header-title">Blogs Table</h4>

                <div class="table-responsive">
                    <table class="table table-bordered border-primary mb-0">
                        <thead>
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">Thumbnail</th>
                                <th style="text-align: center">Category</th>
                                <th style="text-align: center">Title</th>
                                <th style="text-align: center">Status</th>
                                @if (auth()->user()->role != 'blogger')
                                    <th style="text-align: center">Feature</th>
                                @endif
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <th scope="row" style="text-align: center; width:5%;">
                                        {{ $blogs->firstItem() + $loop->index}}
                                    </th>
                                    <td style="text-align: center; width:15%;">
                                        <img src="{{ asset('uploads/blog') }}/{{ $blog->thumbnail }}" style="width: 50%; height:500%;">
                                    </td>
                                    <td style="text-align: center; width:30%;">{{ $blog->onecategory->title}}</td>
                                    <td style="text-align: center; width:30%;">{{ $blog->title }}</td>
                                    <td style="text-align: center; width:10%">
                                        <form id="checkbox0{{ $blog->id }}" action="{{route('blog.status',$blog->id)}}" method="POST">
                                            @csrf
                                            <div class="form-check form-switch">
                                                <input style="cursor: pointer;" onchange="document.querySelector('#checkbox0{{ $blog->id }}').submit()" class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes" {{$blog->status == 'active' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="mySwitch"> {{$blog->status}} </label>
                                              </div>
                                        </form>
                                    </td>
                                    @if (auth()->user()->role !== 'blogger')
                                        <td style="text-align: center; width:10%">
                                            <form id="checkbox1{{ $blog->id }}" action="{{route('blog.feature',$blog->id)}}" method="POST">
                                                @csrf
                                                <div class="form-check form-switch">
                                                    <input style="cursor: pointer;" onchange="document.querySelector('#checkbox1{{ $blog->id }}').submit()" class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes" {{$blog->feature == true ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="mySwitch"> {{$blog->feature}} </label>
                                                  </div>
                                            </form>
                                        </td>
                                    @endif
                                    <td style="text-align: center" class="d-flex justify-content-around">
                                        <a href="{{ route('blog.edit',$blog->id) }}" type="button" class="btn btn-outline-primary waves-effect waves-light">
                                            <i class="fa-solid fa-pen-to-square" style="line-height: 5%"></i>
                                        </a>
                                        <form action="{{ route('blog.destroy',$blog->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" text-danger btn btn-outline-primary waves-effect waves-light">
                                                <i class="fa-solid fa-trash" style="line-height: 5%"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{$blogs->links()}}
                    </table>
                </div> <!-- end .table-responsive-->
            </div>
    </div>
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

@endsection
