<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Home</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css ') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css ') }}">

</head>

<body>
  @include('user.userAuthHeader')
  <section class="">

    <!-- <div class="container"> -->
    <div class="p-4 bg-light">
      <div class="row">
        @include('user.sideDetails')

        <div class="col-12 col-lg-8 col-xl-9">
          <div class="card widget-card border-light shadow-sm">
            <div class="card-body p-4">
              <div class="tab-content" id="profileTabContent">
                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                  <h5 class="mb-3">Profile</h5>

                  <div class="row p-4">
                    <form class="row gy-3 gy-xxl-4" id="profileForm">

                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>Name</b><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                      </div>
                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>Mobile number</b><span class="text-danger">*</span></label>
                        <input type="number" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                      </div>
                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>Email</b><span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                      </div>
                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>Address</b><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
                      </div>
                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>State</b><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="state" name="state" value="{{$user->state}}">
                      </div>
                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>City</b><span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="city" name="city" value="{{$user->city}}">
                      </div>
                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>Pincode</b><span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="pincode" name="pincode" value="{{$user->pincode}}">
                      </div>
                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>Date of birth</b><span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{$user->dob}}">
                      </div>
                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>Age</b><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="age" name="age" value="{{$user->age}}">
                      </div>
                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>Driving License</b><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="driving_license" name="driving_license" value="{{$user->driving_license}}">
                      </div>
                      <div class="col-12 col-md-6 mb-3">
                        <label class="form-label"><b>Aadhar number</b><span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="aadhar" name="aadhar" value="{{$user->aadhar}}">
                      </div>
                      <div class="col-12">
                        <label class="form-label"><b>About</b></label>
                        <textarea class="form-control" id="about" name="about">{{ $user->about }}</textarea>
                      </div>
                      <div class="col-12 col-md-6 mb-3 mt-4">
                        <label class="col-12 form-label">Profile Image</label>
                        <img src="{{ url('uploads/profile/'.$user->image) }}" class="img-fluid">
                        <input type="file" id="image" name="image" class="form-control">
                      </div>
                      <div class="col-12 mt-3">
                        <button type="button" class="btn btn-primary float-right submit_profile">Save Changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

  </section>
  @include('layouts.footer')
  <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
  $(document).ready(function() {
    $(document).on("click", ".submit_profile", function(event) {
      event.preventDefault();
      let myForm = document.getElementById('profileForm');
      var formData = new FormData(myForm);
      formData.append('_token', '{{ csrf_token() }}');
      $(this).attr('disabled', true);
      $.ajax({
        type: "post",
        data: formData,
        url: "{{ route('save_profile') }}",
        cache: false,
        contentType: false,
        processData: false,
        success: function(result) {
          if (result.status == true) {
            Swal.fire({
              title: "Success",
              text: result.message,
              icon: "success",
              button: "OK",
            }).then((result) => {
              window.location.href = "{{ route('profile') }}";
            });
          } else {
            Swal.fire({
              title: "Error",
              text: result.message,
              icon: "error",
              button: "OK",
            });
            $('.book_car_button').prop('disabled', false);
          }
        }
      });
    });
  });
</script>

</html>