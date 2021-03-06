<div class="modal-header">
  <div class="title badge orange"><i class="material-icons">place
  </i>Add Venue</div>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>

<div class="modal-body">
  <form action="{{ route('camp.createcamp', ['camp' => $camp, 'create' => 'venue']) }}"
    method="post">
      @csrf
      <div class="row">
          <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                  <label class="control-label" for="venue">Venue name</label>
                  <input type="text" class="form-control textOnly" id="venue"
                  name="venue" maxlength="60" required>
              </div>
          </div>
          <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                  <label class="control-label" for="address">Venue address</label>
                  <input type="text" class="form-control" id="address" name="address"
                  maxlength="60" required>
              </div>
          </div>
          <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                  <label class="control-label" for="contact_name">Venue Contact Person Name</label>
                  <input type="text" class="form-control textOnly" id="contact_name"
                  name="contact_name" maxlength="60" required>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                  <label class="control-label" for="contact_mobile">Venue contact mobile</label>
                  <input type="tel" class="form-control numbersOnly" id="contact_mobile" maxlength="10"
                  title="10 characters to be filled" pattern="[1-9]{1}[0-9]{9}" name="contact_mobile" required>
              </div>
          </div>
          <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                  <label class="control-label" for="contact_email">Venue contact email</label>
                  <input type="email" class="form-control" id="contact_email"
                  name="contact_email" maxlength="60" required>
              </div>
          </div>
          <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                  <label class="control-label" for="comment">Comment</label>
                  <input type="text" class="form-control" id="comment"
                  name="comment" maxlength="50" required>
              </div>
          </div>
      </div>
      <button type="submit" class="btn btn-blue float-right mb-3"
      name="button">Submit</button>
</div>
</form>
</div>
