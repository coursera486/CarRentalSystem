   <!-- Navbar Start -->
   <div class="container-fluid position-relative nav-bar p-0">
    @php
        $url=explode('/',url()->full());
    @endphp
        <div class="position-relative" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1">Rent N Go</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="{{route('index')}}" class="nav-item nav-link {{in_array('index', $url) ? 'active' : ''}}">Home</a>
                        <a href="{{route('about')}}" class="nav-item nav-link {{in_array('about', $url) ? 'active' : ''}}">About</a>
                        <a href="{{route('service')}}" class="nav-item nav-link {{in_array('service', $url) ? 'active' : ''}}">Service</a>
                        <a href="{{route('car')}}" class="nav-item nav-link {{in_array('car', $url) ? 'active' : ''}}">Cars</a>
                        <a href="{{route('testimonial')}}" class="nav-item nav-link {{in_array('testimonial', $url) ? 'active' : ''}}">Testimonials</a>
                        
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle {{in_array('car', $url) || in_array('detail', $url) || in_array('booking', $url) ? 'active' : ''}}" data-toggle="dropdown">Cars</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route('car')}}" class="dropdown-item">Car Listing</a>
                                <a href="{{route('detail')}}" class="dropdown-item">Car Detail</a>
                                <a href="{{route('booking')}}" class="dropdown-item">Car Booking</a>
                            </div>
                        </div> -->
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle {{in_array('testimonial', $url) ? 'active' : ''}}" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="{{route('testimonial')}}" class="dropdown-item">Testimonial</a>
                            </div>
                        </div> -->
                        <a href="{{route('contact')}}" class="nav-item nav-link {{in_array('contact', $url) ? 'active' : ''}}">Contact</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Search Start -->
    <div class="container-fluid bg-white pt-3 px-lg-5">
        <div class="row mx-n2">
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select class="custom-select px-4 mb-3" style="height: 50px;">
                    <option selected>Pickup Location</option>
                    <option value="1">Location 1</option>
                    <option value="2">Location 2</option>
                    <option value="3">Location 3</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <div class="date mb-3" id="date" data-target-input="nearest">
                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Date"
                        data-target="#date" data-toggle="datetimepicker" />
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <div class="time mb-3" id="time" data-target-input="nearest">
                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Time"
                        data-target="#time" data-toggle="datetimepicker" />
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select class="custom-select px-4 mb-3" style="height: 50px;">
                    <option selected>Select A Car</option>
                    <option value="1">Car 1</option>
                    <option value="2">Car 1</option>
                    <option value="3">Car 1</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <button class="btn btn-secondary btn-block mb-3" type="submit" style="height: 50px;">Search</button>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <a href="{{route('user_login')}}"><button class="btn btn-primary btn-block mb-3" type="button" style="height: 50px;">Register/Login</button>
            </div>
        </div>
    </div>
    <!-- Search End -->