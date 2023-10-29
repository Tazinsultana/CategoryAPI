<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <title>Product Ajax Crud</title>

<body>
    <div class="container my-2">
        <div class="row">
            <h2 class="my-3">List Of Product List</h2>
            <div style="display:flex;justify-content:end">
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add</a>
            </div>

            <div class="col my-3">
                <div class="table-data">
                    <table class="table table-hover">


                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Product Category</th>

                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody ">
                         @foreach ($products as $key=> $product)
                            <tr>
                                <th scope="{{ $key + 1 }}">2</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->product_category }}</td>

                                <td>
                                    <a href=""class="btn btn-success edit_modal" data-bs-toggle="modal"
                                        data-bs-target="#updateModal" data-id="{{ $product->id }}">Edit</a>

                                    <a href="" class="btn btn-danger delete_modal" data-id="{{ $product->id }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>


    </div>
    @include('product.product_modal')
    @include('product.product_ajax')


</body>

</html>
