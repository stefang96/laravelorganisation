<?php

?>


<table id="tablePayments" class="table table-bordered table-striped"  >

    <thead class="thead-dark ">
    <tr>
        <th style="text-align: center; vertical-align: middle" rowspan="2">Broj</th>
        <th style="text-align: center" colspan="2">Datum</th>

        <th style="text-align: center;vertical-align: middle" rowspan="2">Iznos (KM)</th>
    </tr>
    <tr>

        <th >uplate</th>
        <th >isteka</th>


    </tr>

    </thead>
    <tbody>
    <?php
    if(isset($_GET['q']))
    {
        $number=($_GET['q']-1)*4+1;
    }
    else
    {
        $number=1;
    }

    foreach ($resultPayments as $m):

        ?>
        <tr>

            <td><?=$number++?></td>
            <td><?=date('F j, Y',strtotime($m->datum_uplate))?></td>
            <td><?=date('F j, Y',strtotime($m->datum_isteka))?></td>
            <td style="text-align: center"> <?=$m->price?> KM</td>
        </tr>

    <?php endforeach; ?>

    </tbody>
</table>


