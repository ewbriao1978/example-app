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

    <form action ="/register" method="post">
        @csrf

    <div class="row mb-3">
            <label for="FormControlInputTitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="FormControlInputTitle" id="FormControlInputTitle" placeholder="Input title product here.">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputDescription" class="form-label">Description</label>
            <textarea  class="form-control" name="FormControlInputDescription" id="FormControlInputDescription" placeholder="Input product description."></textarea>
        </div>

        <div class="row mb-3">
            <label for="FormControlInputQuantity" class="form-label">Quantity</label>
            <input type="number" min="0" class="form-control" name="FormControlInputQuantity" id="FormControlInputQuantity" placeholder="Input product quantity.">
        </div>

        <div class="row mb-3">
            <label for="FormControlInputPrice" class="form-label">Price (U$)</label>
            <input type="text" class="form-control" name="FormControlInputPrice" id="FormControlInputPrice" placeholder="Input product price.">
        </div>


        <button type="submit" class="btn btn-primary">Register product</button>




    </form>



</div>

@endsection
