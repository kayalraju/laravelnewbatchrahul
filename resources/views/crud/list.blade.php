<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Product List</title>

    <style>
        .pagination {
            margin-bottom: 0;
        }
        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>

<div class="container mt-5">

    {{-- Flash Message --}}
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Product List</h4>
            <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">
                + Add Product
            </a>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th width="5%">#</th>
                            <th>Product Name</th>
                            <th width="10%">Price</th>
                            <th>Description</th>
                            <th width="10%">Image</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $serial = ($productdata->currentPage() - 1) * $productdata->perPage() + 1;
                        @endphp

                        @forelse ($productdata as $product)
                        <tr>
                            <td>{{ $serial++ }}</td>
                            <td>{{ $product->name }}</td>
                            <td>₹ {{ number_format($product->price, 2) }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($product->description, 50) }}</td>
                            <td>
                                <img src="{{ asset('uploads/'.$product->image) }}"
                                     height="50"
                                     width="50"
                                     class="rounded shadow-sm">
                            </td>
                            <td>
                                <a href="{{ route('product.edit',$product->id) }}"
                                   class="btn btn-sm btn-success">
                                   Edit
                                </a>

                                <a href="{{ route('product.delete',$product->id) }}"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Are you sure?')">
                                   Delete
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                No products found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination Section --}}
            <div class="row mt-3">
                <div class="col-md-6 d-flex align-items-center">
                    <small class="text-muted">
                        Showing 
                        <strong>{{ $productdata->firstItem() }}</strong>
                        to 
                        <strong>{{ $productdata->lastItem() }}</strong>
                        of 
                        <strong>{{ $productdata->total() }}</strong> entries
                    </small>
                </div>

                <div class="col-md-6">
                    <div class="d-flex justify-content-md-end justify-content-center">
                        {{ $productdata->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>