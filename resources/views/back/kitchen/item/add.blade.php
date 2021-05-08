<style>
    .formHolder{
        position:fixed;
        top:0px;
        left:0px;
        right:0px;
        bottom:0px;
        padding:75px 150px;
        background: rgba(0,0,0,0.3);
        z-index: 99;
        overflow-y: scroll;
    }

    #addForm{
        background:white;
        
    }
</style>
<div class="d-none formHolder"  id="addFormHolder">
    <div class="card mb-4 shadow p-3 h-100">

        <form action="" id="addForm" onsubmit="return addItem()">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" class="form-control" min="0" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="list-group-item ">
                        <span class="mt-4 mr-1">Room Service :</span> <!-- .switcher-control -->
                        <label class="switcher-control switcher-control-lg mt-4"><input type="checkbox" name="room" class="switcher-input" checked=""> <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
                    </div>
                </div>
            </div>
           
            <div class="form-group">
                <label for="desc">Description</label>
                <textarea name="desc" id="desc" class="form-control" ></textarea>
            </div>

            
            <div class="form-group">
                <input type="file" class="dropify" name="image" accept="image/*"/> 
            </div>
            <div class=" py-2 form-group">
                <button class="btn btn-primary">Add Category</button>
                <span class="btn btn-danger" onclick="toogleAdd(false)">Cancel</span>
            </div>
        </form>
    </div>
</div>
<script>
    function toogleAdd(state){
        if(!state){
            $('#addFormHolder').addClass("d-none");
        }else{
            $('#addFormHolder').removeClass("d-none");

        }
    }
</script>
