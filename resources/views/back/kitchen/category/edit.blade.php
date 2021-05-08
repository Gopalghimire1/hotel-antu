<div class="d-none formHolder"  id="editFormHolder">
    <div class="card mb-4 shadow p-3 h-100">

        <form action="" id="editForm" onsubmit="return updateCategory()">
            @csrf
            <input type="hidden" name="id" id="e_id">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="e_name" class="form-control" required>
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