@extends('layout.mainview')

@section('mainview')

@if(session()->has('success'))
  <div class="alert alert-info" role="alert">
    <strong> {{ session('success') }} </strong>
  </div>
@endif

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">
      <a href="/sorting"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sort-alpha-up" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M10.082 5.629 9.664 7H8.598l1.789-5.332h1.234L13.402 7h-1.12l-.419-1.371h-1.781zm1.57-.785L11 2.687h-.047l-.652 2.157h1.351z"/>
        <path d="M12.96 14H9.028v-.691l2.579-3.72v-.054H9.098v-.867h3.785v.691l-2.567 3.72v.054h2.645V14zm-8.46-.5a.5.5 0 0 1-1 0V3.707L2.354 4.854a.5.5 0 1 1-.708-.708l2-1.999.007-.007a.498.498 0 0 1 .7.006l2 2a.5.5 0 1 1-.707.708L4.5 3.707V13.5z"/>
      </svg></a>
      Title

      </th>

      <th scope="col">Description</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

  <tbody>

  @foreach($productList as $item)
  <tr>
    <th scope="row"> {{ $item->id }}</th>
    <td> {{ $item->title }} </td>
    <td> {{ $item->description }} </td>
    <td> {{ $item->quantity }} </td>
    <td> {{ $item->price }} </td>
    <td><a href="{{ url('/product/edit/'.$item->id) }}" class="btn btn-info">Edit</a></td>
    <td><a href="{{ url('/product/delete/'.$item->id) }}" class="btn btn-danger" onClick="return confirmDialog();" >Delete</a></td>

    <script>
    function confirmDialog() {
        return confirm("Are you sure you want to delete this product?")
    }
    </script>


  </tr>

  @endforeach


  </tbody>

</table>

@endsection
