@extends('welcome')


@section('header')

    @extends('header/headerTwo')
@endsection

@section('content')


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

                <span class="clearer" style="margin-left: -30px"  id="searchMembersSpan"><img style="width: 25px;height: 25px" src="../Assets/img/close2.png"> </span>

                <?php else: ?>

                <input class="form-control hasclear" id="searchMembers" onkeyup="searchMembers()" type="text" placeholder="Search" style="margin-left: 10px"   aria-label="Search">

                <span class="clearer" style="margin-left: -30px" id="searchMembersSpan"  ><img style="width: 25px;height: 25px" src="../Assets/img/close2.png"> </span>

                <?php  endif; ?>
            </div>


        </div>

        <div class="col-md-6">

            <br>





        </div>

        <div class="col-md-2">
            <?php  if(session("is_logged")):

            if(session("role")==1):?>

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


        <table id=" " class="table ">
            <thead class="thead-dark ">
            <tr>
                <th style="text-align: center" >Name</th>
                <th>E-mail</th>
                <th>Phone number</th>
                <th>Country (City )</th>
                <th>JMBG</th>
                <th>Personal number</th>
                <th style="text-align: center;">Options</th>


            </tr>
            </thead>
            <tbody>

            <?php foreach ($result as $user):

            ?>
            <tr>
                <td  style="text-align: center" > <a href="index.php?view=newsAndPayments&id=<?=$user->idusers?>" > <b><?=$user->first_name." ".$user->last_name ?></b></a> </td>
                <td ><?=$user->email ?></td>
                <td><?=$user->phone_number ?></td>
                <td><?=$user->name.' ('.$user->city.' )' ?></td>
                <td><?=$user->jmbg ?></td>
                <td><?=$user->personal_number ?></td>


                <td>
                    <a  onclick="detailsModal('<?=$user->first_name?>','<?=$user->last_name?>','<?=$user->email?>','<?=$user->phone_number?>','<?=$user->name?>','<?=$user->city?>',
                        '<?=$user->jmbg?>','<?=$user->personal_number?>','<?=$user->gender?>')"> <img style="width: 35px; height: 35px;  cursor: pointer" class="hoverNews" src="../Assets/img/details.jpg"></a>


                    <a  href="members/<?=$user->idusers?>/edit")> <img style="width: 25px; height: 25px; margin-left: 5px; cursor: pointer" class="hoverNews" src="../Assets/img/edit2.png"></a>

                    <a  onclick="deleteUser(<?=$user->idusers?>)"> <img style="width: 30px; margin-left: 2px; cursor: pointer" class="hoverNews" src="../Assets/img/delete.png" ></a>

                    <a  href="allowMember/<?=$user->idusers?>" > <img style="width: 35px; height: 35px; margin-left: 2px; cursor: pointer" class="hoverNews" src="../Assets/img/check.png" ></a>

                </td>


            </tr>
            <?php endforeach; ?>

            </tbody>
        </table>

        {{$result->links()}}
    </div>


</div>
    @include('modals/delete')
    @include('modals/show')
@endsection
