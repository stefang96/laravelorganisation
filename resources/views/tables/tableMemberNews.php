









<table id="tableNewsAndPayment" class="table  table-striped dataTable  " style="width: 100%;" role="grid" >
    <thead  class="thead-dark ">
    <tr role="row">
        <th class="sorting_disabled" tabindex="0" aria-controls="NewsTable" rowspan="1" colspan="1" aria-label=": activate to sort column descending" style="width: 474px;">

        </th>
    </tr>
    </thead>
    <tbody>

    <?php  foreach ($result_us as $news):


        // $user=$usersModel->getUser($news['idusers']);
        ?>
        <tr role="row" >
            <td>
                <div>
                    <dl>
                        <dt>


                            <h2 class="card-title"><?php echo $news->title; ?></h2>



                        </dt>
                        <dt style="font-weight:normal">

                            <?php echo $news->short_description;

                            $id="body".$news->idnews;

                            ?>
                        </dt>

                        <hr style="background-color: #17a2b8">
                        <dt style="font-weight:normal">
                            <p style="display: none" id="<?php echo $id?>" >

                                <?php echo $news->description; ?>

                                <br>

                            </p>
                        </dt>

                        <dt>
                            <button class="btn btn-info "  onclick="news('<?php echo '#'.$id ?>',this)"> Opsirnije</button>
                        </dt>
                        <hr style="background-color: #17a2b8"> <dt style="font-weight:normal">
                            <?php
                            $date=date('F j, Y',strtotime($news->date));
                            echo $date;  ?> by <a class="autor" ><?php echo $news->first_name.' '.$news->last_name   ?> </a>

                            <?php if(session('is_logged')):
                                if(session('idUser')==$news->idusers || session('role')==1):
                                    ?>
                                    <a  href="../news/<?=$news->idnews?>/edit") style="margin-left: 40%"><img class="hoverNews" style="width: 35px; height: 35px; cursor: pointer" src="../../Assets/img/edit2.png"></a>
                                <?php endif;
                            endif;
                            ?>
                        </dt>
                    </dl>
                </div>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>

</table>

<?php echo  $result_us->links() ?>
