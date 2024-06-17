<?php
$auth = auth()->user()->role;
$auth_path = auth()->user()->role == 'Admin' ? '/admin' : '' ;
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Settings - Admin</title>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<style>
  #SettingTable_length, #SettingTable_filter{
    display: none !important;
  }
</style>
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <section class="users-list-wrapper">
           <div class="row mt-2">    
            <div class="col-md-12 col-sm-12 dashboard-referral-impression">
                  <div class="card">
                    <div class="card-body py-1">
                      <div class="row">
                        <div class="col-12">
                          <div class="table-responsive">
                            <table id="SettingTable" class="table " style="width: 100%;">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Data</th>
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

</div></div>
</div>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('modal.updateSetting', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
$(document).ready( function () {

    var SettingTable = $('#SettingTable');
    SettingTable.DataTable(); //uncomment below code & remove this line.

    // SettingTable.DataTable({
    //     responsive: true,
    //     serverSide: true,
    //     processing: true,
    //     ordering: false,
    //     ajax: "<?php echo e(url('admin/settings/data')); ?>",
    //     "aoColumns": [
    //         {
    //             mData: 'key'
    //         },
    //         {
    //             mData: 'value'
    //         },
    //     ],
    //     "columnDefs": [{
    //         targets: -1,
    //         className: 'text-right'
    //     }],
    // });

}); //Final Close Tag
</script>
</body>
</html><?php /**PATH C:\xampp\htdocs\CarRentalSystem\resources\views/admin/settings.blade.php ENDPATH**/ ?>