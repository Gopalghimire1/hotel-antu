
@extends('back.layouts.app')
@section('title')
    Manage Category - {{$cat->name}}
@endSection
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" />
@endsection
@section('content')

<main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">
          <!-- .page -->
          <div class="page">
            <!-- .page-inner -->
            <div class="page-inner">
                <div class="card card-fluid" style="margin-top:1rem;">
                        <!-- .card-header -->
                        <div class="card-header">
                            <div class="d-md-flex align-items-md-start">
                                <h3 class="page-title mr-sm-auto">
                                     <a href="{{route('admin.kitchen.category.index')}}">
                                    Menu Categories
                                    </a> / 
                                    {{$cat->name}} /
                                    Menu Items 
                                </h3><!-- .btn-toolbar -->
                                <div class="dt-buttons btn-group">
                                    <button class="btn btn-primary" onclick="toogleAdd(true)">Add Item</button>
                                </div><!-- /.btn-toolbar -->
                            </div>
                           
                        </div>
                        <div class="card-body">
                            <div id="admin_gallery">

                                @include('back.kitchen.item.add')
                                @include('back.kitchen.item.edit')
                                <div class="  ">
                                    
                                    <div class="row" id="categoryHolder">
                                       
                                            @foreach ($items  as $item)
                                              @include('back.kitchen.item.single',['item'=>$item])
                                            @endforeach
                                       
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                </div>
            </div>
          </div>
        </div>
</main>

@endsection
@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous"></script>
<script>
    $('.dropify').dropify({
    messages: {
        'default': 'Drag and drop a Image here or click',
        'replace': 'Drag and drop or click to replace',
        'remove':  'Remove',
        'error':   'Ooops, something wrong happended.'
    }
});

    addLock=false;
    function addItem(){

        if(!addLock){
            addLock=true;
            var fd=new FormData(document.getElementById('addForm'));
            fd.append('menu_category_id',"{{$cat->id}}")
            axios.post('{{route("admin.kitchen.item.add")}}',fd, {
                headers: {
                'Content-Type': 'multipart/form-data'
                }
            })
            .then((response)=>{
                addLock=false;
                toogleAdd(false);
                $('#categoryHolder').prepend(response.data);
                document.getElementById('addForm').reset();
                $('.dropify-clear').click();

            })
            .catch((err)=>{
                addLock=false;

            });
        }
        return false;
    }
    function updateItem(){

        if(!addLock){
            addLock=true;
            var fd=new FormData(document.getElementById('editForm'));
            axios.post('{{route("admin.kitchen.item.update")}}',fd, {
                headers: {
                'Content-Type': 'multipart/form-data'
                }
            })
            .then((response)=>{
                id=$('#e_id').val();
                console.log(id);
                $('#cat_'+id).replaceWith(response.data);
                addLock=false;
                toogleEdit(false);
                document.getElementById('editForm').reset();
                $('.dropify-clear').click();

            })
            .catch((err)=>{
                addLock=false;

            });
        }
        return false;
    }

    function delItem(id){
        axios.post('{{route("admin.kitchen.item.del")}}',{"id":id})
            .then((response)=>{
                $('#cat_'+id).remove();
            });
    }

    var editImage;
    function  SetEditData(data) {
        console.log(data);
        $('#e_id').val(data.id);
        $('#e_desc').val(data.desc);
        $('#e_price').val(data.price);
        document.getElementById('e_room').checked=data.room==1;
        $('#e_name').val(data.name);
        if(editImage!=undefined){
            editImage.destroy();
            editImage.settings.defaultFile = data.image;
            editImage.init();
        }else{
                editImage=$('.editdropify').dropify({
                    defaultFile: data.image 
                }).data('dropify');

        }
    }
</script>
@endsection














