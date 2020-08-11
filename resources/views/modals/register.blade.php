
<?php


?>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color:#17a2b8;">


                <?php
                if(session('is_logged')):
                ?>
                <h4 class="modal-title " style="color:white;">Add member</h4>
                <button type="button"style="color:white;" class="close" data-dismiss="modal">&times;</button>
                <?php else:?>
                <h4 class="modal-title " style="color:white;">Registration</h4>
                <button type="button"style="color:white;" class="close" data-dismiss="modal">&times;</button>

                <?php endif;

                ?>


            </div>
            <div class="modal-body">
                <form action="<?=FULL_URL_PATH?>laravelorganisation/public/registration" method="post" id="registration_form" >

                    @csrf
                    <div class="alert alert-warning" role="alert" id="message_reg"  style="color: red" hidden="true"></div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">Ime:<span class="register">*</span></label>
                            <input type="text" class="border form-control" id="reg_name" name="ime" placeholder="Unesite vase ime">
                        </div>
                        <div class="form-group">
                            <label for="email">Prezime:<span class="register">*</span></label>
                            <input type="text" class="border form-control" id="last_name" name="last_name" placeholder="Unesite vase prezime">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Email:<span class="register">*</span></label>
                            <input type="email"   class="border form-control" id="emailRegister" name="email" placeholder="Unesite  email">
                        </div>
                        <p class="alert alert-warning" style="color: red" id="emailP" hidden="true"></p>
                        <div class="form-group">
                            <label for="description">Password:<span class="register">*</span></label>
                            <input type="password" class="form-control" id="pass" name="password"  placeholder="Unesite password">
                        </div>


                        <div class="form-group">
                            <label for="description">JMBG:<span class="register">*</span></label>
                            <input type="text" class="form-control" id="jmbgRegister" name="jmbg"  placeholder="Unesite JMBG ">
                        </div>
                        <p class="alert alert-warning" style="color: red" id="jmbgP" hidden="true"></p>
                        <div class="form-group">
                            <label for="description">Broj licne karte:<span class="register">*</span></label>
                            <input type="text" class="form-control" id="pNumberRegister" name="personal_number" placeholder="Unesite broj licne karte">
                        </div>

                        <p class="alert alert-warning" style="color: red" id="numberP" hidden="true"></p>

                        <div class="form-group">
                            <label for="description">Izaberite drzavu:<span class="register">*</span></label>
                            <select name="country" id="country" class="form-control"  data-live-search="true" title="Izaberite drzavu ...">

                                <?php
                                foreach($allCountry as $m) : ?>

                                <option value="<?= $m->idcountry?>">     <?= $m->name; ?> </option>
                                <?php endforeach; ?>

                            </select>

                        </div>
                        <div class="form-group">
                            <label for="description">Grad: <span class="register">*</span></label>
                            <input type="text" class="form-control" id="city" name="city"  placeholder="Unesite grad">
                        </div>

                        <div class="form-group">

                            <label for="description">Izaberite pol :<span class="register">*</span></label>

                            <select class="form-control" name="pol" id="gender">
                                <option selected >Male</option>
                                <option>Female</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="description">Broj telefona:<span class="register">*</span></label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Unesite broj telefona">
                        </div>



                        <?php
                        if(session('is_logged')):
                        ?>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="chb" name="approve" value="true" >
                                <label class="custom-control-label " style="color: red" for="chb">Approve</label>
                            </div>
                        </div>
                        <div class="form-group">

                            <label for="description"> <span class="register" style="font-style: italic;font-weight: bold">Tip korisnika:*</span></label>

                            <select class="form-control" name="tip_korisnika" id="admin">
                                <option  value="1" >Admin</option>
                                <option selected value="2">Clan</option>
                            </select>
                        </div>


                        <?php else: ?>
                        <div class="form-group">
                            <input type="checkbox" name="approve" hidden>
                        </div>
                        <select class="form-control" name="tip_korisnika" hidden id="admin">
                            <option  value="1" >Admin</option>
                            <option selected value="2">Clan</option>
                        </select>

                        <?php endif; ?>
                    </div>

                    <div class="form-group">

                        <?php
                        if(session('is_logged')):
                        ?>
                        <input  type="button" class="btn btn-info btn-success" style="width: 235px; margin-left: 25%" value="Add" id="registration" name="registration">

                        <?php else: ?>

                        <input type="button"  class="btn btn-info btn-success" style="width: 235px; margin-left: 25%" value="Register" id="registration" name="registration">

                        <?php endif; ?>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>




