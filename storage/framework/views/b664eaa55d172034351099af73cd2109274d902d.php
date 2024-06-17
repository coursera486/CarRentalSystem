<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Car Add/Update</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <style type="text/css">
    .p-1 {
    padding:0.7rem !important;
    background-color:#190e27;
    color:white;
    }

    .autocomplete-items div {
    padding: 10px;
    cursor: pointer;
    background-color: #fff; 
    border-bottom: 1px solid #d4d4d4; 
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
    background-color: #e9e9e9; 
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
    background-color: DodgerBlue !important; 
    color: #ffffff; 
    }

    #selected_pincodes + span .select2-selection {
    border: none;
    }

    </style>

<!-- BEGIN: Content-->
    <?php
      $url=explode('/',url()->full());
    ?>

<div class="app-content content mt-2">
  <div class="content-overlay"></div>
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <!-- Dashboard Ecommerce Starts -->          
      <section class="list-group-navigation">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header text-center">
                <h3><b><?php echo e(in_array('edit_car', $url) ? 'Update Car' : 'Add New Car'); ?></b></h3>
              </div>
              <div class="card-body">
                <form method="post" id="add_car">
                  <?php echo csrf_field(); ?>
                <input type="hidden" id="car_id" name="car_id" value="<?php echo e(isset($car->id) ? $car->id : ''); ?>">
                <h6 class="mb-1 text-uppercase p-1 rounded"><i class="bx bx-user"></i>&nbsp&nbsp&nbsp Basic Information</h6>
                  <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Car Make<span class="text-danger">*</span> </label>
                        <input type="text" id="car_make" name="car_make" class="form-control" placeholder="Enter Car Make" value="<?php echo e(isset($car->car_make) ? $car->car_make : ''); ?>">
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Car Model<span class="text-danger">*</span></label>
                        <input type="text" id="car_model" name="car_model" class="form-control" placeholder="Enter Car Model" value="<?php echo e(isset($car->car_model) ? $car->car_model : ''); ?>">
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Year<span class="text-danger">*</span></label>
                        <input type="number" id="year" name="year" class="form-control" placeholder="Enter Year" value="<?php echo e(isset($car->year) ? $car->year : ''); ?>">
                      </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">VIN (Vehicle Identification Number)<span class="text-danger">*</span></label>
                        <input type="text" id="vin" name="vin" class="form-control" placeholder="Enter Vehicle Identification Number" value="<?php echo e(isset($car->vin) ? $car->vin : ''); ?>">
                      </div>
                    </div>
                    </div>

                    <h6 class="mb-1 text-uppercase p-1 rounded mt-2"><i class="bx bx-user"></i>&nbsp&nbsp&nbsp Specifications</h6>
                    <div class="row mb-2">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Engine Type<span class="text-danger">*</span></label>
                          <select class="form-control select2" id="engine_type" name="engine_type">
                            <option value="" disabled selected>Select</option>
                            <option value="Petrol" <?php echo e(isset($car->engine_type) && $car->engine_type=='Petrol' ? 'Selected' : ''); ?>>Petrol</option>
                            <option value="Diesel" <?php echo e(isset($car->engine_type) && $car->engine_type=='Diesel' ? 'Selected' : ''); ?>>Diesel</option>
                            <option value="Electric" <?php echo e(isset($car->engine_type) && $car->engine_type=='Electric' ? 'Selected' : ''); ?>>Electric</option>
                            <option value="Hybrid" <?php echo e(isset($car->engine_type) && $car->engine_type=='Hybrid' ? 'Selected' : ''); ?>>Hybrid</option>
                          </select>
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Transmission<span class="text-danger">*</span></label>
                          <select class="form-control select2" id="transmission" name="transmission">
                            <option value="" disabled selected>Select</option>
                            <option value="Automatic" <?php echo e(isset($car->transmission) && $car->transmission=='Automatic' ? 'Selected' : ''); ?>>Automatic</option>
                            <option value="Manual" <?php echo e(isset($car->transmission) && $car->transmission=='Manual' ? 'Selected' : ''); ?>>Manual</option>
                          </select>
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Body Type<span class="text-danger">*</span></label>
                          <select class="form-control select2" id="body_type" name="body_type">
                            <option value="" disabled selected>Select</option>
                            <option value="Sedan" <?php echo e(isset($car->body_type) && $car->body_type=='Sedan' ? 'Selected' : ''); ?>>Sedan</option>
                            <option value="SUV" <?php echo e(isset($car->body_type) && $car->body_type=='SUV' ? 'Selected' : ''); ?>>SUV</option>
                            <option value="Hatchback" <?php echo e(isset($car->body_type) && $car->body_type=='Hatchback' ? 'Selected' : ''); ?>>Hatchback</option>
                            <option value="Convertible" <?php echo e(isset($car->body_type) && $car->body_type=='Convertible' ? 'Selected' : ''); ?>>Convertible</option>
                          </select>
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Fuel Type<span class="text-danger">*</span></label>
                          <select class="form-control select2" id="fuel_type" name="fuel_type">
                            <option value="" disabled selected>Select</option>
                            <option value="Petrol" <?php echo e(isset($car->fuel_type) && $car->fuel_type=='Petrol' ? 'Selected' : ''); ?>>Petrol</option>
                            <option value="Diesel" <?php echo e(isset($car->fuel_type) && $car->fuel_type=='Diesel' ? 'Selected' : ''); ?>>Diesel</option>
                            <option value="Electric" <?php echo e(isset($car->fuel_type) && $car->fuel_type=='Electric' ? 'Selected' : ''); ?>>Electric</option>
                          </select>
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Color<span class="text-danger">*</span></label>
                        <input type="text" id="color" name="color" class="form-control" placeholder="Enter Color" value="<?php echo e(isset($car->color) ? $car->color : ''); ?>">
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Mileage (In Kilometers)<span class="text-danger">*</span></label>
                        <input type="number" id="mileage" name="mileage" class="form-control" placeholder="Enter Mileage" value="<?php echo e(isset($car->mileage) ? $car->mileage : ''); ?>">
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Seating Capacity:<span class="text-danger">*</span></label>
                        <input type="number" id="seating_capacity" name="seating_capacity" class="form-control" placeholder="Enter Seating Capacity" value="<?php echo e(isset($car->seating_capacity) ? $car->seating_capacity : ''); ?>">
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Number of Doors:<span class="text-danger">*</span></label>
                        <input type="number" id="no_of_doors" name="no_of_doors" class="form-control" placeholder="Enter Number of Doors" value="<?php echo e(isset($car->no_of_doors) ? $car->no_of_doors : ''); ?>">
                      </div>
                    </div>
                      
                    </div>

                    <h6 class="mb-1 text-uppercase p-1 rounded"><i class="bx bx-user"></i>&nbsp&nbsp&nbsp Rental Information</h6>
                    <div class="row mb-2">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Rental Price per Hour<span class="text-danger">*</span></label>
                        <input type="number" id="rent_price" name="rent_price" class="form-control" placeholder="Enter Rental Price" value="<?php echo e(isset($car->rent_price) ? $car->rent_price : ''); ?>">
                      </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label class="form-control-label">Availability Status<span class="text-danger">*</span></label>
                          <select class="form-control select2" id="availability_status" name="availability_status" >
                            <option value="" disabled selected>Select</option>
                            <option value="Available" <?php echo e(isset($car->availability_status) && $car->availability_status=='Available' ? 'Selected' : ''); ?>>Available</option>
                            <option value="Not Available" <?php echo e(isset($car->availability_status) && $car->availability_status=='Not Available' ? 'Selected' : ''); ?>>Not Available</option>
                          </select>
                      </div>
                    </div>

                   
                    </div>

                    <h6 class="mb-1 text-uppercase p-1 rounded"><i class="bx bx-user"></i>&nbsp&nbsp&nbsp Insurance and Documents:</h6>
                    <div class="row mb-2">
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Insurance Policy Number<span class="text-danger">*</span></label>
                          <input type="text" id="insurance_policy_number" name="insurance_policy_number" class="form-control" placeholder="Enter Insurance Policy Number" value="<?php echo e(isset($car->insurance_policy_number) ? $car->insurance_policy_number : ''); ?>">
                        </div>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Insurance Expiry Date<span class="text-danger">*</span></label>
                          <input type="date" id="insurance_expiry_date" name="insurance_expiry_date" class="form-control" placeholder="Enter Insurance Expiry Date" value="<?php echo e(isset($car->insurance_expiry_date) ? $car->insurance_expiry_date : ''); ?>">
                        </div>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Registration Number<span class="text-danger">*</span></label>
                          <input type="text" id="registration_number" name="registration_number" class="form-control" placeholder="Enter Registration Number" value="<?php echo e(isset($car->registration_number) ? $car->registration_number : ''); ?>">
                        </div>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Registration Expiry Date<span class="text-danger">*</span></label>
                          <input type="date" id="registration_expiry_date" name="registration_expiry_date" class="form-control" placeholder="Enter Registration Expiry Date" value="<?php echo e(isset($car->registration_expiry_date) ? $car->registration_expiry_date : ''); ?>">
                        </div>
                      </div>
                    </div>

                    <h6 class="mb-1 text-uppercase p-1 rounded"><i class="bx bx-user"></i>&nbsp&nbsp&nbsp Additional Features:</h6>
                    <div class="row mb-2">
                      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Air Conditioning<span class="text-danger">*</span></label><br>
                            <input type="radio" id="Yes" name="air_conditioning" value="Yes" <?php echo e(isset($car->air_conditioning) && $car->air_conditioning=='Yes' ? 'checked' : ''); ?>>
                            <label for="Yes">Yes</label><br>
                            <input type="radio" id="No" name="air_conditioning" value="No" <?php echo e(isset($car->air_conditioning) && $car->air_conditioning=='No' ? 'checked' : ''); ?>>
                            <label for="No">No</label><br>
                        </div>
                      </div>
                      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Bluetooth<span class="text-danger">*</span></label><br>
                            <input type="radio" id="Yes" name="bluetooth" value="Yes" <?php echo e(isset($car->bluetooth) && $car->bluetooth=='Yes' ? 'checked' : ''); ?>>
                            <label for="Yes">Yes</label><br>
                            <input type="radio" id="No" name="bluetooth" value="No" <?php echo e(isset($car->bluetooth) && $car->bluetooth=='No' ? 'checked' : ''); ?>>
                            <label for="No">No</label><br>
                        </div>
                      </div>
                      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">USB Port<span class="text-danger">*</span></label><br>
                            <input type="radio" id="Yes" name="usb_port" value="Yes" <?php echo e(isset($car->usb_port) && $car->usb_port=='Yes' ? 'checked' : ''); ?>>
                            <label for="Yes">Yes</label><br>
                            <input type="radio" id="No" name="usb_port" value="No" <?php echo e(isset($car->usb_port) && $car->usb_port=='No' ? 'checked' : ''); ?>>
                            <label for="No">No</label><br>
                        </div>
                      </div>
                      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Heated Seats<span class="text-danger">*</span></label><br>
                            <input type="radio" id="Yes" name="heated_seats" value="Yes" <?php echo e(isset($car->heated_seats) && $car->heated_seats=='Yes' ? 'checked' : ''); ?>>
                            <label for="Yes">Yes</label><br>
                            <input type="radio" id="No" name="heated_seats" value="No" <?php echo e(isset($car->heated_seats) && $car->heated_seats=='No' ? 'checked' : ''); ?>>
                            <label for="No">No</label><br>
                        </div>
                      </div>
                      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Sunroof<span class="text-danger">*</span></label><br>
                            <input type="radio" id="Yes" name="sunroof" value="Yes" <?php echo e(isset($car->sunroof) && $car->sunroof=='Yes' ? 'checked' : ''); ?>>
                            <label for="Yes">Yes</label><br>
                            <input type="radio" id="No" name="sunroof" value="No" <?php echo e(isset($car->sunroof) && $car->sunroof=='No' ? 'checked' : ''); ?>>
                            <label for="No">No</label><br>
                        </div>
                      </div>

                    </div>

                    <h6 class="mb-1 text-uppercase p-1 rounded"><i class="bx bx-user"></i>&nbsp&nbsp&nbsp Images and description:</h6>
                    <div class="row mb-2">
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Main Image<span class="text-danger">*</span></label>
                          <input type="file" id="main_image" name="main_image" class="form-control">
                        </div>
                      </div>

                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Other Images<span class="text-danger">*</span></label>
                          <input type="file" id="images" name="images[]" class="form-control" multiple>
                        </div>
                      </div>
                    
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                          <label class="form-control-label">Description<span class="text-danger">*</span></label>
                          <textarea type="text" id="description" name="description" class="form-control" placeholder="Description of Car" rowspan="5" ><?php echo e(isset($car->description) ? $car->description : ''); ?></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row group">
                    <div class="col-lg-12 mt-1">
                      <div class="form-group">
                        <button type="submit" id="submit-btn" class="btn btn-success submit_car float-right">Save</button>
                      </div>
                    </div>
                  </div>
                  </div>
                  
                </form>
              </div>
            </div>

          </div>
        </div>
      </section>

    </div>
  </div>
</div>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  </body>
  <!-- END: Body-->
<script>

  $(document).ready(function(){

    $(document).on("click", ".submit_car",function(event) {
      event.preventDefault();
      let myForm = document.getElementById('add_car');
      let formData = new FormData(myForm);
      formData.append('_token', '<?php echo e(csrf_token()); ?>');
      $(this).attr('disabled', true);

      $.ajax({
          type: "post",
          data: formData,
          url: "<?php echo e(route('admin.save_car')); ?>",
          cache:false,
          contentType: false,
          processData: false,
          success: function(result) {
            if (result.status == true) {
                Toast.fire({icon: 'success',title: result.message, closeButton: !0, tapToDismiss: !1,progressBar: true, timeOut: 1000});
                window.location.href = "<?php echo e(route('admin.car_list')); ?>";
              }
            else{
                Toast.fire({icon: 'error',title: result.message, closeButton: !0, tapToDismiss: !1,progressBar: true, timeOut: 1000});
                $('.submit_car').prop('disabled', false);
            }
          }
      });
    });

  });
  
</script>
</html><?php /**PATH C:\xampp\htdocs\CarRentalSystem\resources\views/admin/cars/add_car.blade.php ENDPATH**/ ?>