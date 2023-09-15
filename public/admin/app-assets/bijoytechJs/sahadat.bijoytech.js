window.categoryTable        = 'categoryTable';
window.subCategoryTable     = 'subCategoryTable';
window.innerCategoryTable   = 'innerCategoryTable';
window.orderTable           = 'orderTable';

(function ($) {
	$(document).ready(function () {
        initialization();

		$(document).on('submit', '#updateCategoryForm', updateCategory);
		$(document).on('submit', '#updateSubCategoryForm', updateSubCategory);
        $(document).on('submit', '#updateInnerCategoryForm', updateInnerCategory);
        $(document).on('change','#category',getSubcategoryByCategory);
        $(document).on('change','#category',getSubcategoryByCategory);
	});
})(jQuery)

function initialization(){
    loadCategory();
    loadSubCategory();
    loadInnerCategory();
    loadOrders();
    categoryCreateValidation();
    subCategoryCreateValidation();
    innerCategoryCreateValidation();
    colorCreateValidation();
    sizeCreateValidation();
    aboutUsCreateValidation();
    contactUsCreateValidation();
    faqCreateValidation();
    productCreateValidation();
    productUpdateValidation();
    couponUpdateValidation();
    shippingCreateValidation();
    shippingPriceBetweensValidation();
    groceryShippingCreateValidation();
    vendorValidation();
}

let categoryRules  = {
    name    : "required",
    position: "required",
    icon    : "required",
}

function categoryCreateValidation(){
    let error_data = {
        formId     : '#categoryForm',
        appendClass: '.col-md-9',
        rules      :  categoryRules,
    }
    show_error(error_data)
}

function categoryEditValidatation() {
    let error_data = {
        formId     : '#updateCategoryForm',
        rules      :  categoryRules,
    }
    show_error(error_data)
}

let subCategoryRules  = {
    name       : "required",
    category_id: "required",
}

function subCategoryCreateValidation() {
    let error_data = {
        formId     : '#subCategoryForm',
        appendClass: '.col-md-9',
        rules      :  subCategoryRules,
    }
    show_error(error_data)
}
function subCategoryeditValidation() {
    let error_data = {
        formId     : '#updateSubCategoryForm',
        rules      :  subCategoryRules,
    }
    show_error(error_data)
}

function loadSubCategory() {
    let objectSubCategory = {
        "dataTableName":window.subCategoryTable,
        "url": window.get_sub_category,
        "type": "GET",
        "columns": [
            { "data": "category_id" },
            { "data": "name" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[2],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectSubCategory);
}

function loadCategory() {
    let objectCategory = {
        "dataTableName":window.categoryTable,
        "url": window.get_category,
        "type": "GET",
        "columns":[
            { "data": "name" },
            { "data": "position" },
            { "data": "icon" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[3],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectCategory);
}

const innerCategoryRules = {
    name           : "required",
    category_id    : "required",
    sub_category_id: "required"
}

function innerCategoryCreateValidation() {
    let error_data = {
        formId     : '#innerCategoryForm',
        appendClass: '.col-md-9',
        rules      :  innerCategoryRules,
    }
    show_error(error_data)
}

function innerCategoryeditValidation() {
    let error_data = {
        formId     : '#updateInnerCategoryForm',
        rules      :  innerCategoryRules,
    }
    show_error(error_data)
}

function loadInnerCategory() {
    let objectInnerCategory = {
        "dataTableName":window.innerCategoryTable,
        "url": window.get_inner_category,
        "type": "GET",
        "columns": [
            { "data": "category_id" },
            { "data": "sub_category_id" },
            { "data": "name" },
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[3],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectInnerCategory);
}

function editCategory( id ) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.edit_category,
        method:'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('.setCategroyModal').html(data);
        swithcer();
        categoryEditValidatation();
        $('#editCategoryModal').modal('show');
    });
}

function deleteCategory( id ) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.delete_category,
        method:'POST',
        table:window.categoryTable,
    }
    window.ajaxDelete1(data, aditionalData);
}

