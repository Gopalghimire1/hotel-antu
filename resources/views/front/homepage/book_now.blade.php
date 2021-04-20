<div id="book_now">
    <form action="">

        <div class="row m-0">
            <div class="col-lg-3 p-0">
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" id="start_date" onchange="checkDate()" >
                </div>
            </div>
            <div class="col-lg-3 p-0">
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" name="end_date" id="end_date" onchange="checkDate()">
                </div>
            </div>
            <div class="col-lg-3 p-0 d-flex">
                <div class="w-50">
                    <div class="form-group">
                        <label for="adults">Adults</label>
                        <input type="number" min="1" value="1" name="adults" id="adults" >
                    </div>
                </div>
                <div class="w-50">
                    <div class="form-group">
                        <label for="childrens">Childrens</label>
                        <input type="number" min="0" value="0" name="childrens" id="childrens"  >
                    </div>
                </div>
            </div>
            <div class="col-lg-3 p-0 d-flex align-items-end">
                <button class="check">check <span >Availability</span></button>
            </div>
        </div>
    </form>
</div>