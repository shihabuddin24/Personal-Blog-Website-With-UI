@extends('layouts.frontendmaster')

@section('frontendcontent')


<!--section-heading-->
<div class="section-heading " >
    <div class="container-fluid">
        <div class="section-heading-2">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading-2-title text-left">
                        <h2>Search resultats for : {{$search}} </h2>
                        <p class="desc"><strong>{{$blogs->count()}}</strong> Blogs were found for your keyword..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--blog-layout-1-->
<div class="blog-search">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10">

                 <!--Post1-->
                    @if ($blogs->isEmpty())

                    <div class="page404 ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 m-auto">
                                    <div class="page404-content">
                                    <img src="{{asset('frontend')}}/assets/img/other/error404.png" alt="">
                                        <h3>Blogs Not Found!</h3>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @else

                    @foreach ($blogs as $blog)

                        <div class="post-list post-list-style2">
                            <div class="post-list-image">
                                <a href="{{route('front.blog.single',$blog->id)}}">
                                    <img style="height: 350px; width:400px;" src="{{asset('uploads/blog')}}/{{$blog->thumbnail}}" alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <h3 class="entry-title">
                                    <a href="{{route('front.blog.single',$blog->id)}}">{{$blog->title}}</a>
                                </h3>
                                <ul class="entry-meta">
                                    <li class="post-author-img">
                                        @if ($blog->oneuser->image == 'default.jpg')
                                            <img src="{{asset('uploads/default')}}/{{$blog->oneuser->image}}" alt="">
                                        @else
                                        <img src="{{asset('uploads/profile')}}/{{$blog->oneuser->image}}" alt="">
                                        @endif
                                    </li>
                                    <li class="post-author"> <a href="{{route('front.author.name',$blog->oneuser->id)}}">{{$blog->oneuser->name}}</a></li>
                                    <li class="entry-cat"> <a href="{{route('front.author.name',$blog->oneuser->id)}}" class="category-style-1 "> <span class="line"></span> {{$blog->oneuser->role}}</a></li>
                                    <li class="post-date"> <span class="line"></span>{{Carbon\Carbon::parse($blog->created_at)->format('F d, Y')}}</li>
                                </ul>
                                <div class="post-exerpt">
                                    <p>{!!$blog->short_description!!}</p>
                                </div>
                                <div class="post-btn">
                                    <a href="{{route('front.blog.single',$blog->id)}}" class="btn-read-more">Continue Reading <i class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    @endif

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
                    {{$blogs->links()}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
