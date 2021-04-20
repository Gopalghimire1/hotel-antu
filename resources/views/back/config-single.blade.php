<form method="POST" action="{{route('admin.config.update')}}">
    @csrf
   

    <div class="row">
        <input type="hidden" name="id" value="{{$config->id}}">
        <div class="col-md-2" id="">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" required class="form-control" value="{{$config->name}}">

            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group">
                <label for="">Value</label>
                <input type="text" name="value" id="value" required class="form-control" value="{{$config->value}}">
            </div>

        </div>
        <div class="col-md-3">
            <button class="btn btn-success mt-4"> Update Config</button>
            <a class="btn btn-danger mt-4" href="{{route('admin.config.del',['id'=>$config->id])}}"> Del</a>
        </div>
    </div>
</form>
