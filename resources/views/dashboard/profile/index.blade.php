@extends('layouts.homemaster')

@section('slug')
Welcome To Profile
@endsection


@section('content')
<x-breadcum slogan="Profile" subslogan="Edit Profile"></x-breadcum>



{{-- profile update --}}



<div class="row">
    <div class="col-xl-12">
        <div class="card border-0">
            {{-- success message --}}
            @if (session('name_update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ (session('name_update')) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif
            <div class="card-body">
                <h4>1. Name Update</h4>

                <form action=" {{ route('profile.name.update') }} " method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error ('name') is-invalid @enderror" id="floatingnameInput" placeholder="Enter Name" name="name">
                        <label for="floatingnameInput">Enter your name</label>
                        @error('name')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong> {{ $message }} </strong>
                                    </span>

                                    @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>


{{-- email update --}}


<div class="row">
    <div class="col-xl-12">
        <div class="card border-0">
            {{-- success message --}}
            @if (session('email_update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ (session('email_update')) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif
            <div class="card-body">
                <h4>2. Email Update</h4>

                <form action=" {{ route('profile.email.update') }} " method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error ('email') is-invalid @enderror" id="floatingemailInput" placeholder="Enter Email" name="email">
                        <label for="floatingemailInput">Enter your email</label>
                        @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong> {{ $message }} </strong>
                                    </span>

                                    @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>


{{-- password update --}}


<div class="row">
    <div class="col-xl-12">
        <div class="card border-0">
            {{-- success message --}}
            @if (session('password_update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ (session('password_update')) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif
            <div class="card-body">
                <h4>3. Password Update</h4>

                <form action=" {{ route('profile.password.update') }} " method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error ('current_password') is-invalid @enderror" id="floatingpasswordInput" placeholder="Enter Password" name="current_password">
                        <label for="floatingpasswordInput">Current Password</label>
                        @error('current_password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong> {{ $message }} </strong>
                                    </span>

                                    @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error ('password') is-invalid @enderror" id="floatingpasswordInput" placeholder="Enter Password" name="password">
                        <label for="floatingpasswordInput">New Password</label>
                        @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong> {{ $message }} </strong>
                                    </span>

                                    @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error ('password_confirmation') is-invalid @enderror" id="floatingpasswordInput" placeholder="Enter Password" name="password_confirmation">
                        <label for="floatingpasswordInput">Confirm Password</label>
                        @error('password_confirmation')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong> {{ $message }} </strong>
                                    </span>

                                    @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>



{{-- image update --}}



<div class="row">
    <div class="col-xl-12">
        <div class="card border-0">
            {{-- success message --}}
            @if (session('image_update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ (session('image_update')) }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            @endif
            <div class="card-body">
                <h4>4. Image Update</h4>

                <form action=" {{ route('profile.image.update') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <img id="profile_image" src="{{ asset('uploads/default/demo.jpg') }}" alt="" style="height: 5%; width:10%">
                        <input onchange="document.querySelector('#profile_image').src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control @error ('image') is-invalid @enderror" name="image">
                        {{-- <label for="floatingimageInput">Image File</label> --}}
                        @error('image')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong> {{ $message }} </strong>
                                    </span>

                                    @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>

@endsection
