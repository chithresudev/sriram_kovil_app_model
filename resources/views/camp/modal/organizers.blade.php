<div class="modal-header">
    <div class="title badge orange"><i class="material-icons">place
    </i>Add {{ ucfirst($page) }} Organizer</div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('camp.createcamp', ['camp' => $camp , 'create' => $page]) }}" method="post">
        @csrf
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="name">{{ ucfirst($page) }}  name</label>
                    <input type="text" class="form-control textOnly" id="name" name="name" maxlength="60" required>
                </div>
            </div>

            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="mobile">{{ ucfirst($page) }}  Phone</label>
                    <input type="tel" class="form-control numbersOnly" id="mobile" maxlength="10" name="mobile" pattern="[1-9]{1}[0-9]{9}" required>
                </div>
            </div>

            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="mobile">{{ ucfirst($page) }}  Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="control-label" for="comment">{{ ucfirst($page) }} Comment</label>
                    <input type="text" class="form-control" id="comment" name="comment" required>
                </div>
            </div>
        </div>
        <input type="hidden" name="type" value="{{ $page }}">
        <button type="submit" class="btn btn-blue float-right mb-3">Submit</button>
</div>
</form>
</div>
