<div class="position-relative" style="z-index: 9;">
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
        <a href="" class="navbar-brand">
            <h1 class="text-uppercase text-primary mb-1">Rent N Go</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        @php
        $url=explode('/',url()->full());
        @endphp
        <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="{{route('home')}}" class="nav-item nav-link {{in_array('home', $url) ? 'active' : ''}}">Dashboard</a>
                <a href="{{route('my_bookings')}}" class="nav-item nav-link {{in_array('my-bookings', $url) ? 'active' : ''}}">My Bookings</a>
                <a href="{{route('new_booking')}}" class="nav-item nav-link {{in_array('new-booking', $url) || in_array('car_book', $url) ? 'active' : ''}}">New Booking</a>
                <a href="{{route('profile')}}" class="nav-item nav-link {{in_array('profile', $url) ? 'active' : ''}}">Profile</a>
            </div>
            <div class="ml-auto">
                <a href="{{ route('logout') }}" class="nav-item nav-link text-white" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
</div>