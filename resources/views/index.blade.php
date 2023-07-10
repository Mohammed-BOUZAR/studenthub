@include('include.header')

<!-- SLIDER SECTION START -->

<section class="navbar-bottom-space fixNavColor">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
            <li data-target="#demo" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/1.jpg') }}" alt="Los Angeles">
                <div class="carousel-caption">
                    <h3 class="slider-heading-text">WELCOME TO <span class="education">EDUCATION</span></h3>
                    <p class="slider-para-text">You can learn anything</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/2.jpg') }}" alt="Chicago">
                <div class="carousel-caption">
                    <h3 class="slider-heading-text"><span class="education">EDUCATION</span> IS A PATH</h3>
                    <p class="slider-para-text">Not a destination</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/3.jpg') }}" alt="New York">
                <div class="carousel-caption">
                    <h3 class="slider-heading-text"><span class="education">EDUCATION</span> IS KEY TO SUCCESS</h3>
                    <p class="slider-para-text">No Nation Can Prosper In Life Without Education</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/4.jpg') }}" alt="New York">
                <div class="carousel-caption last-img">
                    <h3 class="slider-heading-text"><span class="education">EDUCATION’S</span> PURPOSE IS</h3>
                    <p class="slider-para-text">To replace an empty mind with an open one</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</section>

<!-- SLIDER SECTION END -->

<!-- EDUCATION SECTION START -->

<section class="education-sec">
    <div class="container-fluid">
        <div class="container cutm-border">
            <div class="row text-center">
                <div class="col-sm-12">
                    <p class="education-para"><span class="edu">Education</span> is the most powerful weapon which
                        you can use to change the world</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- EDUCATION SECTION END -->

<!-- WE DO SECTION START -->

<section class="we-do-sec">
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <p class="what-we-text">WHAT <span class="we-do">WE DO</span></p>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-graduation-cap mb-2 card-icons"></i>
                            <h5 class="card-title text-uppercase my-3">Professional Study</h5>
                            <p class="card-text">Focusing on a body of knowledge that is more strictly delineated and
                                canonical than non-professional studies</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-book mb-2 card-icons"></i>
                            <h5 class="card-title text-uppercase my-3">Summer Session</h5>
                            <p class="card-text middle-card-text">Our summer session begins on 1 May and ends on 1
                                August</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-globe mb-2 card-icons"></i>
                            <h5 class="card-title text-uppercase my-3">Global Education</h5>
                            <p class="card-text">Understandings of the economic, cultural, political and environmental
                                influences which shape our lives</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WE DO SECTION END -->

<!-- ACHIVEMENT SECTION START -->

<section class="achivement-sec">
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <p class="pround-text">We Have Something To Be Proud Of</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid blur-bg">
        <div class="container bottom-space">
            <div class="row text-center blur-row">
                <div class="col-md-4">
                    @php
                        $data = DB::table('teachers')
                            ->where('status', '1')
                            ->get();
                        $count = $data->count();
                    @endphp
                    <p class="achive-para number">{{ $count }}</p>
                    <p class="achive-para2">Certified Teachers</p>
                </div>
                <div class="col-md-4">
                    @php
                        $data = DB::table('students')->get();
                        $count = $data->count();
                    @endphp
                    <p class="achive-para number">{{ $count }}</p>
                    <p class="achive-para2">Students</p>
                </div>
                <div class="col-md-4">
                    @php
                        $data = DB::table('subscribes')->get();
                        $count = $data->count();
                    @endphp
                    <p class="achive-para number">{{ $count }}</p>
                    <p class="achive-para2">Subscribers</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ACHIVEMENT SECTION END -->

<!-- CAREER ADVICE SECTION START -->

<section class="career-sec">
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <p class="career-heading">CAREER ADVICE</p>
                </div>
                <div class="col-lg-6 career-content">
                    <img src="{{ asset('images/career.jpg') }}" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 career-content">
                    <p class="grow-text">Grow Your Digital Skills With Accenture</p>
                    <p class="grow-sub-text but">But I must explain to you how all this mistaken idea of denouncing
                        pleasure and praising pain was born, a complete account of the system, and expound the actual
                        teachings of the great explorer of the truth and will unfold in the master-builder of human
                        happiness.</p>
                    <p class="grow-text ourteam">Our team of professionals</p>
                    <div class="professionals">
                        <p class="grow-sub-text"><i class="fas fa-check check"></i>They focus on goals and results</p>
                        <p class="grow-sub-text"><i class="fas fa-check check"></i>Team members are diverse</p>
                        <p class="grow-sub-text"><i class="fas fa-check check"></i>Good leadership</p>
                        <p class="grow-sub-text"><i class="fas fa-check check"></i>They’re organised</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CAREER ADVICE SECTION END -->

<!-- SUBSCRIBE SECTION START -->

<section class="subscribe-sec">
    <div class="container-fluid">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12">
                    <p class="pround-text sub-main-para">SUBSCRIBE NOW!</p>
                    <p class="sub-para">Enter your email address to get the latest news, special events and student
                        activities delivered right to your inbox.</p>
                    <div class="subscribe-grid">
                        <form action="/subscribe" method="post">
                            @csrf
                            <input class="email-type" type="email" placeholder="Enter your email.."
                                name="Subscribe" required="true">
                            <button type="submit" name="subscribebtn" class="btn-subscribe">SUBSCRIBE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SUBSCRIBE SECTION END -->

@include('include.footer')
