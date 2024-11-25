@if (auth()->user()->role != 'blogger')
    @extends('layouts.homemaster')

    @section('content')
    <x-breadcum slogan="User Requests" subslogan="Blogger Request"></x-breadcum>


    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        {{ (session('success')) }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="row">
            @forelse ($requests as $req)
            <div class="col-3">
                <!-- Simple card -->
                <div class="card">
                    @if ($req->oneuser->image=='default.jpg')
                        <img class="card-img-top img-fluid" src="{{asset('uploads/default')}}/{{$req->oneuser->image}}" alt="Card image cap">
                    @else
                        <img class="card-img-top img-fluid" src="{{asset('uploads/profile')}}/{{$req->oneuser->image}}" alt="Card image cap">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">Feedback</h5>
                        <p class="card-text">{{$req->feedback}} </p>
                        <a href="{{route('blogger.request.accept',$req->id)}}" class="btn btn-primary waves-effect waves-light">Accept</a>
                        <a href="{{route('blogger.request.cancel',$req->id)}}" class="btn btn-danger waves-effect waves-light">Cancel</a>
                    </div>
                </div>
            </div>

            @empty

            @section('content')
            <x-breadcum slogan="User Requests" subslogan="Blogger Request"></x-breadcum>

            <div class="row">
                <div class="col-12">
                    <div class="">
                        <div class="card-body">
                            <h1 style="text-align:center; margin-top:20%">
                                There is no blogger request for you!
                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            @endsection

            @endforelse

            {{-- pagination --}}

            <div class="pagination">
            <div class="container-fluid">
                <div class="pagination-area">
                    <div class="row">
                        <div class="col-lg-12">
                            {{$requests->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>



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