function editSubCategory( id ) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.edit_sub_category,
        method:'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('.setSubCategroyModal').html(data);
        swithcer();
        subCategoryeditValidation();
        $('#editSubCategoryModal').modal('show');

    });
}

function deleteSubCategory( id ) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url:window.delete_sub_category,
        method:'POST',
        table:subCategoryTable,
    }
    window.ajaxDelete1(data, aditionalData);
}

function deleteInnerCategory( id )
{
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url:window.delete_inner_category,
        method:'POST',
        table:innerCategoryTable,
    }
    window.ajaxDelete1(data, aditionalData);
}

function editInnerCategory( id )
{
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.edit_inner_category,
        method:'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('.setInnerCategroyModal').html(data);
        innerCategoryeditValidation();
        $('#editInnerCategoryModal').modal('show');

    });
}

function updateInnerCategory(event){
    event.preventDefault();
    let data = new FormData( $( 'form#updateInnerCategoryForm' )[ 0 ] );
    data.append('_token', window.token);
    let aditionalData = {
        url:window.update_inner_category,
        method:'post'
    }
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $('#editInnerCategoryModal').modal('hide');
        innerCategoryTable.ajax.reload( null, false );
        toastr.success('Inner category updated successfully!', 'Success');
    });
}

function updateCategory(event){
    event.preventDefault();
    let data = new FormData( $( 'form#updateCategoryForm' )[ 0 ] );
    data.append('_token', window.token);
    let aditionalData = {
        url:window.update_category,
        method:'post'
    }
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        $('#editCategoryModal').modal('hide');
        categoryTable.ajax.reload( null, false );
        toastr.success('Category updated successfully!', 'Success');
    });
}

function updateSubCategory(event){
    event.preventDefault();
    let data = new FormData( $( 'form#updateSubCategoryForm' )[ 0 ] );
    data.append('_token', window.token);
    let aditionalData = {
        url:window.update_sub_category,
        method:'post'
    }
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        $('#editSubCategoryModal').modal('hide');
        subCategoryTable.ajax.reload( null, false );
        toastr.success('Subcategory updated successfully!', 'Success');
    });
}

function getSubcategoryByCategory(){
    let id = $('#category').val();
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.sub_category_by_id,
        method:'POST'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $('#sub-category').html(data);
        console.log(data);

    });
}

function colorCreateValidation() {
    let error_data = {
        formId     : '#colorForm',
        appendClass: '.col-md-9',
        rules      :  {
            name:"required"
        },
    }
    show_error(error_data)
}

function colorEditValidation() {
    let error_data = {
        formId     : '#updateColorForm',
        rules      :  {
            name:"required"
        },
    }
    show_error(error_data)
}
function sizeCreateValidation() {
    let error_data = {
        formId     : '#sizeForm',
        appendClass: '.col-md-9',
        rules      :  {
            name:"required"
        },
    }
    show_error(error_data)
}

function sizeEditValidation() {
    let error_data = {
        formId     : '#updateSizeForm',
        rules      :  {
            name:"required"
        },
    }
    show_error(error_data)
}

function aboutUsCreateValidation(){
    let error_data = {
        formId     : '#aboutUsForm',
        appendClass: '.col-md-9',
        rules      :  {
            title      : "required",
            description: "required",
        },
    }
    show_error(error_data)
}

function contactUsCreateValidation(){
    let error_data = {
        formId     : '#contactInfoForm',
        appendClass: '.col-md-9',
        rules      :  {
            address      : "required",
            phone: "required",
            email: "required",
        },
    }
    show_error(error_data)
}

function faqCreateValidation(){
    let error_data = {
        formId     : '#faqForm',
        appendClass: '.col-md-9',
        rules      :  {
            title: "required",
        },
    }
    show_error(error_data)
}

const productRules  = {
    product_name     : "required",
    price            : "required",
    stock            : "required",
    category         : "required",
    short_description: "required",
}

