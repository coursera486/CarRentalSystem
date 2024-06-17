<div class="modal fade text-left" id="update_setting" tabindex="-1" role="dialog"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-top modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Update Setting</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="bx bx-x"></i>
        </button>
      </div>
      <div class="modal-body">
        <form class="form form-vertical" id="update_setting_data" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="setting_id" id="setting_id">
          <div class="form-body">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="update_setting_key">Key</label>
                  <div class="position-relative has-icon-left">
                    <input type="text" id="update_setting_key" class="form-control" name="key" placeholder="Enter Key" readonly>
                    <div class="form-control-position">
                      <i class='bx bxs-rename'></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="update_setting_value">Value</label>
                  <div class="position-relative has-icon-left">
                    <input type="text" id="update_setting_value" class="form-control" name="value" placeholder="Enter value">
                    <div class="form-control-position">
                      <i class='bx bxs-rename'></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Close</span>
        </button>
        <button type="button" class="btn btn-primary ml-1 update-setting-btn">
          <i class="bx bx-check d-block d-sm-none"></i>
         Update
        </button>
      </div>
    </div>
  </div>
</div>
<script>

$(document).on('click', '.setting-edit-btn', function() {

    var data = $(this).attr('data-value').split('|');
    $('#setting_id').val(data[0]);
    $('#update_setting_key').val(data[1]);
    $('#update_setting_value').val(data[2]);
    $('#update_setting').modal('toggle');
});
$(document).on('click', '.update-setting-btn', function() {

    //get and set the from data.
    var myform = document.getElementById("update_setting_data");
    var formData = new FormData(myform);
    formData.append('_token', '{{ csrf_token() }}');

    $(this).html('Updating...').attr('disabled', true);
    $.ajax({
        type: "post",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
         url: "{{url('admin/settings/update')}}",
        success: function(result) {
            $('.update-setting-btn').html('Update').attr('disabled', false);
            if (result.success == false) {
                Toast.fire({
                  icon: 'error',
                  title: result.message
                })
            }else{
                Toast.fire({
                  icon: 'success',
                  title: result.message
                })
                $('#update_setting').modal('toggle');
                $('#SettingTable').DataTable().ajax.reload();
            }
        }
    });
});
</script>