<div step="3" class="step section shadow">
    <div class="section_title">
        3. Personal Information
    </div>
    <div class="section_content">
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <div class="d-flex">
                        <div>
                            <select name="" id="" style="width:75px" class="form-control">
                                @foreach ($codes    as $code)
                                    <option value="+{{$code['dial_code']}}">{{$code['dial_code']}} {{$code['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone no">
                    </div>
                </div> 
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email Address">
                </div> 
            </div>
        </div>
        <div class="d-flex justify-content-between"> 
            <span class="btn btn-secondary btn-lg" onclick="stepBack()">
                Back
            </span>
            <span class="btn btn-primary btn-lg" >
                Book
            </span>
        </div>
    </div>
</div>