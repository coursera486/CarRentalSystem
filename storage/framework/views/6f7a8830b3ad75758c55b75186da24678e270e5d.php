<div class="col-12 col-lg-4 col-xl-3">
        <div class="row gy-4">
          <div class="col-12">
            <div class="card widget-card border-light shadow-sm">
              <h4 class="card-header text-bg-primary">Welcome, <?php echo e(auth()->user()->name); ?></h4>
              <div class="card-body">
                <div class="text-center mb-3">
                  <img src="<?php echo e(url('uploads/profile/'.$user->image)); ?>" class="img-fluid rounded-circle">
                </div>
                <h5 class="text-center mb-1"><?php echo e(auth()->user()->name); ?></h5>
                <p class="text-center text-secondary mb-4">Project Manager</p>
                <ul class="list-group list-group-flush mb-4">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Total Bookings</h6>
                    <span>7,854</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Total Payment</h6>
                    <span>5,987</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <h6 class="m-0">Friends</h6>
                    <span>4,620</span>
                  </li>
                </ul>
                <div class="d-grid m-0">
                  <button class="btn btn-outline-primary" type="button">New Booking</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card widget-card border-light shadow-sm">
              <div class="card-header text-bg-primary">Booking History</div>
              <div class="card-body">
                <ul class="list-group list-group-flush mb-0">
                  <li class="list-group-item">
                    <h6 class="mb-1">
                      <span class="bii bi-mortarboard-fill me-2"></span>
                      This Year
                    </h6>
                    <span>34 Bookings</span>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-1">
                      <span class="bii bi-geo-alt-fill me-2"></span>
                      This month
                    </h6>
                    <span>23 Bookings</span>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-1">
                      <span class="bii bi-building-fill-gear me-2"></span>
                      This week
                    </h6>
                    <span>3 Bookings</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div><?php /**PATH C:\xampp\htdocs\CarRentalSystem\resources\views/sideDetails.blade.php ENDPATH**/ ?>