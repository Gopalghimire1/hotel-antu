@extends('front.layout.layout')
@section('title', 'Book ')
@section('style')
<link rel="stylesheet" href="{{asset('front/css/book.css')}}">
@endsection
@section('content')

    <div id="book">
        <div class="row">
            <div class="col-md-8">

                <div step="1" class="step section shadow">
                    <div class="section_title">
                        1. Choose Room
                    </div>
                    <div class="section_content">
                        <div class="room_list">
                            @foreach ($room_types as $room_type)
                            <div class="roomtype_container">
                                <div class="roomtype">
                                    <img src="{{ $room_type->featuredImage()->image }}" alt="" class="w-100">
                                    <div class="detail">
                                        {{$room_type['title']}}
                                        <div class="pt-2">

                                            <button class=" w-100 btn btn-sm btn-success" onclick="selectRoom({{$room_type['id']}})">
                                                Select
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div step="2" class="step section shadow">
                    <div class="section_title">
                        2. Booking Info
                    </div>
                    <div class="section_content">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" name="start_date" onchange="checkDate()"   id="start_date" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" name="end_date" onchange="checkDate()"  id="end_date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="no_of_rooms">No Of Rooms</label>
                                    <select name="no_of_rooms" id="no_of_rooms" class="form-control" onchange="refresh()">
                                        @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="adults">Adults</label>
                                    <input type="number" name="adults" id="adults" min="1" required value="1" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="childs">Childs</label>
                                    <input type="number" name="childs" id="childs" min="0" required value="0" class="form-control">
                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="btn btn-secondary btn-lg" onclick="stepBack()">
                                Back
                            </span>
                            <span class="btn btn-primary btn-lg" onclick="step+=1;showStep();">
                                Next
                            </span>
                        </div>
                    </div>
                </div>
               @include('front.booking.step3')
            </div>
            <div class="col-md-4">
                <div class="section shadow">
                    <div class="section_title">
                        Booking Summary
                    </div>
                    <div class="section_content">
                        <div id="room_info_container">

                        </div>
                        <div class="d-none" id="room_info_days" >

                            <div class="d-flex justify-content-between ">
                                <span>
                                    Stay Duration
                                </span>
                                <span>
                                    <span id="stay_duration">

                                    </span> Nights
                                </span>
                            </div>

                            <div class="d-flex justify-content-between ">
                                <span>
                                    No of Rooms
                                </span>
                                <span>X
                                    <span id="no_of_rooms_view">
                                        1
                                    </span>
                                </span>
                            </div>
                            <div class="d-flex justify-content-between ">
                                <span>
                                    Room Price
                                </span>
                                <span>X
                                    <span id="room_price_view">

                                    </span>
                                </span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between ">
                                <span>
                                   Total Amount
                                </span>
                                <span>
                                    <span id="total_amount">

                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        step=1;
        var room_id,room;
        function showStep(){
            $('.step').addClass("d-none");
            $('.step[step="'+step+'"]').removeClass("d-none");
        }

        function stepBack(){
            if(step!=1){
                step-=1;
                showStep();
            }
        }
        function selectRoom(id){
            axios.post('{{route('front.getroom')}}',{
                "id":id
            })
            .then((res)=>{
                $('#room_info_container').html(res.data);
                step+=1;
                showStep();
                refresh();
            });
        }
        showStep();

    </script>

     <script>
        var start_date=new Date();
        var end_date=new Date();
        var today=new Date();
        var stay_days=1;
        total_amount=0;
        end_date.setDate(start_date.getDate()+1);
        console.log(start_date.getDate());
        function checkDate(){
            start_date=document.getElementById('start_date').valueAsDate ;
            end_date=document.getElementById('end_date').valueAsDate ;

            if(today>start_date){
                // alert('Please Select Appropraite date');
                start_date=today;
                document.getElementById('start_date').valueAsDate = start_date;

            }
            if(start_date>=end_date){
                end_date.setDate(start_date.getDate()+1);
                document.getElementById('end_date').valueAsDate = end_date;
            }
            refresh();
        }

        function refreshDate(){
            document.getElementById('start_date').valueAsDate = start_date;
            document.getElementById('end_date').valueAsDate = end_date;
        }

        function refresh(){
            dateDiff();
            $('#stay_duration').html(stay_days)
            if($('#room_price').length>0){
                $('#room_info_days').removeClass('d-none');
                total_amount=$('#room_price').val()*$('#no_of_rooms').val()*stay_days;
                $('#no_of_rooms_view').html($('#no_of_rooms').val());
                $('#room_price_view').html($('#room_price').val());
                $('#total_amount').html(total_amount);
            }else{
                $('#room_info_days').addClass('d-none');

            }
        }
        function dateDiff(){
            difference= document.getElementById('end_date').valueAsDate-document.getElementById('start_date').valueAsDate;
            stay_days = Math.ceil(difference / (1000 * 3600 * 24));
        }
        $(function() {
            refreshDate();
            refresh();
            @if(isset($id))
                selectRoom({{$id}});
            @endif
        });

    </script>


@endsection
