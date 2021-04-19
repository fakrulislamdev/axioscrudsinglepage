
 <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Nation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <form action="" id="addNationForm">
                        <div class="form-group">
                            <label for="">Nation Name : </label>
                            <input type="text" class="form-control" placeholder="Enter Nation Name" id="name">
                            <span id="nameError" class="text-danger"></span>
                        </div>
                         <div class="form-group">
                            <button class="btn btn-block btn-success" id="addButton">Add New Nation</button>
                        </div>
            </form>
      </div>
    </div>
  </div>
</div>


 <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="updateNationForm">
                        <div class="form-group">
                            <label for="">Nation Name : </label>
                            <input type="text" class="form-control" placeholder="Enter Nation Name" id="e_name">
                            <input type="hidden" id="e_id">
                            <span id="nameError" class="text-danger"></span>
                        </div>
                         <div class="form-group">
                            <button class="btn btn-block btn-success" id="addButton">Update Nation</button>
                        </div>
                    </form>
      </div>
    </div>
  </div>
</div>