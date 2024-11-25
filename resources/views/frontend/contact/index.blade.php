@extends('layouts.frontendmaster')

@section('frontendcontent')

 <!--section-heading-->
 <div class="section-heading " >
    <div class="container-fluid">
         <div class="section-heading-2">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-heading-2-title">
                         <h1>Contact us</h1>
                         <p class="links"><a href="{{route('frontend')}}">Home <i class="las la-angle-right"></i></a> contact</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>

<!--contact-->

<section class="contact">
    <div class="container-fluid">
        <div class="contact-area">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-image">
                        <img src="assets/img/other/contact.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h3>feel free to contact us</h3>
                        <p>If you have fell any problem or good things in our site you can share with us.
                            We will carefully read your message and provide you with feedback..</p>
                    </div>

                    @if (session('contact'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{ (session('contact')) }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    @endif

                    <!--form-->
                    <form action="{{route('front.contact.store')}}" class="form " method="POST" id="main_contact_form">
                        @csrf

                        {{-- <div class="alert alert-success contact_msg" style="display: none" role="alert">
                            Your message was sent successfully.
                        </div> --}}

                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name*">
                            @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email*">
                            @error('email')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Subject*">
                            @error('subject')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control @error('message') is-invalid @enderror" placeholder="Message*"></textarea>
                            @error('message')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div><button type="submit" name="submit" class="btn-custom">Send Message</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div
</section>

@endsection
