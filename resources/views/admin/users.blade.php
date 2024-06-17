<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Users - Admin</title>
@include('layouts.header')
<style>
.level-select {
  appearance: none;
  background-color: transparent;
  border: none;
  padding: 0 1em 0 0;
  margin: 0;
  width: fit-content;
  max-width: 30ch;
  border: 1px solid grey;
  border-radius: 0.25em;
  padding: 0.25em 0.5em;
  font-size: 1.15rem;
  cursor: pointer;
  line-height: 1.1;
  outline: none;

}

.status-btn-primary{
    border-color: #2C6DE9!important;
    background-color: #5A8DEE!important;
    color: #FFF;
    padding: .467rem 1.2rem;
    font-size: .8rem;
    line-height: 1.4;
    border-radius: .267rem;
    cursor: pointer;
    display: inline-block;
    text-align: center;
    vertical-align: middle;
}
.status-btn-primary a:hover, .status-btn-primary:hover, .status-btn-primary:hover a, 
.status-btn-danger a:hover, .status-btn-danger:hover, .status-btn-danger:hover a{
  color: #FFF;
}

.status-btn-danger{
    border-color: #FF2829!important;
    background-color: #FF5B5C!important;
    color: #FFF;
    padding: .467rem 1.2rem;
    font-size: .8rem;
    line-height: 1.4;
    border-radius: .267rem;
    cursor: pointer;
    display: inline-block;
    text-align: center;
    vertical-align: middle;
}


</style>
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Ecommerce Starts -->


            <section class="users-list-wrapper">
    <div class="users-list-filter px-1">
        <form>
            <div class="row border rounded py-2 mb-2">
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="student-level">Level</label>
                    <fieldset class="form-group">
                        <select class="form-control select2" id="student-level" disabled>
                            <option value="" selected>Any</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="users-list-role">Role</label>
                    <fieldset class="form-group">
                        <select class="form-control select2" id="users-list-role" disabled>
                            <option value="">Any</option>
                            <option value="User" selected>User</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="student-status">Status</label>
                    <fieldset class="form-group">
                        <select class="form-control select2" id="student-status">
                            <option value="">Any</option>
                            <option value="Active">Active</option>
                            <option value="In-active">In-active</option>
                            <!-- <option value="Banned">Banned</option> -->
                        </select>
                    </fieldset>
                </div>
                <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                    <button type="reset" class="btn btn-primary btn-block glow clear-filter mb-0">Clear</button>
                </div>
            </div>
        </form>
    </div>
    <div class="users-list-table" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <!-- datatable start -->
                <div class="table-responsive">
                    <table id="UserTable" class="table " style="width: 100%;">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                      
                        </tbody>
                    </table>
                <!-- datatable ends -->
            </div>
                <!-- datatable ends -->
            </div>
        </div>
    </div>
</section>
<!-- users list ends -->

    </div></div></div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
     <!-- Earning Swiper Starts -->

@include('layouts.footer')
<script>
$(document).ready( function () {

    var UserTable = $('#UserTable');
    UserTable.DataTable();  //uncomment below code & remove this line.

    // UserTable.DataTable({
    //     responsive: true,
    //     serverSide: true,
    //     processing: true,
    //     ordering: false,
    //     ajax: "{{url('admin/users/data')}}",
    //     "aoColumns": [
    //         {
    //             mData: 'name'
    //         },
    //         {
    //             mData: 'phone'
    //         },
    //         {
    //             mData: 'email'
    //         },
    //         {
    //             mData: 'status'
    //         },
    //         {
    //             mData: 'action'
    //         },
    //     ],
    //     "columnDefs": [{
    //         targets: -1,
    //         className: 'text-right'
    //     }],
    // });

    $(document).on('click', '.status-btn', function(e) {
        e.stopPropagation();
        alert('You have to remove this alert & uncomment to use this function');
        // var id = $(this).attr('data-value');
        // var action = $(this).attr('name');

        // if (action == 'delete') {

        //   Swal.fire({
        //     title: 'You wont be able to retrive this!',
        //     showDenyButton: true,
        //     confirmButtonText: `Ok, Delete it.`,
        //     denyButtonText: `No, Cancel it.`,
        //   }).then((result) => {
        //     if (result.isConfirmed) {
        //       status_change(id, action);
        //     } 
        //   })
        // }else{
        //   status_change(id, action);
        // }
    });

    // const status_change = (id = 0, action = 'enable') => {
    //   $.ajax({
    //           type: "post",
    //           url: "{{url('admin/users/status')}}",
    //           data: { 'id' :id , 'status': action, '_token' : '{{ csrf_token() }}' },
    //           success: function(result) {
    //               if (result.error == true) {
    //                   Toast.fire({
    //                     icon: 'error',
    //                     title: result.message
    //                   })
    //               }else{
    //                   Toast.fire({
    //                     icon: 'success',
    //                     title: result.message
    //                   })
    //               }
    //               UserTable.DataTable().ajax.reload();
    //           }
    //       });
    // }

});
</script>
</body>
<!-- END: Body-->

</html>