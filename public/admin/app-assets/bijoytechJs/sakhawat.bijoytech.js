var productTable;
var activeProductTable;
var requestedProductTable;
var rejectedProductTable;

// Select2 
$(".sr-multi-select2").select2({
    tags: true,
    placeholder: 'Select'
});
// Select2 
$(".sr-single-select2").select2({
    tags: false,
    placeholder: 'Select'
});
// Add Dynamic Form For Additional Image
$(document).on('click', '.add-images.dynamic-add-new', function(){
    let cloneMainColor = $('.color-selection').first().clone();
    $('.dynamic-form-items-wrapper.add-images').append(`<div class="row m-0 align-items-end mb-2 dynamic-form-item">
                    <div class="col-6 pl-0 pr-1">
                        <label class="label-control">Upload image</label>
                        <div class="mx-auto">
                            <input required type="file" accept="image/*" class="form-control" name="add_image[]">
                        </div>
                    </div>
                    <div class="col pl-0 pr-1">
                        <label class="label-control">Select color for image</label>

                        <div class="mx-auto select-color-for-image">
                        </div>
                    </div>
                    <div class="dynamic-remove-new btn btn-danger">Remove</div>
                </div>`);
    let appendedEle = $('.dynamic-form-items-wrapper.add-images').find('.dynamic-form-item').last();
    cloneMainColor.appendTo(appendedEle.find('.select-color-for-image'));


    let appendedSelect = appendedEle.find('select');
    appendedSelect.removeClass('sr-multi-select2');
    appendedSelect.prepend(`<option value="0" selected>None</option>`);
    appendedSelect.addClass('sr-single-select2');
    appendedSelect.removeAttr('data-select2-id');
    appendedSelect.removeAttr('multiple');
    appendedSelect.attr("name", "add_color[]");
    appendedSelect.select2({
        tags: false,
        placeholder: 'Select'
    });
});

// Add Dynamic Form For Additional Image
$(document).on('click', '.size-charts.dynamic-add-new', function(){
    $('.dynamic-form-items-wrapper.size-charts').append(`<div class="row m-0 align-items-end mb-2 dynamic-form-item">
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_1[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_2[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_3[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_4[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_5[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_6[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_7[]" value="0">
                </div>
            </div>
            <div class="col pr-1 pl-0">
                <div class="mx-auto">
                    <input required type="text" class="form-control" name="col_8[]" value="0">
                </div>
            </div>
            <div class="dynamic-remove-new btn btn-danger">Remove</div>
        </div>`)
});

// Remove For All Dynamic Form
$(document).on('click', '.dynamic-remove-new', function(){
    $(this).closest('.dynamic-form-item').remove();
});

// Get All Products
$(document).ready(function(){
    // Product Listing
    productTable = $('.productTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering":true,
        "stateSave": true,
        "order": [[ 0, "desc" ]],
        "ajax":{
                "url": window.get_products,
                "dataType": "json",
                "type": "GET",
                "data":{ _token: window.token }
        },
        "columns": [
            { "data": "cover_image" },
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "inner_category_id" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "stock" },
            { "data": "is_hidden" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[1],
                "orderable":false,
            },
        ],
    });
});

// Get Active Products
$(document).ready(function(){
    // Product Listing
    activeProductTable = $('.activeProductTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering":true,
        "stateSave": true,
        "order": [[ 0, "desc" ]],
        "ajax":{
                "url": window.get_active_products,
                "dataType": "json",
                "type": "GET",
                "data":{ _token: window.token }
        },
        "columns": [
            { "data": "cover_image" },
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "inner_category_id" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "stock" },
            { "data": "is_hidden" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[1],
                "orderable":false,
            },
        ],
    });
});

// Get Requested Products
$(document).ready(function(){
    // Product Listing
    requestedProductTable = $('.requestedProductTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering":true,
        "stateSave": true,
        "order": [[ 0, "desc" ]],
        "ajax":{
                "url": window.get_requested_products,
                "dataType": "json",
                "type": "GET",
                "data":{ _token: window.token }
        },
        "columns": [
            { "data": "cover_image" },
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "inner_category_id" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "stock" },
            { "data": "is_hidden" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[1],
                "orderable":false,
            },
        ],
    });
});

// Get Rejected Products
$(document).ready(function(){
    // Product Listing
    rejectedProductTable = $('.rejectedProductTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering":true,
        "stateSave": true,
        "order": [[ 0, "desc" ]],
        "ajax":{
                "url": window.get_rejected_products,
                "dataType": "json",
                "type": "GET",
                "data":{ _token: window.token }
        },
        "columns": [
            { "data": "cover_image" },
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "inner_category_id" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "stock" },
            { "data": "is_hidden" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[1],
                "orderable":false,
            },
        ],
    });
});

// Get Hidden Products
$(document).ready(function(){
    // Product Listing
    rejectedProductTable = $('.hiddenProductTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering":true,
        "stateSave": true,
        "order": [[ 0, "desc" ]],
        "ajax":{
                "url": window.get_hidden_products,
                "dataType": "json",
                "type": "GET",
                "data":{ _token: window.token }
        },
        "columns": [
            { "data": "cover_image" },
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "inner_category_id" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "stock" },
            { "data": "is_hidden" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[1],
                "orderable":false,
            },
        ],
    });
});

// Create Product
$('#productCreateForm').submit(function(e){
    e.preventDefault();
    var formData = new FormData( this );
    $.ajax({
        type: 'post',
        url: window.create_product,
        data: formData,
        cache : false,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            if(response.success == 1){
                toastr.success('Success!', response.message);
            }
            if(response.success == 0){
                toastr.success('Opps!', response.message);
            }
            setTimeout(function(){
                location.reload();
            },1000);
            
        },
        error: function (jqXHR, exception) {

        },
    });
});

// Update Product
$('#productUpdateForm').submit(function(e){
    e.preventDefault();
    var formData = new FormData( this );
    $.ajax({
        type: 'post',
        url: window.update_product,
        data: formData,
        cache : false,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            if(response.success == 1){
                toastr.success('Success!', response.message);
            }
            if(response.success == 0){
                toastr.success('Opps!', response.message);
            }
            setTimeout(function(){
                location.reload();
            },1000);
            
        },
        error: function (jqXHR, exception) {

        },
    });
});

// Delete Product
function deleteProduct( id )
{
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url:window.delete_product,
        method:'POST',
        table:productTable,
    }
    window.ajaxDelete1(data, aditionalData);
}