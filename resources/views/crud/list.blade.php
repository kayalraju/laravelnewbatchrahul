<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>list</title>
  </head>
  <body>
   <div class="container">

    {{-- laravel flash message show --}}
    @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
    @endif



    <h1>List All Product</h1>
    <a href="{{ route('product.create') }}" class="btn btn-info">Add Student</a>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @foreach ($productdata as $product) 
  <tbody>
    <tr>
      <th scope="row">{{ $product->id }}</th>
      <td>{{ $product->name }}  </td>
      <td>{{ $product->price }}</td>
      <td>{{ $product->description }}</td>
      <td><a href="{{ route('product.edit',$product->id) }}" class="btn btn-success">Update</a></td>
      <td><a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger">Delete</a></td>
    </tr>
    
  </tbody>
  @endforeach
</table>
   </div>


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    
  </body>
</html>