@extends('welcome')

@section('header')
    @extends('header/headerTwo')
@endsection

@section('content')


    <div class="container body-content">



        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class=" col-md-6">


                        <br>

                        <h5>Between two date</h5>

                        <?php if(isset($_GET['startDate']) && isset($_GET['endDate'])):?>
                        <div class="form-inline" >

                            <label >from  </label>
                            <input class="form-control "  id="startDate" style="margin-left: 10px"  value="<?=date('d/m/Y',strtotime($_GET['startDate'] ))?>" type="text" aria-label="Search">
                            <label style="margin-left: 10px" >to</label>
                            <input style="margin-left: 10px;margin-right: 10px" class="form-control" id="endDate"  value="<?=date('d/m/Y',strtotime($_GET['endDate']))?>" type="text" aria-label="Search" >
                            <img src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/search.png" style="width: 35px;height: 35px" onclick="betweenDate()">
                        </div>
                        <?php else: ?>
                        <div class="form-inline" >

                            <label >from  </label>


                            <input class="form-control  hasclear" onfocus="this.value=''" id="startDate" style="margin-left: 10px"   type="text" aria-label="Search">
                            <label style="margin-left: 10px" >to</label>
                            <input style="margin-left: 10px;margin-right: 10px" class="form-control" id="endDate" onfocus="this.value=''"  type="text" aria-label="Search" >
                            <img src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/search.png" style="width: 35px;height: 35px" onclick="betweenDate()">
                        </div>

                        <?php endif;?>


                    </div>

                    <div class="col-md-4">

                        <br>
                        <h5>Member</h5>
                        <select class="form-control" id="userID" data-live-search="true" >
                        <option value="" selected >  Sve </option>
                        <?php  foreach ($users as $user): ?>

                        <option  <?php if(isset($_GET['user'])): if($_GET['user']==$user->idusers): echo "selected"; endif;  endif; ?>  value="<?= $user->idusers?>">  <?php echo $user->first_name.' '.$user->last_name; ?> </option>
                        <?php endforeach; ?>

                        </select>


                    </div>




                </div>
                <div class="row">

                    <div class="col-md-4">
                        <br>

                        <div class="form-inline">
                            <h5 style="margin-right: 10px;" >Search </h5>
                            <?php if (isset($_GET['search'])):
                            ?>
                            <input class="form-control hasclear" id="mySearchNews" onkeyup="mySearchNews()"  type="text" aria-label="Search" value=<?= $_GET['search'];?>>

                            <span class="clearer" style="margin-left: -30px"  id="mySearchNewsSpan"   ><img style="width: 25px;height: 25px" src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/close2.png" > </span>


                            <?php else:  ?>

                            <input class="form-control hasclear" id="mySearchNews"  onkeyup="mySearchNews()" type="text" placeholder="Search" aria-label="Search">

                            <span class="clearer" style="margin-left: -30px"  id="mySearchNewsSpan"  ><img style="width: 25px;height: 25px" src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/close2.png" > </span>

                            <?php endif; ?>
                        </div>

                    </div>

                    <?php  if(session('is_logged')): ?>

                    <div  style="margin-left: 54.7%">


                        <br>
                        <button type="button" id="addNews" class="btn btn-lg btn-info"  >Add news</button>

                    </div>
                    <?php endif; ?>


                </div>

                <br>

                 <div id="tableNewsDiv">

                     @include('tables/tableNews')


                 </div>

            </div>



        </div>
    </div>
@endsection

@include('news/create')
@include('modals/delete')
