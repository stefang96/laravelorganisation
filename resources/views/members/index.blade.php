@extends('welcome')




@section('header')

    @extends('header/headerTwo')
@endsection


@section('content')





<?php

/*
$membersModel=new UserModel();

$result=$membersModel->filterMembers();
$contry=new ModelCountry();

$allCountry=$contry->getDrzave();
$default_url = 'index.php?view=members';
$pagination_url = 'index.php?view=members&p=[p]';
if(isset($_GET['p']))
{
    $pageNumber = $_GET['p'];
}
else
{
    $pageNumber = 1;
}
$pageSize = 10;
$limitPage = ((int)$pageNumber - 1) * $pageSize;
$limit_clause = " LIMIT ".$limitPage.",".$pageSize;
$result_us=$membersModel->filterMembers(false,false,$limit_clause);





if(isset($_GET['search'])) {
    if ($_GET['search'] != "") {

        if (isset($_GET['country'])) {
            if ($_GET['country'] != "") {
                //search,country,
                $result_us = $membersModel->filterMembers($_GET['search'], $_GET['country'], $limit_clause);
                $result = $membersModel->filterMembers($_GET['search'], $_GET['country']);

            } else {
                //search
                $result_us = $membersModel->filterMembers($_GET['search'], false, $limit_clause);
                $result = $membersModel->filterMembers($_GET['search'], false);

            }

            $pagination_url = 'index.php?view=members&p=[p]&search='.$_GET['search'].'&country='.$_GET['country'];
            $default_url = 'index.php?view=members&search='.$_GET['search'].'&country='.$_GET['country'];

        }

    }
    else {

        if (isset($_GET['country'])) {
            if ($_GET['country'] != "") {
                //,country,
                $result_us = $membersModel->filterMembers(false, $_GET['country'], $limit_clause);
                $result = $membersModel->filterMembers(false, $_GET['country']);

            } else {
                //

                $result_us = $membersModel->filterMembers(false,false,$limit_clause);
                $result = $membersModel->filterMembers();
            }

            $pagination_url = 'index.php?view=members&p=[p]&search='.$_GET['search'].'&country='.$_GET['country'];
            $default_url = 'index.php?view=members&search='.$_GET['search'].'&country='.$_GET['country'];

        }


    }
}




$totalRecords = count($result);

$pg = new bootPagination();
$pg=HelperModel::setPagination($pg,$pageNumber,$pageSize,$totalRecords,$default_url,$pagination_url);
*/
?>

<div class="container body-content">
    <br>
    <h2>Members of the organisation</h2>
    <p>The .thead-dark class adds a black background to table headers, and the .thead-light class adds a grey background to table headers:</p>
    <div class="row">
        <div class=" col-md-4">


            <br>




            <div class="form-inline" >
                <h5>Search</h5>

                <?php if (isset($_GET['search'])): ?>
                <input class="form-control hasclear" id="searchMembers" type="text" onkeyup="searchMembers()" placeholder="Search" style="margin-left: 10px"  value="<?=$_GET['search'] ?>" aria-label="Search">

                <span class="clearer" style="margin-left: -30px"  id="searchMembersSpan"><img style="width: 25px;height: 25px" src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/close2.png"> </span>

                <?php else: ?>

                <input class="form-control hasclear" id="searchMembers" onkeyup="searchMembers()" type="text" placeholder="Search" style="margin-left: 10px"   aria-label="Search">

                <span class="clearer" style="margin-left: -30px" id="searchMembersSpan"  ><img style="width: 25px;height: 25px" src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/close2.png"> </span>

                <?php  endif; ?>
            </div>


        </div>

        <div class="col-md-6">

            <br>

            <div class="form-inline" >
                <h5>Country</h5>
                <select  class="form-control mx-sm-3 " id="selectCountry" data-live-search="true" >
                <option value=""  selected >  Sve </option>
                <?php  foreach ($allCountry as $country): ?>

                <option <?php  if(isset($_GET['country'])): if($_GET['country']==$country['idcountry']): echo "selected"; endif;endif;?> value="<?=$country->idcountry ?>" ><?=$country->name?></option>

                <?php endforeach; ?>

                </select>
            </div>



        </div>

        <div class="col-md-2">
            <?php  if(session('is_logged')):

            if(session('role') && session('role')=='1'):?>

            <br>
            <div >

                <button type="button" id="addMember" class="btn btn-lg btn-info"  >Add member</button>

            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>


    <br>
    <hr>


    <div id="divtableMembers">

        @include('tables/tableMembers')

    </div>


</div>

@include('modals/delete')
@include('modals/show')

<?php// include 'view/modals/confrim.php';
//include 'view/modals/details.php';

@endsection