function productCreateValidation() {
    let error_data = {
        formId     : '#productCreateForm',
        rules      : productRules,
    }
    show_error(error_data)
}

function productUpdateValidation() {
    let error_data = {
        formId     : '#productUpdateForm',
        rules      : productRules,
    }
    show_error(error_data)
}

function couponUpdateValidation(){
    let error_data = {
        formId     : '#updateCouponForm',
        rules      : {
                    coupon_amount: "required",
                    coupon_type  : "required",
                    coupon_status: "required",
                },
    }
    show_error(error_data)
}

function shippingCreateValidation(){
    let error_data = {
        formId     : '#freeShippingForm',
        appendClass: '.col-md-9',
        rules      : {
                    amount       : "required",
                    shipping_name: "required",
                    delivery_time: "required",
                    zip_code     : "required",
                },
    }
    show_error(error_data)
}

function shippingPriceBetweensValidation(){
    let error_data = {
        formId     : '#shippingPriceBetween',
        appendClass: '.col-md-9',
        rules      : {
                        amount_lte_10: "required",
                        amount_lte_20: "required",
                        amount_lte_30: "required",
                        amount_lte_40: "required",
                        amount_lte_50: "required",
                },
    }
    show_error(error_data)
}

function groceryShippingCreateValidation(){
    let error_data = {
        formId     : '#groceryShipping',
        appendClass: '.col-md-9',
        rules      : {
                        zipcodes: "required",
                     },
    }
    show_error(error_data)
}

function vendorValidation(){
    let error_data = {
        formId     : '#vendorProfileForm',
        appendClass: '.col-md-9',
        rules      : {
                        username  : "required",
                        name      : "required",
                        email     : "required",
                        store_name: "required",
                        phone     : "required",
                        mobile    : "required",
                        country_id: "required",
                        state_id  : "required",
                        city      : "required",
                        zip_code  : "required",
                        address   : "required",
                     },
    }
    show_error(error_data)
}

function swithcer() {
     // Switchery
     var i = 0;
     if (Array.prototype.forEach) {
 
         var elems = $('.switchery');
         $.each(elems, function (key, value) {
             var $size = "",
                 $color = "",
                 $sizeClass = "",
                 $colorCode = "";
             $size = $(this).data('size');
             var $sizes = {
                 'lg': "large",
                 'sm': "small",
                 'xs': "xsmall"
             };
             if ($(this).data('size') !== undefined) {
                 $sizeClass = "switchery switchery-" + $sizes[$size];
             } else {
                 $sizeClass = "switchery";
             }
 
             $color = $(this).data('color');
             var $colors = {
                 'primary': "#967ADC",
                 'success': "#37BC9B",
                 'danger': "#DA4453",
                 'warning': "#F6BB42",
                 'info': "#3BAFDA"
             };
             if ($color !== undefined) {
                 $colorCode = $colors[$color];
             } else {
                 $colorCode = "#37BC9B";
             }
 
             var switchery = new Switchery($(this)[0], {
                 className: $sizeClass,
                 color: $colorCode
             });
         });
     } else {
         var elems1 = document.querySelectorAll('.switchery');
 
         for (i = 0; i < elems1.length; i++) {
             var $size = elems1[i].data('size');
             var $color = elems1[i].data('color');
             var switchery = new Switchery(elems1[i], {
                 color: '#37BC9B'
             });
         }
     }
     /*  Toggle Ends   */
}

function loadOrders () {
    let objectOrder = {
        "dataTableName":window.orderTable,
        "url": window.get_order,
        "type": "GET",
        "columns":[
            { "data": "order_id"},
            { "data": "payment_id"},
            { "data": "user_id"},
            { "data": "created_at"},
            { "data": "seller_id"},
            { "data": "total"},
            { "data": "shipping_method"},
            { "data": "Action" }
        ],
        "columnDefs":[
            {
                "targets":[7],
                "orderable":false,
            },
        ],
    }
    window.datatable(objectOrder);
}