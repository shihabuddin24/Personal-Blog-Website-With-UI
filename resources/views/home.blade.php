@if (auth()->user()->role == 'user')
    @extends('layouts.homemaster')

    @section('slug')
    Welcome To Dashboard
    @endsection

    @section('content')
    <x-breadcum slogan="Dashboard" subslogan="Dashboard"></x-breadcum>

    <div class="row">
        <div class="title" style="text-align: center">
            <h2>Welcome To The Admin Pannel</h2>
        </div>
        <div class="col-12" style="text-align: center">
            <div class="card">
                <div class="card-body">
                    <div><h3><u>Account Info</u></h3></div>
                        <div style="margin-bottom:5px;">
                            @if (auth()->user()->image == 'default.jpg')
                            <img src="{{ asset('uploads/default') }}/{{ auth()->user()->image }}" alt="user-image" style="width: 23%; border-radius:10px">

                            @else
                            <img src="{{ asset('uploads/profile') }}/{{ auth()->user()->image }}" alt="user-image" style="width: 23%; border-radius:10px">

                            @endif
                        </div>
                    <div>
                        <span>
                            <h3>Your Name = {{ auth()->user()->name }}</h3>
                        </span>
                    </div>
                    <div>
                        <span>
                            <h3> Your Role = {{ auth()->user()->role }} </h3>
                        </span>
                    </div>
                    <div>
                        <span>
                            <h3> Your Email = {{ auth()->user()->email }} </h3>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        {{ (session('success')) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

@if (!$requests)
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <h4 class="header-title mb-3">Do You Send Request..?   You have only one chance..!</h4>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <i class="mdi mdi-help-circle me-1 text-primary"></i>  Do you want to be a blogger..?
                        </button>
                    </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                    <div class="accordion-body">
                        <div class="col-12">
                                <div class="card-body">

                                    <form role="form" action="{{route('blogger.request.send',Auth::user()->id)}}" method="POST">
                                        @csrf
                                        <div class="mb">
                                            <label for="exampleInputEmail1" class="form-label">Feedback</label>
                                            <textarea type="text" class="form-control @error('feedback') is-invalid @enderror" id="feedback" name="feedback" rows="4"></textarea>
                                            @error('feedback')
                                                <p class="text-danger">{{$message}} </p>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


    @endsection

@else

@section('content')
<x-breadcum slogan="Dashboard" subslogan="Dashboard"></x-breadcum>

<div class="row">
    <div class="title" style="text-align: center">
        <h2>Welcome To The Admin Pannel</h2>
    </div>
    <div class="col-12" style="text-align: center">
        <div class="card">
            <div class="card-body">
                <div><h3><u>Account Info</u></h3></div>
                    <div style="margin-bottom:5px;">
                        @if (auth()->user()->image == 'default.jpg')
                        <img src="{{ asset('uploads/default') }}/{{ auth()->user()->image }}" alt="user-image" style="width: 23%; border-radius:10px">

                        @else
                        <img src="{{ asset('uploads/profile') }}/{{ auth()->user()->image }}" alt="user-image" style="width: 23%; border-radius:10px">

                        @endif
                    </div>
                <div>
                    <span>
                        <h3>Your Name = {{ auth()->user()->name }}</h3>
                    </span>
                </div>
                <div>
                    <span>
                        <h3> Your Role = {{ auth()->user()->role }} </h3>
                    </span>
                </div>
                <div>
                    <span>
                        <h3> Your Email = {{ auth()->user()->email }} </h3>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@endif
