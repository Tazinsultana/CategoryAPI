<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action=""method="post" id="add">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- <div class="errMsgContainer">

                    </div> --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">

                    </div>
                    <div class="mb-3">
                        <label for="product_cat" class="form-label">Select Category</label>
                        <select name=" " class="form-control" id='product_category'>
                            @foreach ($categories as $key=>$category)
                            <option value="{{ $key }}">{{ $category }}</option>

                            @endforeach
                        </select>
                        {{-- <label for="product_cat" class="form-label">Product Category</label>
                        <input type="text" class="form-control" id="product_cat" name="product_cat"> --}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary product_add">Save</button>
                </div>
            </div>
        </div>
    </form>

</div>
