<?php





?>

<!-- Modal -->
<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#17a2b8;">


                <h4 class="modal-title " style="color:white;">Log in</h4>

                <button type="button"style="color:white;" class="close" data-dismiss="modal">&times;</button>


            </div>
            <div class="modal-body">


                    <div class="alert alert-warning" role="alert"  id="alertLogin" hidden="true" style="color: red">




                </div>


                <form action="<?=FULL_URL_PATH?>laravelorganisation/public/login" method="post" id="login_form" >


                    @csrf
                    <div class="alert alert-warning" role="alert" id="message_login" hidden="true"></div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" placeholder="someone@example.com" id="loginUsername" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="loginPassword" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="button" id="loginBtn"   class="btn btn-info btn-success" style="width: 235px; margin-left: 25%" value="Log in">
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>






