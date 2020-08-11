<div class="modal fade" id="confrimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#17a2b8;">
                <h2 class="modal-title" id="exampleModalLabel" style="color: white">Delete</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="form-horizontal" id="delteform" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <label id="idConfrim" hidden></label>
                    <label id="nameConfrim" hidden></label>
                    <h5 id="confrimP"></h5>
                </div>
                <div class="modal-footer">
                    <button type="button"      id="confrimYes"  class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>

            </form>
        </div>
    </div>
</div>
