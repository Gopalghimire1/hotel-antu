@extends('back.layouts.app')
@section('title','Room Type')
@section('content')

<main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <div >
                    @include('back.layouts.message')
                    @if ($errors->any())
                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error has been occurred !</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                <div class="card card-fluid" style="margin-top:1rem;">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto">List Of Room Types</h3><!-- .btn-toolbar -->
                                <div class="dt-buttons">
                                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#imageUpload">Image Upload</a>
                                    <a href="{{ route('roomType.create') }}" class="btn btn-primary">Create New Type</a>
                                </div><!-- /.btn-toolbar -->
                            </div>
                        </div><!-- /.card-header -->
                        <!-- .card-body -->
                        <div class="card-body">
                           <table class="table table-bordered">
                               <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Short Code</th>
                                    <th>Price</th>
                                    <th>Total Room</th>
                                    <th>Status</th>
                                    <th>Action</th>
                               </tr>

                              @foreach ($roomTypes as $item => $room)
                                 <tr>
                                  <td> {{ $item+1 }} </td>
                                  <td> {{ $room->title }} </td>
                                  <td> {{ $room->short_code }} </td>
                                  <td> Rs. {{ $room->base_price }} </td>
                                  <td> {{$room->room->count()}} </td>
                                  <td><span class="badge {{$room->status?'badge-success':'badge-danger'}}">{{$room->status?'Active':'Inactive'}}</span></td>
                                  <td>
                                      <a class="badge badge-primary" href=" {{ route('roomType.edit',$room->id) }} ">Edit</a>
                                      <a class="badge badge-warning" href="{{ route('roomType.show',$room->id) }}">View</a>
                                  </td>
                                 </tr>
                              @endforeach
                           </table>


                        </div><!-- /.card-body -->
                    </div>
            </div>
          </div>
        </div>
</main>


    <!-- Modal -->
      <div class="modal fade" id="imageUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Image Upload</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('roomType.image') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-gorup">
                      <label for="room type"> Select Roomtype <span style="color:red;">*</span></label>
                   <select name="room_type" class="form-control">
                       <option value="">---- Select ----</option>
                       @foreach ($roomTypes as $room)
                         <option value="{{ $room->id }}">{{ $room->title }}</option>
                       @endforeach
                   </select>
                  </div>
                  <br>
                  <div class="form-group">
                      <label for="image">Image <span style="color:red;">*</span></label>
                      <input type="file" class="form-control" name="image" placeholder="Image">
                  </div>
                  <div class="col-md-6">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Featured Image :</span> <!-- .switcher-control -->
                            <label class="switcher-control switcher-control-lg"><input type="checkbox" name="featured" class="switcher-input" > <span class="switcher-indicator"></span> <span class="switcher-label-on">ON</span> <span class="switcher-label-off">OFF</span></label> <!-- /.switcher-control -->
                        </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-block">Save Item</button>
                </div>
            </form>
          </div>
        </div>
      </div>

@endsection
