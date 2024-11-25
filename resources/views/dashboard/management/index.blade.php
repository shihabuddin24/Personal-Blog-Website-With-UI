@if (auth()->user()->role !='blogger')

    @extends('layouts.homemaster')

    @section('slug')
    Welcome To Management
    @endsection

    @section('content')
    <x-breadcum slogan="Management" subslogan="User Authenticate"></x-breadcum>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create New Users</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form action='{{ route('management.create.user') }}' method="POST">
                                    @csrf
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="simpleinput">Name</label>
                                        <div class="col-md-10">
                                            <input type="text" id="title" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" name="name">
                                            @error('name')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-email">Email</label>
                                        <div class="col-md-10">
                                            <input type="email" id="slug" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" name="email">
                                            @error('email')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="example-email">Password</label>
                                        <div class="col-md-10">
                                            <input type="password" id="slug" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password">
                                            @error('password')
                                            <span class="text-danger"> {{ $message }} </span>
                                        @enderror
                                        </div>
                                    </div>

                                    <div class="mb-12 row">
                                        <label class="col-md-2 col-form-label" for="example-email">Role</label>
                                        <div class="col-md-10">
                                            <select class="form-select" name="role">
                                                <option value="" disabled selected>Select Role</option>
                                                <option value="manager">Manager</option>
                                                <option value="blogger">Blogger</option>
                                            </select>
                                            @error('role')
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
    @if (session('management'))
    <script>
        Toastify({
      text: "{{ session('management') }}",
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

    @else

    @section('content')

    <div class="row">
        <div class="col-12">
            <div class="">
                <div class="card-body">
                    <h1 style="text-align:center; margin-top:25%">
                        This Page Is Not For You
                    </h1>
                </div>
            </div>
        </div>
    </div>

    @endsection

@endif
