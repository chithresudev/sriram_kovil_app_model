<div class="modal-header">
  <div class="title badge orange"><i class="material-icons">place
  </i>Doctor : {{ ucfirst($doctor->name) }}</div>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>

<div class="modal-body">
    <form action="{{ route('camp.doctorupdate', ['doctor' => $doctor]) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="name">Doctor name</label>
                    <input type="text"   value="{{ $doctor->name }}" class="form-control textOnly" id="name" name="name" maxlength="60" required>
                </div>
            </div>

            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="specialist">Doctor specialisation</label>
                    <input type="text" class="form-control textOnly" id="specialist" name="specialist" maxlength="60" value="{{ $doctor->specialist }}" required>
                </div>
            </div>

            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="phone">Doctor Phone</label>
                    <input type="tel" value="{{ $doctor->phone }}" class="form-control numbersOnly" id="phone" maxlength="10" name="phone" pattern="[1-9]{1}[0-9]{9}" required>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="date_from">Doctor available From</label>
                    <input type="date" value="{{ $doctor->date_from }}" class="form-control" id="date_from" name="date_from" required>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
              <div class="form-group">
                  <label class="control-label" for="date_to">Doctor available To</label>
                  <input type="date" value="{{ $doctor->date_to }}" class="form-control" id="date_to" name="date_to" required>
              </div>
            </div>
        </div>
        <button type="submit" class="btn btn-blue float-right mb-3" name="button">update</button>
</div>
</form>
