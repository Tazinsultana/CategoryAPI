<!-- Modal -->
<div class="modal fade" id="upModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action=""method="put" id="update">
        @csrf
        <input type="hidden" id="up_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product  Edit Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <div class="errMsgContainer">

                    </div> --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="up_name" name="up_name">

                    </div>
                    <div class="mb-3">
                        <label for="product_cat" class="form-label">Product Category</label>
                        <input type="text" class="form-control" id="up_product_cat" name="up_product_cat">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary product_update">Update</button>
                </div>
            </div>
        </div>
    </form>

</div>
