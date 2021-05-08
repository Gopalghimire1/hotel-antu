<div class="d-none formHolder"  id="editFormHolder">
    <div class="card mb-4 shadow p-3 h-100">

        <form action="" id="editForm" onsubmit="return updateItem()">
            @csrf
            <input type="hidden" name="id" id="e_id">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="e_name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="e_price" class="form-control" min="0" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="list-group-item ">
                        <span class="mt-4 mr-1">Room Service :</span> <!-- .switcher-control -->
                        <label class="switcher-control switcher-control-lg mt-4"><input type="checkbox" id="e_room" name="room" class="switcher-input" checked=""> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea name="desc" id="e_desc" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <input type="file" class="editdropify" id="e_image" name="image" accept="image/*"/> 
            </div>
            <div class=" py-2 form-group">
                <button class="btn btn-primary">Update Category</button>
                <span class="btn btn-danger" onclick="toogleEdit(false)">Cancel</span>
            </div>
        </form>
    </div>
</div>
<script>
    function toogleEdit(state){
        if(!state){
            $('#editFormHolder').addClass("d-none");
        }else{
            $('#editFormHolder').removeClass("d-none");

        }
    }

    
</script>