<section id = "course_form" class="container mt-5">
      <div class="row">
        <div class="col-4">
        
          <div style="padding-left:20px">
            <div class="form" id="myForm">
              <form class="form-container" id="courseform">
                <input type="hidden" id="cid" value="cid">
                <div class="row">
                  <label for="course"><b>Couse Name</b></label>
                  <input type="text" id="course" placeholder="Enter course" name="course" value="" >
                  <span id="crerr"></span>
                </div>
                <button type="button" id="update" class="btn btn-info"  placeholder="update" value="update">Update</button>
                         
                <button type="button" id="add" class="btn btn-primary" placeholder="ADD" name="add" value="add">Add</button>
               
                <button type="button" class="btn btn-primary" id="closeForm">Close</button>
              </form>
            </div>
          </div>
        </div>
      </div>
</section>