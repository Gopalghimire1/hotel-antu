<div id="roominfo">
    <input type="hidden" name="id" id="room_id" value="{{$room->id}}">
    <input type="hidden" name="id" id="room_price" value="{{$room->base_price}}">
    <div class="roomimage">
        <img src="{{ asset($room->image)}}" alt="" class="w-100">
    </div>
    <div class="name">
        {{$room->title}}
    </div>
    <div class="price">
        Rs. {{$room->base_price}} / Night
    </div>

</div>
