@extends('welcome')



@section('content')



<?php

/*
$userModel=new UserModel();
$newsModel=new newsModel();


if(isset($_POST['save']))
{

      echo $_POST['id'].'<br>'.$_POST['first_name'].'<br>'.$_POST['last_name'].'<br>'.$_POST['email'].'<br>'.$_POST['password'].'<br>'.
           $_POST['country'].'<br>'.$_POST['phone_number'].'<br>'.$_POST['city'].'<br>'.$_POST['birthday'].'<br>'.$_POST['address'].'<br>'.$_POST['website'].'<br>'.
           $_POST['gender'].'<br>'.$chb.'<br>'.$_POST['tip_korisnika'].'<br>';

    $editUser=$userModel->updateUser($_POST);

    //  echo $_POST['email'];
    if($editUser)
    {
        header('Location:index.php?view=members');
    }
    else{
        echo "korisnik nije editovan";
    }

}

if(isset($_GET['id']))
{


    // $newsModel->get($_GET['id']);
    $result=$userModel->getUser($_GET['id']);


}
*/
?>
<div class="container">
    <h1>Edit <?php echo $result->first_name.'  '.$result->last_name ?></h1>
    <hr>
        <!-- left column -->
        <form class="form-horizontal col-md-12" role="form" action="../../members/<?= $result->idusers?>" method="post">
    <div class="row">
            @csrf
            @method('put')
    <!--<div class="col-md-3">
            <div class="text-center">
                <img src="//placehold.it/100" width="100" height="100" class=" rounded-circle " id="photo" alt="avatar">
                <h6>Upload a different photo...</h6>

                <input type="file" name="file" id="file"   class="form-control">

            </div>
        </div> -->


        <!-- edit form column -->
        <div class="col-md-9 personal-info">
        <!--   <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-coffee"></i>
                Korisnik  <strong><?php echo $result->first_name.'  '.$result->last_name ?></strong> je platio clanarinu i ima objavljenih (broj) vijesti.
            </div> -->
            <h3>Personal info</h3>
            <hr>


                <input class="form-control" type="text"  name="id" value="<?= $result->idusers?>" hidden>
                <div class="form-group">
                    <label class="col-lg-3 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="first_name" value="<?= $result->first_name?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text"name="last_name" value="<?= $result->last_name?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">JMBG:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text"name="jmbg" value="<?= $result->jmbg?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Personal number:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text"name="personal_number" value="<?= $result->personal_number?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="email" disabled value="<?= $result->email?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="password"  value="<?= $result->password?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Country:</label>


                    <div class="col-lg-8">
                        <select class="form-control" name="country" >
                            <?php


                            foreach($allCountry as $m) : ?>

                            <option <?php if($m->idcountry==$result->idcountry): echo "selected"; endif;?> value="<?= $m->idcountry?>"  >     <?= $m->name; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">City:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="city" value="<?= $result->city?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Phone number:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" name="phone_number" value="<?= $result->phone_number?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Gender:</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="gender" >
                            <option <?php if($result->gender=='Male'): echo "selected"; endif;?>  >Male</option>
                            <option <?php if($result->gender=='Female'): echo "selected"; endif;?> >Female</option>
                        </select>
                    </div>
                </div>


                <?php if (session('role')==1): ?>

                <hr>
                <div class="form-group">

                    <div class="row">
                        <div class="custom-control custom-checkbox" style="margin-left: 30px">
                            <input type="checkbox" class="custom-control-input" id="chb" name="approve" value="<?= $result->approve?>"  <?php if($result->approve): echo "checked"; endif;?>  >
                            <label class="custom-control-label " style="color: red" for="chb">Approve</label>
                        </div>



                        <div class="custom-control custom-checkbox" style="margin-left: 60px">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="<?= $result->is_active?>"  <?php if($result->is_active): echo "checked"; endif;?> >
                            <label class="custom-control-label " style="color: red" for="is_active">Is active</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">

                    <label class="col-lg-3 control-label" style="color: red; font-style: italic; font-weight: bold;">Tip korisnika:</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="tip_korisnika" id="admin">
                            <option <?php if($result->user_type==1): echo "selected"; endif;?> value="1" >Admin</option>
                            <option <?php if($result->user_type==2): echo "selected"; endif;?> value="2">Clan</option>
                        </select>
                    </div>
                </div>
                <?php endif; ?>



                <div class="form-group">
                    <hr>
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-6">
                                <a href="../../members"><-Back to list</a>


                            </div>
                            <div class="col-md-4">
                                <input type="submit" class="btn btn-primary" name="save" value="Save Changes">
                            </div>
                        </div>
                    </div>
                </div>




            </form>
        </div>
    </div>
</div>
<hr>

@endsection
