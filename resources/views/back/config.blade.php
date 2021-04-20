<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('front\css\bootstrap.css')}}">

</head>
<body>
    <div class="card mb-4 shadow p-3">
        <form method="post" action="{{route('admin.config.add')}}">
            @csrf

            <div class="row">

                <div class="col-md-2" id="">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" required class="form-control">

                    </div>
                </div>
                <div class="col-md-7">
                    <div class="form-group">
                        <label for="">Value</label>
                        <input type="text" name="value" id="value" required class="form-control">
                    </div>

                </div>
                <div class="col-md-3">
                    <button class="btn btn-success mt-4"> Add Config</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card shadow p-3">
        @foreach ($configs as $config)
          @include('back.config-single',['config'=>$config])
        @endforeach
    </div>
</body>
</html>
