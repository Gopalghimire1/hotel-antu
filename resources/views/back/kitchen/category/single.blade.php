<div class="col-md-4 pt-3" id="cat_{{$cat->id}}">
    <div class="shadow h-100">

        <div class="d-flex">
            <div style="flex:2">
                <img src="/{{$cat->image}}" alt="" class="w-100"> 
            </div>
            <div style="flex:5;padding:5px;">
                <div>
                    <h6>{{$cat->name}} </h6>
                    <hr class="my-1">
                    <div class="p-2">
                        {{$cat->desc}}
                    </div>
                    
                </div>
            </div>
        </div>
        <hr class="my-1">
                    <div class="p-2 text-center">
                        <button class="btn btn-link"
                        data-id="{{$cat->id}}" 
                        data-name="{{$cat->name}}" 
                        data-desc="{{$cat->desc}}" 
                        data-image="{{asset($cat->image)}}" 
                         onclick="toogleEdit(true);SetEditData(this.dataset);">Edit</button> | 
                        <a href="{{route('admin.kitchen.category.manage',['cat'=>$cat->id])}}" class="btn btn-link">Manage</a> | 
                        <button class="btn btn-link" onclick="delCategory({{$cat->id}})">Delete</button>
                    </div>
    </div>
</div>