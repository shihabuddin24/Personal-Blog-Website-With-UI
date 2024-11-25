@extends('layouts.frontendmaster')

@section('frontendcontent')


<div class="page404 ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="page404-content">
                <img src="{{asset('frontend')}}/assets/img/other/error404.png" alt="">
                    <h3>Oops... Privacy isn't declared yet!</h3>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
