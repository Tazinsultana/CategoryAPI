<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">


    <title>Category List</title>
</head>

<body>
    <div class="container">

        <div class="row">

            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <h1 class="my-4"> Category List</h1>
                <div style="display:flex;justify-content:end">
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addmodal">Add</a>

                </div><br>

                <a href="{{route('index.product')  }}" class="btn btn-secondary">Product</a>
                {{-- <div style="display:flex;justify-content:end>
                    <a href="{{ route('droup.product') }}" class="btn btn-primary">Next</a><br>
                </div> --}}

                <div class="table-data">

                    <table class="table my-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Is Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($category as $key => $categories)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $categories->title }}</td>

                                    <td>

                                        @if ($categories->is_active)
                                            <span class="badge text-bg-success">Active</span>
                                        @else
                                            <span class="badge text-bg-danger">InActive</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-warning upate_modal_form"
                                            data-bs-toggle="modal" data-bs-target="#updatemodal"
                                            data-id="{{ $categories->id }}">

                                            Edit
                                        </a>


                                        <a href="#" class="btn btn-danger delete_modal"
                                            data-id="{{ $categories->id }}">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>


                </div>
                </table>



            </div>
        </div>
    </div>
    {!! Toastr::message() !!}
    @include('Category.add_modal')
    @include('Category.update_modal')
    @include('Category.ajax')




</body>

</html>
