<?php

?>


<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#17a2b8;">
                <h5 class="modal-title"  style="color: white" id="exampleModalLongTitle">Details</h5>
                <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
                  &times;
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">First name</label>
                            <input type="email" class="form-control" id="firstNameModal" disabled >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Last name</label>
                            <input type="text" class="form-control" id="lastNameModal" disabled >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Email</label>
                            <input type="text" class="form-control" id="emailModal" disabled >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">Phone number</label>
                            <input type="text" class="form-control" id="phoneNumberModal" disabled>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputAddress">Personal number</label>
                            <input type="text" class="form-control" id="personalNumberModal" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputAddress2">JMBG</label>
                            <input type="text" class="form-control" id="jmbgModal" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Country</label>
                            <input type="text" class="form-control" id="countryModal"disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState">City</label>
                            <input type="text" class="form-control" id="cityModal" disabled>

                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Gender</label>
                            <input type="text" class="form-control" id="genderModal" disabled>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>

            </div>
        </div>
    </div>
</div>
