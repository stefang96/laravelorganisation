<?php

?>


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
    <?php foreach ($result_us as $user):

        ?>
        <tr>
            <td  style="text-align: center" > <a href="<?=FULL_URL_PATH?>laravelorganisation/public/newsAndPayments/<?=$user->idusers?>" > <b><?=$user->first_name." ".$user->last_name ?></b></a> </td>
            <td ><?=$user->email ?></td>
            <td><?=$user->phone_number ?></td>
            <td><?=$user->country->name.' ('.$user->city.' )' ?></td>
            <td><?=$user->jmbg?></td>
            <td><?=$user->personal_number ?></td>


            <td>
                <?php

                ?>
                <a  onclick="detailsModal('<?=$user->first_name?>','<?=$user->last_name?>','<?=$user->email?>','<?=$user->phone_number?>','<?=$user->country->name?>','<?=$user->city?>',
                '<?=$user->jmbg?>','<?=$user->personal_number?>','<?=$user->gender?>')"> <img style="width: 35px; height: 35px;  cursor: pointer" class="hoverNews" src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/details.jpg"></a>

                <?php if(session('is_logged')):
                    if(session('role') && session('role')=='1'):
                        ?>
                        <a  href="<?=FULL_URL_PATH?>laravelorganisation/public/members/<?=$user->idusers?>/edit")> <img style="width: 35px; height: 35px; margin-left: 5px; cursor: pointer" class="hoverNews" src="<?=FULL_URL_PATH?>LaravelOrganisation/Assets/img/edit2.png"></a>

                        <a  onclick="deleteUser(<?=$user->idusers?>)"> <img style="width: 40px; margin-left: 2px; cursor: pointer" class="hoverNews" src="<?=FULL_URL_PATH?>laravelorganisation/Assets/img/delete.png" ></a>
                    <?php endif; ?>
                <?php endif; ?>

            </td>


        </tr>
    <?php endforeach; ?>

    </tbody>
</table>


<hr>
<br>
<?php echo  $result_us->links() ?>



