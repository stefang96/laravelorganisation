<?php

/*
if(isset($_POST['price']))
{

    $membership=$membershipModel->addMembership($_POST,$_SESSION['idUser']);

    if($membership)
    {
        $id=$_SESSION['idUser'];

        echo "<script type='text/javascript'> window.location='index.php?view=newsAndPayments&id=$id'; alert('Uspjesno ste uplatili clanarinu!  Sacekajte dok admin potvrdi vasu uplatu!');</script>";
    }

}
*/

?>


<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">


            <?php if(session('active')): ?>
            <div class="modal-header" style="background-color:#28a745;">
                <h4 class="modal-title " style="color:white;">Status: Active</h4>

                <?php else:?>
                <div class="modal-header" style="background-color:#dc3545;">
                    <h4 class="modal-title " style="color:white;"  >Status : Inactive</h4>

                    <?php endif; ?>
                    <button type="button"style="color:white;" class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">
                    <?php if(session('active')): ?>

                    <h3>Vi se aktivan korisnik naseg udruzenja.</h3>
                    <p>Uplatili ste clanarinu  <b><?=date('F j Y',strtotime($membership[$lenght]->datum_uplate))?></b>  u iznosu od:  <b><?=$membership[$lenght]['price']?></b>  KM.</p>
                    <p>Vasa clanirana je aktivna do: <b><?=date('F j Y',strtotime($membership[$lenght]->datum_isteka))?> </b> ili   <b><?php echo ($end_date - $start_date)/60/60/24-1; ?></b> dana od danas.</p>

                    <button class="btn btn-info"  onclick="uplate(this)">Uplate clanarina - PRIKAZI</button>




                    <table id="tableActive" class="table table-bordered table-striped" style="display: none" >

                        <thead class="thead-dark ">
                        <tr>
                            <th>#</th>
                            <th>Datum uplate</th>
                            <th>Datum isteka</th>
                            <th>Iznos</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $number=0;
                        foreach ($membership as $m):

                        ?>
                        <tr>

                            <td><?=++$number?></td>
                            <td><?=date('F j Y',strtotime($m->datum_uplate));?></td>
                            <td><?=date('F j Y', strtotime($m->datum_isteka));?></td>
                            <td><?=$m->price?> KM</td>
                        </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>

                    <hr style="background-color: #17a2b8">


                    <input type="button"    class="btn btn-info btn-success" data-dismiss="modal" style="width: 235px; margin-left: 25%" value="OK">


                    <?php else:



                    if($lenght>=0):?>


                    <h3>Vi vise niste aktivan korisnik naseg udruzenja.</h3>
                    <p>Uplatili ste clanarinu  <b><?=date('F j Y',strtotime($membership[$lenght]->datum_uplate))?></b>  u iznosu od: <b><?=$membership[$lenght]['price']?></b> KM. </p>
                    <p>Vasa clanirana je istekla <b> <?=date('F j Y',strtotime($membership[$lenght]->datum_isteka))?></b> .</p>

                    <?php else:?>
                    <h3>Dobrodosli! </h3>
                    <h5>Vi niste aktivan korisnik naseg udruzenja.</h5>
                    <p> Da bi ste postali aktivan korisnik naseg udruzenja morate da uplatite clanarinu. Clanarina se placa na godisnjem nivou i traje od dana kada ste uplatili do istog dana sledece godine.</p>

                    <?php endif;?>
                    <hr style="background-color: #17a2b8">

                    <div class="alert alert-warning" role="alert" id="messageStatus"  style="color: red" hidden="true"></div>
                    <h2>Uplati clanarinu:</h2>

                    <form  id="statusForm"  action="<?=FULL_URL_PATH?>laravelorganisation/public/members/membership" method="post">


                        <div class="form-group row">
                            <label  class="col-sm-4 col-form-label">Unesite cijenu:</label>
                            <div class="col-sm-6">
                                <input type="text" style="text-align: center" name="price" id="statusPrice" class="form-control">
                            </div>

                            <label  class="col-sm-1 col-form-label"> KM</label>

                        </div>

                        <hr style="background-color: #17a2b8">
                        <div class="form-group">
                            <input type="button" name="status" id="statusUplati" class="btn btn-info btn-success" style="width: 235px; margin-left: 25%" value="UPLATI">
                        </div>
                    </form>

                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>




