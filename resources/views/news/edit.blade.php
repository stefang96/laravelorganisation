@extends('welcome')

@section('header')
    @extends('header/headerTwo')
@endsection

@section('content')


@foreach($news as $new)
<div class="container">

    <br>
    <h1>Edit news: <?php echo $new->title.' , by '.$new->user->first_name.' '.$new->user->last_name ?></h1>
    <hr style="background-color: #17a2b8">
    <div class="col-md-12">
        <form class="form-horizontal"  action="../../news/<?=$new->idnews ?>" method="post">
            @csrf
            @method('put')
            <input type="text" class="form-control" name="idnews" hidden value="<?=$new->idnews ?>">
            <input type="text" class="form-control" name="idusers" hidden value="<?= $new->idusers?>">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" disabled value="<?= $new->user->first_name.' '.$new->user->last_name?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">

                    <textarea class="form-control"  rows="1" name="title"><?php echo $new->title ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Short description</label>
                <textarea class="form-control" name="short_description" rows="2" placeholder="Short description"><?php echo $new->short_description ?></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" rows="8"><?php echo $new->description?></textarea>
            </div>
            <hr style="background-color: #17a2b8">
            <div class="form-group row">
                <div   class="offset-lg-10" >
                    <button type="submit" class="btn btn-info " name="editNews" style="width: 150px; text-align: center; height: 50px">EDIT</button>
                </div>
            </div>
        </form>


    </div>
</div>
@endforeach

@endsection
