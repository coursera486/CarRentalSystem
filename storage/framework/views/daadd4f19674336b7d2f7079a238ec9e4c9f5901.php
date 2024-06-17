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

  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css ')); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css ')); ?>">

</head>

<body>
  <?php echo $__env->make('user.userAuthHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <section class="">

    <!-- <div class="container"> -->
    <div class="p-4 bg-light">
      <div class="row">
        <?php echo $__env->make('user.sideDetails', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-12 col-lg-8 col-xl-9">
          <div class="card widget-card border-light shadow-sm">
            <div class="card-body p-4">
              <div class="tab-content" id="profileTabContent">
                <div class="tab-pane fade show active" id="overview-tab-pane" role="tabpanel" aria-labelledby="overview-tab" tabindex="0">
                  <h5 class="mb-3">Dashboard</h5>
                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <div class="bg-primary p-5 rounded position-relative">
                        <i class="fas fa-car fa-3x position-absolute top-50 start-50 translate-middle text-white"></i>
                        <div class="text-center mt-4 text-white">Total Bookings</div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="bg-secondary p-5 rounded position-relative">
                        <i class="fas fa-dollar-sign fa-3x position-absolute top-50 start-50 translate-middle text-white"></i>
                        <div class="text-center mt-4 text-white">Total Payment</div>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                      <div class="bg-danger p-5 rounded position-relative">
                        <i class="fas fa-user-circle fa-3x position-absolute top-50 start-50 translate-middle text-white"></i>
                        <div class="text-center mt-4 text-white">Total</div>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-12">
                      Latest Bookings
                      <div class="table-responsive mt-2">
                        <table id="city_data_table" class="table table-striped table-bordered w-100" style="width: 100%;">
                          <thead>
                            <tr>
                              <th>S.No.</th>
                              <th>Booking ID</th>
                              <th>Car</th>
                              <th>Pickup date time</th>
                              <th>Drop date time</th>
                              <th>Total Amount</th>
                              <th>Payment Status</th>
                              <th>Booking Status</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                        <!-- datatable ends -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
  $(document).ready(function() {
    bookingDataTable();

    function bookingDataTable(state_filter = '') {
      var i = 1;
      $('#city_data_table').DataTable().clear().destroy();

      $("#city_data_table").DataTable({
        serverSide: true,
        processing: true,
        searching: true,
        dom: "<'row' <'col-12 mb-1' l>> Bfrtip",
        "aLengthMenu": [
          [25, 50, 100, 200, 300, 400, 500, 1000, -1],
          [25, 50, 100, 200, 300, 400, 500, 1000, "All"]
        ],
        "iDisplayLength": 25,
        buttons: [{
            text: '<i class="bx bx-file"></i> CSV',
            className: 'btn-success btn btn-sm mb-0',
            attr: {
              id: 'csv'
            },
            extend: "csv",
            filename: 'cityList',
            exportOptions: {
              columns: ":visible",
              columns: [0, 1, 2, 3]
            },
          },
          {
            text: '<i class="bx bx-printer"></i> Print',
            className: 'btn-warning btn btn-sm mb-0',
            extend: "print",
            attr: {
              id: 'print'
            },
            exportOptions: {
              columns: ":visible",
              columns: [0, 1, 2, 3]
            },
          },
          {
            text: '<i class="bx bxs-file-pdf"></i> PDF',
            className: 'btn-danger btn btn-sm mb-0',
            extend: "pdfHtml5",
            exportOptions: {
              columns: ":visible",
              columns: [0, 1, 2, 3]
            },
            attr: {
              id: 'pdf'
            },
            filename: 'cityList',
          },
          {
            text: '<i class="bx bx-copy-alt"></i> Copy',
            className: 'btn-info btn btn-sm mb-0',
            extend: "copyHtml5",
            exportOptions: {
              columns: ":visible",
              columns: [0, 1, 2, 3]
            },
            attr: {
              id: 'copy'
            },
          },
        ],
        order: [],

        ajax: {
          url: "<?php echo e(route('bookingDataTable')); ?>",
          type: "GET",
          data: {
            state_filter: state_filter,
          }
        },

        columns: [{
            "render": function(data, type, row, meta) {
              var pageNumber = Math.floor(meta.row / meta.settings
                ._iDisplayLength) + 1;
              var i = meta.settings._iDisplayStart + meta.row + 1;
              return i;
            }
          },
          {
            data: 'booking_id'
          },
          {
            data: 'car'
          },
          {
            data: 'pickup_date_time'
          },
          {
            data: 'drop_date_time'
          },
          {
            data: 'total_amount'
          },
          {
            data: 'payment_status'
          },
          {
            data: 'booking_status'
          },
          {
            data: 'actions'
          },
        ]

      });
    }
  });
</script>

</html><?php /**PATH C:\xampp\htdocs\CarRentalSystem\resources\views/user/home.blade.php ENDPATH**/ ?>