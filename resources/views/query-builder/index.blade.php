<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello</title>
    
  </head>
  <body>
    
    <div class="container">
        <h1>List of All Blogs</h1>

        <a href="{{ route('query.create') }}" class="btn btn-info">Add Blog</a>

        {{-- Search Form --}}
    <form action="{{ route('query-builder.search') }}" method="GET" class="mb-3">
        <input type="text" name="search" value="{{ request('search') }}" 
               placeholder="Search products..." class="form-control"
               style="max-width: 300px;">
    </form>

        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">content</th>
    </tr>
  </thead>

  @php
    $index=1
  @endphp
  @foreach ($posts as $post)
      
 
  <tbody>
    <tr>
      <th scope="row">{{ $index ++ }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->content }}</td>
      <td><a href="{{ route('query-builder.edit',$post->id) }}">Edit</a></td>
      <td>
         <form action="{{ route('query-builder.delete',$post->id )}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
      </td>
    </tr>
   
  </tbody>
  @endforeach
</table>

    </div>
    {{-- pagination --}}

        {{ $posts->links() }}
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

   
  </body>
</html>