@extends('layouts.frontendmaster')

@section('frontendcontent')

 <!--post-single-->
 <section class="post-single">
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-lg-12">
                <!--post-single-image-->
                    <div class="post-single-image">
                        <img style="width: 100%" src="{{asset('uploads/blog')}}/{{$blog->thumbnail}}" alt="">
                    </div>

                    <div class="post-single-body">
                        <!--post-single-title-->
                        <div class="post-single-title">
                            <h2> {{$blog->title}}</h2>
                            <ul class="entry-meta">
                                <li class="post-author-img">
                                    @if ($blog->oneuser->image == 'default.jpg')
                                        <img src="{{asset('uploads/default')}}/{{$blog->oneuser->image}}">
                                    @else
                                    <img src="{{asset('uploads/profile')}}/{{$blog->oneuser->image}}">
                                    @endif
                                </li>
                                <li class="post-author"> <a href="author.html">{{$blog->oneuser->name}}</a></li>
                                <li class="entry-cat"> <a href="blog-layout-1.html" class="category-style-1 "> <span class="line"></span> {{$blog->oneuser->role}}</a></li>
                                <li class="post-date"> <span class="line"></span>{{Carbon\Carbon::parse($blog->created_at)->format('F d, Y')}}</li>
                            </ul>

                        </div>

                        <!--post-single-content-->
                        <div class="post-single-content">
                            <p>
                                {!!$blog->short_description!!}
                            </p>
                            <h4> Full Description Here... </h4>

                            <p>
                                {!!$blog->description!!}
                            </p>
                        </div>

                        <!--post-single-bottom-->
                        <div class="post-single-bottom">
                            <div class="tags">
                                <p>Tags:</p>
                                <ul class="list-inline">

                                    @foreach ($categories as $category)
                                        <li >
                                            <a href="{{route('front.category.blog',$category->id)}}">{{$category->title}} </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                            {{-- <div class="social-media">
                                <p>Share on :</p>
                                <ul class="list-inline">
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" >
                                            <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}

                        </div>

                        <!--post-single-author-->
                        <div class="post-single-author ">
                            <div class="authors-info">
                                <div class="image">
                                    <a href="author.html" class="image">
                                        @if ($blog->oneuser->image == 'default.jpg')
                                        <img style="width:300px; height:280px" src="{{asset('uploads/default')}}/{{$blog->oneuser->image}}">
                                    @else
                                    <img style="width:300px; height:280px" src="{{asset('uploads/profile')}}/{{$blog->oneuser->image}}">
                                    @endif
                                    </a>
                                </div>
                                <div class="content">
                                    <h4>{{$blog->oneuser->name}}</h4>
                                    <p> {{$blog->oneuser->email}} </p>
                                    <div class="social-media">
                                        <ul class="list-inline">
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" >
                                                    <i class="fab fa-youtube"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" >
                                                    <i class="fab fa-pinterest"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--post-single-comments-->
                        <div class="post-single-comments">
                            <!--Comments-->
                            <h4 > {{$comments->count()}} Comments </h4>
                            <ul class="comments">
                                <!--comment1-->
                                @foreach ($comments as $comment)
                                    <li class="comment-item">
                                        @if ($comment->oneuser->image=='default.jpg')
                                            <img src="{{asset('uploads/default')}}/{{$comment->oneuser->image}}" alt="">

                                            @else

                                            <img src="{{asset('uploads/profile')}}/{{$comment->oneuser->image}}" alt="">
                                        @endif
                                        <div class="content">
                                            <div class="meta">
                                                <ul class="list-inline">
                                                    <li><a href="#">{{$comment->oneuser->name}}</a> </li>
                                                    <li class="slash"></li>
                                                    <li> {{Carbon\Carbon::parse($comment->created_at)->diffForHumans()}} </li>
                                                </ul>
                                            </div>
                                            <p>
                                                {{$comment->comment}}
                                            </p>
                                            @auth
                                                <a href="#comment_reply" onclick="myFun({{$comment->id}})" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                            @endauth
                                        </div>

                                    </li>

                                    @foreach ($comment->replies as $reply)
                                    <li class="comment-item pl-3">
                                        @if ($reply->oneuser->image=='default.jpg')
                                            <img src="{{asset('uploads/default')}}/{{$reply->oneuser->image}}" alt="">

                                            @else

                                            <img src="{{asset('uploads/profile')}}/{{$reply->oneuser->image}}" alt="">
                                        @endif
                                        <div class="content">
                                            <div class="meta">
                                                <ul class="list-inline">
                                                    <li><a href="#">{{$reply->oneuser->name}}</a> </li>
                                                    <li class="slash"></li>
                                                    <li> {{Carbon\Carbon::parse($reply->created_at)->diffForHumans()}} </li>
                                                </ul>
                                            </div>
                                            <p>
                                                {{$reply->comment}}
                                            </p>
                                            @auth
                                                <a href="#comment_reply" onclick="myFun({{$reply->id}})" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                            @endauth
                                        </div>

                                    </li>

                                    @foreach ($reply->replies as $reply2)
                                    <li class="comment-item pl-5">
                                        @if ($reply2->oneuser->image=='default.jpg')
                                            <img src="{{asset('uploads/default')}}/{{$reply2->oneuser->image}}" alt="">

                                            @else

                                            <img src="{{asset('uploads/profile')}}/{{$reply2->oneuser->image}}" alt="">
                                        @endif
                                        <div class="content">
                                            <div class="meta">
                                                <ul class="list-inline">
                                                    <li><a href="#">{{$reply2->oneuser->name}}</a> </li>
                                                    <li class="slash"></li>
                                                    <li> {{Carbon\Carbon::parse($reply2->created_at)->diffForHumans()}} </li>
                                                </ul>
                                            </div>
                                            <p>
                                                {{$reply2->comment}}
                                            </p>
                                            {{-- @auth
                                                <a href="#comment_reply" onclick="myFun({{$reply2->id}})" class="btn-reply"><i class="las la-reply"></i> Reply</a>
                                            @endauth --}}
                                        </div>

                                    </li>
                                    @endforeach

                                    @endforeach

                                @endforeach

                                </ul>
                            <!--Leave-comments-->
                            @auth
                                <div class="comments-form" id="comment_reply">
                                    <h4 >Leave a Comment</h4>
                                    <!--form-->
                                    <form class="form " action="{{route('front.blog.comment',$blog->id)}}" method="POST" id="main_contact_form">
                                        @csrf

                                        <p>Your email adress will not be published ,Requied fileds are marked*.</p>

                                        @if (session('success_comment'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <i class="mdi mdi-check-all me-2"></i>
                                                {{ (session('success_comment')) }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>

                                        @endif
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input name="parent_id" type="text" class="form-control" id="forreply" hidden>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="comment" id="comment" cols="30" rows="5" class="form-control @error('comment') is-invalid @enderror" placeholder="Write Your Comment Here"></textarea>
                                                    @error('comment')
                                                    <p class="text-danger"> {{$message}} </p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <button type="submit" name="submit" class="btn-custom">
                                                    Send Comment
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!--/-->
                                </div>
                            @endauth
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>



                <script>

                    let forreply = document.querySelector('#forreply');

                    function myFun(id){
                        // console.log(id);
                        forreply.value= id;
                    }
                </script>



@endsection
