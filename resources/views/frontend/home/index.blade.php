@extends('layouts.frontendmaster')

@section('frontendcontent')

<!-- blog-slider-->

<section class="blog blog-home4 d-flex align-items-center justify-content-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel">
                    <!--post1-->
                    @forelse ($features as $feature)
                        <div class="blog-item" style="background-image: url('{{asset('uploads/blog')}}/{{$feature->thumbnail}}')">
                            <div class="blog-banner">
                                <div class="post-overly">
                                    <div class="post-overly-content">
                                        <div class="entry-cat">
                                            <a href="{{route('front.category.blog',$feature->onecategory->id)}}" class="category-style-2">{{$feature->onecategory->title}} </a>
                                        </div>
                                        <h2 class="entry-title">
                                            <a href="{{route('front.blog.single',$feature->id)}}">
                                                {{$feature->title}}
                                            </a>
                                        </h2>
                                        <ul class="entry-meta">
                                            <li class="post-author"> <a href="{{route('front.author.name',$feature->oneuser->id)}}">{{$feature->oneuser->name}}</a></li>
                                            <li class="post-date"> <span class="line"></span>{{Carbon\Carbon::parse($feature->created_at)->format('M d, Y')}} </li>
                                            {{-- <li class="post-timeread"> <span class="line"></span> 15 mins read</li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="blog-item" style="background-image: url('{{asset('uploads/default/default.jpg')}}')">
                        <div class="blog-banner">
                            <div class="post-overly">
                                <div class="post-overly-content">
                                    <div class="entry-cat">
                                        <a href="#" class="category-style-2">Category</a>
                                    </div>
                                    <h2 class="entry-title">
                                        <a href="#">
                                            Title
                                        </a>
                                    </h2>
                                    <ul class="entry-meta">
                                        <li class="post-author"> <a href="#">Name</a></li>
                                        <li class="post-date"> <span class="line"></span>{{now()->format('M d, Y')}} </li>
                                        {{-- <li class="post-timeread"> <span class="line"></span> 15 mins read</li> --}}
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>

<!-- top categories-->
<div class="categories">
    <div class="container-fluid">
        <div class="categories-area">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="categories-items">

                        @foreach ($categories as $category)
                            <a class="category-item" href="{{route('front.category.blog',$category->id)}}">
                                <div class="image">
                                    <img src="{{asset('uploads/category')}}/{{$category->image}}" alt="" style="width: 120px; height:120px; object-fit:cover">
                                </div>
                                <p>
                                    {{$category->title}} <span>{{$category->onblog()->where('status', 'active')->count()}}</span>
                                </p>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent articles-->
<section class="section-feature-1">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 oredoo-content">
                <div class="theiaStickySidebar">
                    <div class="section-title">
                        <h3>recent Articles </h3>
                        <p>Discover the most outstanding articles in all topics of life.</p>
                    </div>

                    <!--post1-->
                    @forelse ($blogs as $blog)
                        <div class="post-list post-list-style4">
                            <div class="post-list-image">
                                <a href="{{route('front.blog.single',$blog->id)}}">
                                    <img src="{{asset('uploads/blog')}}/{{$blog->thumbnail}}" style="height: 300px; width:350px; alt="">
                                </a>
                            </div>
                            <div class="post-list-content">
                                <ul class="entry-meta">
                                    <li class="entry-cat">
                                        <a href="{{route('front.category.blog',$blog->onecategory->id)}}" class="category-style-1"> {{$blog->onecategory->title}} </a>
                                    </li>
                                    <li class="post-date"> <span class="line"></span>{{Carbon\Carbon::parse($blog->created_at)->format('M d, Y')}} </li>
                                </ul>
                                <h5 class="entry-title">
                                    <a href="{{route('front.blog.single',$blog->id)}}">
                                        {{$blog->title}}
                                    </a>
                                </h5>

                                <div class="post-btn">
                                    <a href="{{route('front.blog.single',$blog->id)}}" class="btn-read-more">Continue Reading <i
                                            class="las la-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty

                    <div class="page404 ">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 m-auto">
                                    <div class="page404-content">
                                    <img src="{{asset('frontend')}}/assets/img/other/error404.png" alt="">
                                        <h3>Blogs Not Found!</h3>
                                        {{-- <a href="{{route('frontend')}}" class="btn-custom">Back to homepage</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforelse

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

            </div>
        </div>

            <!--Sidebar-->
            <div class="col-lg-4 oredoo-sidebar">
                <div class="theiaStickySidebar">
                    <div class="sidebar">

                        <!--popular-posts-->
                        <div class="widget">
                            <div class="widget-title">
                                <h5>popular Posts</h5>
                            </div>

                            <ul class="widget-popular-posts">
                                <!--post1-->
                                @foreach ($popularPosts as $post)
                                    <li class="small-post">
                                        <div class="small-post-image">
                                            <a href="{{route('front.blog.single',$post->id)}}">
                                                <img src="{{asset('uploads/blog')}}/{{$post->thumbnail}}" alt="">
                                                <small class="nb">{{$loop->iteration }} </small>
                                                {{-- $loop->index +1 er poriborte interation --}}
                                            </a>
                                        </div>
                                        <div class="small-post-content">
                                            <p>
                                                <a href="{{route('front.blog.single',$post->id)}}">
                                                    {{$post->title}}
                                                </a>
                                            </p>
                                            <small> <span class="slash"></span>{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</small>
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        </div>

                        <!--stay connected-->
                        <div class="widget ">
                            <div class="widget-title">
                                <h5>Stay connected</h5>
                            </div>

                            <div class="widget-stay-connected">
                                <div class="list">

                                    @foreach ($socialLinks as $link)
                                        <div class="item color-{{ strtolower($link->platform) }}">
                                            <a href="{{ strtolower($link->url) }}" target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-{{ strtolower($link->platform) }}"></i>
                                            </a>
                                            <p>{{ $link->platform }}</p>
                                        </div>
                                    @endforeach


                                    {{-- egulo link .env theke ana hoyeche --}}

                                    {{-- <div class="item color-instagram">
                                        <a href="{{ env('SOCIAL_INSTAGRAM') }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                                        <p>Instagram</p>
                                    </div>

                                    <div class="item color-twitter">
                                        <a href="{{ env('SOCIAL_TWITTER') }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                                        <p>Twitter</p>
                                    </div>

                                    <div class="item color-youtube">
                                        <a href="{{ env('SOCIAL_YOUTUBE') }}" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube"></i></a>
                                        <p>Youtube</p>
                                    </div> --}}

                                </div>
                            </div>
                        </div>


                        <!--Tags-->
                        <div class="widget">
                            <div class="widget-title">
                                <h5>Tags</h5>
                            </div>
                            <div class="widget-tags">
                                <ul class="list-inline">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{route('front.category.blog',$category->id)}}">{{$category->title}} </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/-->
        </div>
    </div>
</section>


@endsection
