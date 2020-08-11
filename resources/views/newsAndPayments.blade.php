@extends('welcome')

@section('content')




<div class="container body-content">

    <br>
    <div class="col-md-12">
        <h1 style="text-align: center; color:#17a2b8 "><?=$user->first_name.' '.$user->last_name ?></h1>
<input type="text" hidden id="idUser" value="<?=$user->idusers ?>">
    </div>
    <hr style="background-color: #17a2b8">
    <div class="row">

        <div class="col-md-7">


            <br>
            <h2>News</h2>
            <p></p>

            <div class="form-group">


                <br>

                <h5>Between two date</h5>


                <div class="form-inline" >

                    <?php if(isset($_GET['startDate'])  && isset($_GET['endDate'])): ?>
                    <label >from  </label>
                    <input class="form-control "   id="startDateNews" style="margin-left: 10px"  onfocus="this.value=''" value="<?=$_GET['startDate'] ?>"  type="text" aria-label="Search">
                    <label style="margin-left: 10px" >to</label>
                    <input style="margin-left: 10px;margin-right: 10px" class="form-control" id="endDateNews" onfocus="this.value=''"  value="<?=$_GET['endDate'] ?>" type="text" aria-label="Search" >
                    <img src="../../Assets/img/search.png" style="width: 35px;height: 35px" onclick="betweenDateNews()">

                    <?php else: ?>
                    <label >from  </label>
                    <input class="form-control "  onfocus="this.value=''" id="startDateNews" style="margin-left: 10px"   type="text" aria-label="Search">
                    <label style="margin-left: 10px" >to</label>
                    <input style="margin-left: 10px;margin-right: 10px" class="form-control" onfocus="this.value=''" id="endDateNews"   vatype="text" aria-label="Search" >
                    <img src="../../Assets/img/search.png" style="width: 35px;height: 35px" onclick="betweenDateNews()">


                    <?php endif;?>

                </div>


            </div>



            <div class="form-inline ">

                <div class="form-inline">
                    <label for="search">Search:</label>
                    <?php if(isset($_GET['search'])): ?>
                    <input class="form-control hasclear" id="searchNewsMember" onkeyup="searchMemberNews()" value="<?=$_GET['search']?>" type="text" placeholder="Search" style="margin-left: 10px"   aria-label="Search">
                    <span class="clearer" style="margin-left: -25px" id="searchNewsMemberSpan"  ><img style="width: 25px;height: 25px" src="../../Assets/img/close2.png"> </span>

                    <?php else: ?>
                    <input class="form-control hasclear" id="searchNewsMember" onkeyup="searchMemberNews()" type="text" placeholder="Search" style="margin-left: 10px"   aria-label="Search">

                    <span class="clearer" style="margin-left: -25px" id="searchNewsMemberSpan"  ><img style="width: 25px;height: 25px" src="../../Assets/img/close2.png"> </span>

                    <?php endif; ?>
                </div>


            </div>

            <hr>

            <div id="divTableMemberNews">


                @include('tables/tableMemberNews')

            </div>


        </div>

        <div class="col-md-5">

            <br>
            <h2>List of payments</h2>
            <p></p>


            <div class="form-group">


                <br>

                <h5>Between two date</h5>


                <div class="form-inline" >

                    <?php if(isset($_GET['startDateP'])  && isset($_GET['endDateP'])): ?>
                    <label >from  </label>
                    <input class="form-control "  id="startDatePayments" style="margin-left: 10px;width: 150px" onfocus="this.value=''" value="<?=$_GET['startDateP'] ?>" type="text" aria-label="Search">


                    <label style="margin-left: 10px" >to</label>
                    <input style="margin-left: 10px;margin-right: 10px; width: 150px" class="form-control" onfocus="this.value=''"  value="<?=$_GET['endDateP'] ?>" id="endDatePayments"   type="text" aria-label="Search" >
                    <img src="../../Assets/img/search.png" style="width: 35px;height: 35px" onclick="betweenDatePayments()">

                    <?php else: ?>

                    <label >from  </label>
                    <input class="form-control " onfocus="this.value=''"  id="startDatePayments" style="margin-left: 10px;width: 150px"   type="text" aria-label="Search">

                    <label style="margin-left: 10px" >to</label>
                    <input style="margin-left: 10px;margin-right: 10px; width: 150px" class="form-control"  onfocus="this.value=''" id="endDatePayments"   type="text" aria-label="Search" >
                    <img src="../../Assets/img/search.png" style="width: 35px;height: 35px" onclick="betweenDatePayments()">


                    <?php endif;?>
                </div>

            </div>
            <div class="form-inline ">

                <div class="form-group">
                    <label for="search">Search:</label>
                    <?php if(isset($_GET['searchP'])): ?>
                    <input class="form-control hasclear" id="searchPayments" onkeyup="searchPayments()" value="<?=$_GET['searchP']?>" type="text" placeholder="Search price" style="margin-left: 10px"   aria-label="Search">
                    <span class="clearer" style="margin-left: -25px" id="searchPaymentsSpan"  ><img style="width: 25px;height: 25px" src="../../Assets/img/close2.png"> </span>

                    <?php else:?>
                    <input class="form-control hasclear" id="searchPayments" onkeyup="searchPayments()" type="text" placeholder="Search price" style="margin-left: 10px"   aria-label="Search">

                    <span class="clearer" style="margin-left: -25px" id="searchPaymentsSpan"  ><img style="width: 25px;height: 25px" src="../../Assets/img/close2.png"> </span>

                    <?php endif;?>

                </div>
            </div>

            <hr>
            <div id="divTableMemberPayments">

                    @include('tables/tablePayments')


            </div>
            {{$resultPayments->links()}}
        </div>


    </div>

</div>
</div>
@endsection
