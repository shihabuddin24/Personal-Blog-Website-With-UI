@extends('layouts.frontendmaster')

@section('frontendcontent')

 <!--section-heading-->

 <link rel="stylesheet" href="{{asset('frontend/assets/about.css')}}">
 <div class="section-heading " >
    <div class="container-fluid">
         <div class="section-heading-2">
             <div class="row">
                 <div class="col-lg-12">
                     <div class="section-heading-2-title">
                         <h1>About us</h1>
                         <p class="links"><a href="{{route('frontend')}}">Home <i class="las la-angle-right"></i></a> about</p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>

<!--about-us-->
<section class="about-us">
    <div class="col-12">
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
                <div class="card" style="border: 2px solid rgb(136, 123, 123)">
                    <img src="{{asset('about-us/shihab.jpg')}}" class="card-img-top" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Developer Details..</h5>
                        <ul style="font-size: 15px; font-color:rgb(90, 87, 87)">
                            <li><strong>Profession:</strong> Full Stack Developer</li>
                            <li><strong>Full Name:</strong> Shihab Uddin</li>
                            <li><strong>Degree:</strong> Diploma In Engineering</li>
                            <li><strong>Skills:</strong> PHP, HTML, Css, JavaScript</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="border: 2px solid rgb(136, 123, 123)">
                    <img src="{{asset('about-us/junaid.jpg')}}" class="card-img-top" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Developer Details..</h5>
                        <ul style="font-size: 15px">
                            <li><strong>Profession:</strong> MERN Stack Developer</li>
                            <li><strong>Full Name:</strong> Asm Junaid Ahmed</li>
                            <li><strong>Degree:</strong> Diploma In Engineering</li>
                            <li><strong>Skills:</strong> MERN, HTML, Css, JavaScript</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="border: 2px solid rgb(136, 123, 123)">
                    <img src="{{asset('about-us/jahid.jpg')}}" class="card-img-top" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Developer Details..</h5>
                        <ul style="font-size: 15px">
                            <li><strong>Profession:</strong>  Frontend Developer</li>
                            <li><strong>Full Name:</strong> Jahid Hasan</li>
                            <li><strong>Degree:</strong> Diploma In Engineering</li>
                            <li><strong>Skills:</strong> HTML, Css, JavaScript</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="border: 2px solid rgb(136, 123, 123)">
                    <img src="{{asset('about-us/ripon.jpg')}}" class="card-img-top" alt="Card image">
                    <div class="card-body">
                        <h5 class="card-title">Developer Details..</h5>
                        <ul style="font-size: 15px">
                            <li><strong>Profession:</strong> WordPress Developer</li>
                            <li><strong>Full Name:</strong> Ripon Mia</li>
                            <li><strong>Degree:</strong> Diploma In Engineering</li>
                            <li><strong>Skills:</strong> CMS, HTML, Css</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="description" style="margin: 10px; margin-top:20px">
        <h3 >Thank you for checking out our blog website.</h3>
        <p>
            We, a group of four friends from Bogura Polytechnic Institute's 8th semester, have successfully created a blog website using Laravel as our final project assigned by our college.
            This project showcases our ability to develop and manage dynamic web applications. During the development process, we applied skills and knowledge acquired from the "Web and Software Development" course we completed at Creative IT.
            The course was instrumental in sharpening our understanding of modern web technologies, particularly Laravel, enabling us to handle complex functionalities like user authentication, content management, and search optimization effectively.
        </p>
        <p>
            Our blog website is a collaborative effort aimed at creating an engaging and user-friendly platform.
            Each team member contributed uniquely, from frontend design to backend logic, ensuring the project met all requirements.
            The website includes features like user registration, post creation, category management, and a responsive design, making it accessible across devices.
            This project not only reflects our technical competence but also highlights our teamwork and problem-solving capabilities.
        </p>
        <p>
            Completing this project has been a rewarding experience, allowing us to integrate theoretical knowledge with practical implementation.
            It has also prepared us for real-world challenges in web development. We are proud of our accomplishment and grateful to our instructors and mentors for their guidance throughout the journey.
        </p>


    </div>
</section>

@endsection



