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


        function drop() {

            let category = $('#category').val();


            $.ajax({
                url: "{{ route('select.product') }}",
                method: "GET",
                data: {
                    category
                },
                success: function(res) {
                    console.log(res);
                    const products = res.data.products;
                    // console.log(products);
                    let r_res = " ";

                    $.each(products, function(key, item) {
                        r_res += `
                           <tr>


                          <th>${key+1}</th>
                                         <td>${item.name}</td>
                               <td>${item.category.title}</td>

                                               <td>
                                       <a href="" class="btn btn-success edit_product" data-bs-toggle="modal" data-bs-target="#upModal"data-id="${item.id}">Edit</a>

                                           <a href="" class="btn btn-danger delete_modal" data-id="${item.id}">Delete</a>
                                                   </td>
                         </tr>`
                    })


                    $('#table_body').html(r_res);
                }

            });


        }









        $(document).on('change', function(e) {
            e.preventDefault();
            drop();


        });


    });
</script>
