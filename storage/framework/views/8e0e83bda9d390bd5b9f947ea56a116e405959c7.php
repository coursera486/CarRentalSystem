<?php
$auth = auth()->user()->role;
$auth_path = auth()->user()->role == 'Admin' ? 'admin' : '' ;
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="author" content="PIXINVENT">
    <title>Notifications - Admin</title>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Analytics Start -->
<section id="dashboard-analytics">
  <div class="row mt-2">    
    <div class="col-md-12 col-sm-12 dashboard-referral-impression">
          <div class="card">
            <div class="card-body py-1">
              <h3 class="mb-2 mt-1">Send Notification</h3>

              <form method="POST" id="send_notification_form">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <input type="text"  class="form-control" name="title" placeholder="Notification Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Type Your Message Here..." name="message"></textarea>
                </div>

                <h4>Notification For</h4>
                <ul class="list-unstyled mb-0" id="notification-for">
                  <li class="d-inline-block mr-2 mb-1">
                    <fieldset>
                      <div class="checkbox">
                        <input type="checkbox" class="checkbox-input" id="all" name="notify_to[]" value="all" checked>
                        <label for="all">All</label>
                      </div>
                    </fieldset>
                  </li>
                  <li class="d-inline-block mr-2 mb-1">
                    <fieldset>
                      <div class="checkbox">
                        <input type="checkbox" class="checkbox-input" id="user" name="notify_to[]" value="user" checked>
                        <label for="user">User</label>
                      </div>
                    </fieldset>
                  </li>
                  <li class="d-inline-block mr-2 mb-1">
                    <fieldset>
                      <div class="checkbox">
                          <input type="checkbox" class="checkbox-input" id="sub_admin" name="notify_to[]" value="sub_admin" disabled>
                          <label for="sub_admin">Sub Admin</label>
                      </div>
                    </fieldset>
                  </li>
                </ul>
                <div class="mb-1 mt-0" style="float: right;">
                  <button type="reset" class="btn btn-outline-danger mr-1">Cancel</button>
                  <button type="button" class="btn btn-secondary send-btn">Send</button>
                </div>
              </form>
        </div>
      </div>
    </div>

  </div>
  <div class="row">
    <!-- Task Card Starts -->
    <div class="col-lg-12">
      <div class="row">
        <div class="col-12">
          <div class="card widget-todo">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center flex-wrap">
              <h4 class="card-title d-flex mb-25 mb-sm-0">
                <i class='ficon bx bx-chart font-medium-5 pl-25 pr-75'></i><a href="<?php echo e(url('transactions')); ?>" style="color: #475f7b;">Previous Notifications</a>
              </h4>
              <ul class="list-inline d-flex mb-25 mb-sm-0">
                <li class="d-flex align-items-center">
                  <i class='bx bx-filter font-medium-3 mr-50'></i>
                  <div class="dropdown">
                    <div class="dropdown-toggle mr-1 cursor-pointer" role="button" id="dropdownMenuButton"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</div>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="javascript:void(0);">All</a>
                      <a class="dropdown-item" href="javascript:void(0);">User</a>
                      <a class="dropdown-item" href="javascript:void(0);">Sub Admin</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="card-body px-1 py-1">
              <div class="table-responsive">
                <table id="NotificationTable" class="table " style="width: 100%;">
                    <thead>
                      <tr>
                          <th>Notification For</th>
                          <th>Title</th>
                          <th>Message</th>
                          <th>Send At</th>
                      </tr>
                    </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Dashboard Analytics end -->

    </div>
  </div>
</div>
<!-- END: Content-->
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
<script>
$(function(){

  var NotificationTable = $('#NotificationTable');
  // load_data();
  NotificationTable.DataTable(); //remove this line when using the real database
  function load_data(notify_to = 'all')
  { 
      NotificationTable.DataTable({

          responsive: true,
          serverSide: true,
          processing: true,
          ordering: false,
          searching: false,
          paging: false, info: false,
          ajax:{
                url:"<?php echo e(url('admin/notifications/data')); ?>",
                data:{'notify_to': notify_to}, 
              },
          "aoColumns": [
              {
                  mData: 'notify_to'
              },
              {
                  mData: 'title'
              },
              {
                  mData: 'message'
              },
              {
                  mData: 'created_at'
              },
          ],
          "columnDefs": [{
              targets: -1,
              className: 'text-right'
          }],
      });
  }

  //This function is send the data.
  $(document).on('click', '.send-btn', function() {

      alert('You have to remove this alert & uncomment to use this function');
      // var path = $(this).val();
      // $(this).html('Sending...').attr('disabled', true);
      // $.ajax({
      //     type: "post",
      //     data: $("#send_notification_form").serialize(),
      //     url: "<?php echo e(url('admin/notifications')); ?>",
      //     success: function(result) {
      //         $('.send-btn').html('Send').attr('disabled', false);
      //         if (result.success == false) {
      //             Toast.fire({
      //                     icon: 'error',
      //                     title: result.message
      //                   })
      //         }else{
      //             Toast.fire({
      //                     icon: 'success',
      //                     title: result.message
      //                   })
      //             document.getElementById('send_notification_form').reset();
      //         }
      //         NotificationTable.DataTable().ajax.reload();
      //     }
      // });
  });


  //Check Box Functions.
  $(document).on('change', '#notification-for #all, #user, #sub_admin', function() {

    //all the checkbox.
    var item = ['user'];
    var check = ($(this).is(":checked")) ? true : false ;

    if ($(this).val() == 'all') {

      item.map(function(key, index) {
        $(":checkbox[value="+key+"]").prop("checked", check);
      });

    }else{
      
      if (check === false) {
        //if any option uncheck then uncheck the "all" option.  
        $(":checkbox[value='all']").prop("checked", check);

      }else{

        //This check all have checked or not.
        check = [];
        item.map(function(key, index) {
          var is_check = ($(":checkbox[value="+key+"]").is(":checked")) ? true : false ;
          if (is_check === true) { check.push(true); }else{ check.push(false); }
        });
        if (!check.includes(false)) { $(":checkbox[value='all']").prop("checked", check); }
      }

    }
  });

}); // End Tag.
</script>
</html><?php /**PATH C:\xampp\htdocs\cars\CarRental\CarRentalSystem\resources\views/admin/notifications.blade.php ENDPATH**/ ?>