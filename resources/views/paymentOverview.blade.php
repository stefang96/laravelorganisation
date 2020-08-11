@extends('welcome')


@section('header')

    @extends('header/headerTwo')
@endsection

@section('content')


<div class="container">

    <br>
    <h2>Payment Overview</h2>
    <hr>
    <p>The .thead-dark class adds a black background to table headers, and the .thead-light class adds a grey background to table headers:</p>




    <br>
    <h5 >Search </h5>
    <div class="active-cyan-4 mb-4" style="width: 30%">
        <input class="form-control" id="searchPaymentOverview" type="text" placeholder="Search" aria-label="Search">
    </div>


    <table class="table" id="paymentOverview">

        <thead class="thead-dark">

        <tr>
            <th style="text-align: center; vertical-align: middle" rowspan="2" style="text-align: center">Name</th>
            <th style="text-align: center; vertical-align: middle" rowspan="2">Email</th>
            <th style="text-align: center; vertical-align: middle" rowspan="2" style="text-align: center">Status</th>
            <th style="text-align: center; vertical-align: middle"  rowspan="2" style="text-align: center">Membership</th>
            <th colspan="2" style="text-align: center">Date </th>
            <th style="text-align: center; vertical-align: middle" colspan="2"  style="text-align: center">Details</th>
            <th style="text-align: center; vertical-align: middle" rowspan="2" style="text-align: center">Email</th>
        </tr>
        <tr>


            <th style="text-align: center; ">    ______from______      </th>
            <th style="text-align: center; " >  ________to________      </th>
            <th style="text-align: center; " > ____________________ </th>
            <th style="text-align: center; " > ____ </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result_us1 as $user):



        $date = date('F j Y',time() );


        $current_date = strtotime($date);

            $end_date = strtotime($user->datum_isteka);


        if($user->user_type==2):
        ?>

        <tr>
            <td style="text-align: center" ><b> <?=$user->first_name." ".$user->last_name ?> </b></td>
            <td ><?=$user->email ?></td>
            <td  <?php if($user->is_active  && $current_date<$end_date): ?> style="text-align: center; border-radius: 30px; vertical-align: middle; background-color: #28a745;color:white";<?php else: ?> style="text-align: center;border-radius: 30px; background-color: #dc3545; vertical-align: middle; color:white"; <?php endif;?> ><?php if($user->is_active  && $current_date<$end_date): echo '<b>Active</b>'; else: echo '<b>Inacitve</b>'; endif;  ?></td>
            <td style="text-align: center"><?php  echo $user->price.' KM'; ?></td>
            <td style="text-align: center"><?php echo date('F j Y',strtotime($user->datum_uplate));  ?></td>
            <td style="text-align: center"><?php echo  date('F j Y',strtotime($user->datum_isteka));?></td>
            <td style="text-align: center"><?php if($current_date>=$end_date): echo "<span style='color: red'>CLANARINA NIJE UPLACENA!</span>"; else: echo "<span style='color: #28a745'>CLANARINA UPLACENA!</span>"; endif; ?></td>
            <td style="text-align: center"><?php  if($current_date<$end_date && ($user->is_active!=1) ): ?> <button onclick="btnConfrim(<?=$user->idusers ?>)"   class="btn btn-success">Potvrdi</button> <?php  else: ?> ----<?php endif; ?></td>
            <td style="text-align: center"><!-- Default checked -->
                <?php

                if($current_date>=$end_date):?>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input"  id="chb<?=$user->idusers ?>" onchange="btnSent(<?=$user->idusers ?>)" >
                    <label class="custom-control-label" for="chb<?=$user->idusers ?>">Checked</label>
                </div>
                <?php else:?>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" disabled id="chb<?=$user->idusers ?>" >
                    <label class="custom-control-label" for="chb<?=$user->idusers ?>">Checked</label>
                </div>


                <?php endif; ?>

            </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
        </tbody>
    </table>



    <br><hr> <br>
    <div style="margin-left: 90%" >
        <button style="width: 120px; height: 40px; " disabled="false" id="sentBtn"  onclick="btnSentFromChb()" class="btn btn-info">SENT</button>
    </div>

    <br> <br> <br>
</div>



@endsection
