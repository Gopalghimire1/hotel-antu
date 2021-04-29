<div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
       
          <input type="password" id="password" class="form-control" placeholder="Enter New Password">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="savePassword()">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<script>
    lock=false;
    changePassword_id=0;
    function  initPasswordChange(id) {
        changePassword_id=id;
        $("#changePassword").modal("show");
    }

    function savePassword() {
        var data={
            "_token": "{{ csrf_token() }}",
            "id":changePassword_id,
            "password": $("#password").val()
        }
        if(data.password.length<5){
            alert("Password character should have atleast 5 characters");
            return;
        }
        $.ajax({
            type: "POST",
            url: "{{route('user.change-pass')}}",
            data: data,
            success: function (response) {
                changePassword_id=0;
                $("#password").val("");
                $("#changePassword").modal("hide");
            }
        });
    }
</script>