<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function() {

        //    alert();
        // Create
        $(document).on('click', '.product_add', function(e) {
            e.preventDefault();
            let name = $('#name').val();
            let category_id = $('#product_category').val();
            // let product_category = $('#product_cat').val();

            // console.log(name,product_cat);

            $.ajax({

                url: "{{ route('add.product') }}",
                method: "POST",
                data: {
                    name,
                    category_id,
                    // _token:'{{ csrf_token() }}',
                    // product_category

                },
                success: function(res) {
                    // console.log(res);
                    if (res.status == 'success') {
                        $('#addModal').modal('hide');
                        $('#add')[0].reset();
                        $('.table').load(location.href + ' .table');

                        Command: toastr["success"](" Product Added Successfully!",
                            "Success")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }




                    }

                }


            })

        });


        // for edit
        $(document).on('click', '.edit_product', function(e) {

            e.preventDefault();
            let id = $(this).data('id');
            console.log(id);

            $.ajax({

                url: "{{ route('edit.product') }}",
                method: "GET",
                data: {
                    id
                },
                success: function(res) {
                    console.log(res);
                    $('#up_id').val(res.data.id);
                    $('#up_name').val(res.data.name);
                    // $('#up_product_cat').val(res.data.product_category);
                    $('#up_product_category').val(res.data.category_id);



                }


            })
        });

        // for update
        $(document).on('click', '.product_update', function(e) {

            e.preventDefault();
            let id = $('#up_id').val();
            let name = $('#up_name').val();
            let category_id = $('#up_product_category').val();
            $.ajax({
                url: "{{ route('update.product') }}",
                method: "PUT",
                data: {
                    id,
                    name,
                    category_id

                },
                success: function(res) {
                    if (res.status == 'success') {
                        $('#upModal').modal('hide');
                        $('#update')[0].reset();
                        $('.table').load(location.href + ' .table');

                        Command: toastr["success"]("Product Updated Successfully!",
                            "Success")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }

                    }
                }




            });


        })

        // for Delete
        $(document).on('click', '.delete_modal', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            if (confirm('Are you sure to delte list??')) {

                $.ajax({

                    url: "{{ route('delete.product') }}",
                    method: "DELETE",
                    data: {
                        id
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.table').load(location.href + ' .table');

                        }

                        Command: toastr["success"]("Product Deleted Successfully!",
                            "Success")

                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "1000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }

                });
            }
        })

        // for Filtering

        // function filtering() {

        //     let filtering = $('#filter').val();
        //     let category=$('#category').val();
        //     console.log(filtering);

        //     $.ajax({
        //         url: "{{ route('filter.product') }}",
        //         method: "GET",
        //         data: {
        //             filtering,
        //             category
        //         },
        //         success: function(res) {
        //             console.log(res);
        //             const search = res.data;

        //             console.log(search);
        //             let r_search = '';
        //             $.each(search, function(key, item) {
        //                 r_search += `<tr>
        //                 <th >${key+1}</th>
        //                 <td>${item.name}</td>
        //                 <td>${item.category.title}</td>

        //                 <td>
        //                     <a href=""class="btn btn-success edit_product" data-bs-toggle="modal"
        //                         data-bs-target="#upModal" data-id="${item.id}">Edit</a>

        //                     <a href="" class="btn btn-danger delete_modal" data-id="${item.id}">Delete</a>
        //                 </td>
        //             </tr>`


        //             })

        //             $('#table_body').html(r_search);

        //         }

        //     })
        // }

        // $(document).on('keyup','#filter',function(e) {
        //     e.preventDefault();
        //     filtering();



        // });

        // $(document).on('change','#category',function(e) {
        //     e.preventDefault();
        //     filtering();



        // });



        // for checkbox.....filtering

        function filtering() {

            let filtering = $('#filter').val();

            let categoriesObj = $('input[name="checkbox[]"]');
            let category = [];

            $.each(categoriesObj, function(key, item) {
                // console.log(item);
                if ($(item).is(':checked')) {
                    const category_id = $(item).val();
                    // console.log(category_id);

                    category.push(category_id);
                }
                // console.log(category_id);
            })
            // console.log(category);

            $.ajax({
                url: "{{ route('filter.product') }}",
                method: "GET",
                data: {
                    filtering,
                    category
                },
                success: function(res) {
                    console.log(res);
                    const search = res.data;

                    console.log(search);
                    let r_search = '';
                    $.each(search, function(key, item) {
                        r_search += `<tr>
                                <th >${key+1}</th>
                                <td>${item.name}</td>
                                <td>${item.category.title}</td>

                                <td>
                                    <a href=""class="btn btn-success edit_product" data-bs-toggle="modal"
                                        data-bs-target="#upModal" data-id="${item.id}">Edit</a>

                                    <a href="" class="btn btn-danger delete_modal" data-id="${item.id}">Delete</a>
                                </td>
                            </tr>`


                    })

                    $('#table_body').html(r_search);

                }

            })
        }

        $(document).on('keyup', '#filter', function(e) {
            e.preventDefault();
            filtering();



        });


        $(document).on('change', 'input[name="checkbox[]"]', function(e) {
            e.preventDefault();
            filtering();


        });




    });
</script>
