@extends('layouts.homemaster')

@section('slug')
Welcome To Category
@endsection

@section('content')
<x-breadcum slogan="Category" subslogan="Show Category"></x-breadcum>

<div class="row">
    <div class="col-lg-12">
            <div class="card-body">
                <h4 class="header-title">Categories Table</h4>

                <div class="table-responsive">
                    <table class="table table-bordered border-primary mb-0">
                        <thead>
                            <tr>
                                <th style="text-align: center">#</th>
                                <th style="text-align: center">Image</th>
                                <th style="text-align: center">Title</th>
                                <th style="text-align: center">Slug</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row" style="text-align: center; width:5%;">
                                        {{ $categories->firstItem() + $loop->index }}
                                    </th>
                                    <td style="text-align: center; width:15%;">
                                        <img src="{{ asset('uploads/category') }}/{{ $category->image }}" style="width: 50%; height:500%;">
                                    </td>
                                    <td style="text-align: center; width:30%;">{{ $category->title }}</td>
                                    <td style="text-align: center; width:30%;">{{ $category->slug }}</td>
                                    <td style="text-align: center; width:10%">
                                        <form id="checkbox{{ $category->id }}" action="{{route('category.status',$category->id)}}" method="POST">
                                            @csrf
                                            <div class="form-check form-switch">
                                                <input style="cursor: pointer;" onchange="document.querySelector('#checkbox{{ $category->id }}').submit()" class="form-check-input" type="checkbox" id="mySwitch" name="darkmode" value="yes" {{$category->status == 'active' ? 'checked' : ''}}>
                                                <label class="form-check-label" for="mySwitch"> {{$category->status}} </label>
                                              </div>
                                        </form>
                                    </td>
                                    <td style="text-align: center" class="d-flex justify-content-around">
                                        <a href="{{ route('category.edit',$category->id) }}" type="button" class="btn btn-outline-primary waves-effect waves-light">
                                            <i class="fa-solid fa-pen-to-square" style="line-height: 5%"></i>
                                        </a>
                                        <form action="{{ route('category.delete',$category->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class=" text-danger btn btn-outline-primary waves-effect waves-light">
                                                <i class="fa-solid fa-trash" style="line-height: 5%"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{$categories->links()}}
                    </table>
                </div> <!-- end .table-responsive-->
            </div>
    </div>
</div>

@endsection

@section('script')
@if (session('category'))
<script>
    Toastify({
  text: "{{ session('category') }}",
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
