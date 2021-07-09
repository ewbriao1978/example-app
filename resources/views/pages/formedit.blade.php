@extends('layout.mainview')
@section('mainview')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class='col-4 mx-4'>

    <form action ="{{ url('product/edit/'.$id) }}" method="post">
        @csrf

    <div class="row mb-3">
            <label for="FormControlInputTitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="FormControlInputTitle" id="FormControlInputTitle" value="<?=$title?>" placeholder="<?=$title?>">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputDescription" class="form-label">Description</label>
            <textarea  class="form-control" name="FormControlInputDescription" id="FormControlInputDescription" placeholder="<?=$description?>"><?=$description?></textarea>
        </div>

        <div class="row mb-3">
            <label for="FormControlInputQuantity" class="form-label">Quantity</label>
            <input type="number" min="0" class="form-control" name="FormControlInputQuantity" id="FormControlInputQuantity" value="<?=$quantity?>" placeholder="<?=$quantity?>">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputPrice" class="form-label">Price (U$)</label>
            <input type="text" class="form-control" name="FormControlInputPrice" id="FormControlInputPrice" value="<?=$price?>" placeholder="<?=$price?>">
        </div>


        <button type="submit" class="btn btn-primary">Update product</button>


    </form>

</div>

@endsection
