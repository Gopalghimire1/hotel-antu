<div class="col-md-4 pt-3" id="cat_{{$item->id}}">
    <div class="shadow h-100">

        <div class="d-flex">
            <div style="flex:2">
                <img src="/{{$item->image}}" alt="" class="w-100"> 
            </div>
            <div style="flex:5;padding:5px;">
                <div>
                    <h6>{{$item->name}} </h6>
                    <hr class="my-1">
                    <div class="p-2">
                        {{$item->desc}}
                    </div>
                    <div class="pb-2">
                        Rs. {{$item->price}} <br> Room Service - {{$item->room==1?"Avialable":"Unavailable"}}
                    </div>
                    
                </div>
            </div>
        </div>
        <hr class="my-1">
                    <div class="p-2 text-center">
                        <button class="btn btn-link"
                        data-id="{{$item->id}}" 
                        data-name="{{$item->name}}" 
                        data-desc="{{$item->desc}}" 
                        data-room="{{$item->room}}" 
                        data-price="{{$item->price}}" 
                        data-image="{{asset($item->image)}}" 
                         onclick="toogleEdit(true);SetEditData(this.dataset);">Edit</button> | 
                        <button class="btn btn-link" onclick="delItem({{$item->id}})">Delete</button>
                    </div>
    </div>
</div>