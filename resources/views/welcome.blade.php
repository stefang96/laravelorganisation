
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/laravelorganisation/config/loader.php';


?>
<html>
<head>

    <title>Organisation</title>
    <meta name="_token" content="{{csrf_token()}}" />

    <link href="<?=FULL_URL_PATH?>/laravelorganisation/Assets/stylesheet/style.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="<?=FULL_URL_PATH?>/laravelorganisation/Assets/modern-business/modern-business.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="<?=FULL_URL_PATH?>/laravelorganisation/Assets/stylesheet/bootstrap-datetimepicker.min.css">
    <link rel="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>


<body>




<?php


if(session('is_logged') && session('role')!=1) {
  include FULL_FILE_PATH.'resources/views/modals/status.blade.php';
   }

?>



<!-- Navigation -->

<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand  logo"  id="pocetna" style="color: white" href="<?=FULL_URL_PATH?>laravelorganisation/public">Stomatology</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">



                <li class="nav-item">
                    <a class="nav-link  navigacija" style="color: white" href="<?=FULL_URL_PATH?>laravelorganisation/public/news" >NEWS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navigacija"   style="color: white" href="<?=FULL_URL_PATH?>laravelorganisation/public/members"> MEMBERS</a>
                </li>

                <?php
                if(!session('name')): ?>

                <li class="nav-item">
                    <a class="nav-link navigacija" style="color: white"  href="<?=FULL_URL_PATH?>laravelorganisation/public/about"> ABOUT</a>
                </li>


                <li class="nav-item">
                    <button type="button" class="btn btn-outline-info" id="login" style="margin-right: 10px;margin-left: 5px; width: 100px; color: white;">LOG IN</button>

                </li>
                <li class="nav-item">
                    <button type="button" class="btn btn-outline-info" id="register" name="register" style="width: 110px; color: white;" >REGISTER</button>

                </li>



                <?php else: ?>

                <?php if(session('role')==1): ?>

                <li class="nav-item">
                    <a class="nav-link navigacija" style="color: white" href="<?=FULL_URL_PATH?>laravelorganisation/public/paymentOverview">PAYMENT OVERVIEW</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navigacija"  style="color: white" href="<?=FULL_URL_PATH?>laravelorganisation/public/waitingList">WAITING LIST</a>
                </li>

                <?php else:?>



                <li class="nav-item">
                    <a class="nav-link navigacija" style="color: white" href="<?=FULL_URL_PATH?>laravelorganisation/public/newsAndPayments/<?=session('idUser') ?>">NEWS AND PAYMENTS</a>
                </li>

                <?php if(session('active')): ?>
                <li class="nav-item">
                    <button class="btn btn-success"  id="active" style="color: white; margin-left: 20px " href="status" >STATUS: ACTIVE</button>
                </li>
                <?php else:?>
                <li class="nav-item">
                    <button class="btn btn-danger"  id="active" style="color: black; margin-left: 20px"  href="status" <?php if($active): echo 'disabled="true"';  else: 'disabled="false"';endif; ?> >STATUS: INACTIVE!</button>
                </li>


                <?php endif; ?>
                <?php endif; ?>










            </ul>
        </div>
    </div>

    <div class="dropdown">
        <?php if(session('role')==1): ?>
        <button class="btn btn-outline-info dropdown-toggle" style="color: white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Admin:{{session('name')}}
        </button>
        <?php else: ?>
        <button class="btn btn-outline-info dropdown-toggle" style="color: white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{session('name')}}
        </button>

        <?php endif; ?>
        <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item "   href="<?=FULL_URL_PATH?>laravelorganisation/public/members/<?=session('idUser')?>/edit">Uredi profil</a>
            <a class="dropdown-item "  href="<?=FULL_URL_PATH?>laravelorganisation/public/logout">Odjavi se</a>
        </div>
    </div>

    <?php endif; ?>

</nav>


@yield('header')





@yield('content')

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white" style="font-size: 25px">Copyright &copy; Stefan Grujicic 2019</p>
    </div>
</footer>


@include('modals/register')
@include('modals/alert')
@include('modals/login')



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="<?=FULL_URL_PATH?>/laravelorganisation/Assets/js/bootstrap-datetimepicker.min.js"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?=FULL_URL_PATH?>/laravelorganisation/Assets/js/script.js"></script>

</body>

</html>





