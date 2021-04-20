<div class=" p-2  gallery_item" id="gallery_item_{{$image->id}}">

    <div class="single_image shadow">
        <img src="{{asset($image->image)}}" class="w-100" alt="">
        <p>
            {{$image->caption}}
        </p>
        <button class="del_button"  onclick="del({{$image->id}})">
            X
        </button>
    </div>
</div>
