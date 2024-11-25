@extends('layouts.frontendmaster')

@section('frontendcontent')


<!--section-heading-->
<div class="section-heading " >
    <div class="container-fluid">
        <div class="section-heading-2">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading-2-title ">
                        <h1>All Authors</h1>
                        <p class="links"><a href="{{route('frontend')}}">Home <i class="las la-angle-right"></i></a> Author</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--blog-layout-1-->
<div class="authors ">
    <div class="container-fluid">
        <div class="authors-area">
            <div class="row">
                <!--author-1-->

                @foreach ($users as $user)
                    <div class="col-md-6 ">
                        <div class="authors-single">
                            <div class="authors-single-image">
                                <a href="{{route('front.author.name',$user->id)}}">
                                    @if ($user->image == 'default.jpg')
                                        <img src="{{asset('uploads/default')}}/{{$user->image}}" style="width:200px; height:180px" alt="">
                                    @else
                                    <img src="{{asset('uploads/profile')}}/{{$user->image}}" style="width:200px; height:180px" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="authors-single-content ">
                                <div class="left">
                                    <h6> <a href="{{route('front.author.name',$user->id)}}">{{$user->name}}</a></h6>
                                    <p >{{$user->onblog()->where('status', 'active')->count()}}</p>
                                </div>
                                <div class="right">
                                    <div class="more-icon">
                                        <i class="las la-angle-double-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


<!--pagination-->
<div class="pagination">
    <div class="container-fluid">
        <div class="pagination-area">
            <div class="row">
                <div class="col-lg-12">
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
