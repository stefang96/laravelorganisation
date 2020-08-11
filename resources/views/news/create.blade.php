<?php



?>
<div class="modal fade" id="addNewsModal" role="dialog" >
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-header " style="background-color:#17a2b8;">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Add news</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span style="color:white;" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <form class="form-horizontal"  action="news" method="post">
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="idusers" disabled value="{{session('name')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">

                            <textarea class="form-control"  rows="1" name="title" placeholder="Title"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Short description</label>
                        <textarea class="form-control" name="short_description" rows="2" placeholder="Short description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" rows="5"></textarea>
                    </div>
                    <div class="form-group row">
                        <div   style="margin-left: 35%" >
                            <button type="submit" class="btn btn-info" name="add" style="width: 150px;">Add</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


