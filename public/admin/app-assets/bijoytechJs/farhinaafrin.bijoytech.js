window.couponTable = "couponTable";
window.contactTable = "contactTable";

(function ($) {
    $(document).ready(function () {
        $(document).on("submit", "#updateCouponForm", updateCoupon);

        // initialization();
    });
})(jQuery);

$(document).ready(function () {
    let objectCoustomers = {
        dataTableName: window.couponTable,
        url: window.get_coupons,

        type: "GET",
        columns: [
            { data: "coupon_amount" },
            { data: "coupon_type" },
            { data: "coupon_status" },
            { data: "Actions" },
        ],
        columnDefs: [
            {
                targets: [3],
                orderable: false,
            },
        ],
    };
    window.datatable(objectCoustomers);
});

function editCoupon(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.edit_coupons,
        method: "POST",
    };
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        $(".setCouponModal").html(data);
        couponUpdateValidation();
        $("#editCouponModal").modal("show");
    });
}

// Delete Coupon Form Funtion
function deleteCoupon(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.delete_coupons,
        method: "POST",
        table: window.couponTable,
    };
    window.ajaxDelete1(data, aditionalData);
}

// Update Coupon Form funtion

function updateCoupon(event) {
    event.preventDefault();
    let data = new FormData($("form#updateCouponForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.update_coupons,
        method: "post",
    };
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        $("#editCouponModal").modal("hide");
        couponTable.ajax.reload(null, false);
        toastr.success("Coupon updated successfully!", "Success");
    });
}

//validate for Cupon Items Fronte

$(document).ready(function () {
    let error_data = {
        formId: "#couponForm",
        appendClass: ".col-md-9",
        rules: {
            coupon_amount: "required",
            coupon_type: "required",
            coupon_status: "required",
        },
    };
    show_error(error_data);
});

$(document).ready(function () {
    let objectCoustomers = {
        dataTableName: window.contactTable,
        url: window.get_contacts,

        type: "GET",
        columns: [
            { data: "name" },
            { data: "email" },
            { data: "description" },
            { data: "Actions" },
        ],
        columnDefs: [
            {
                targets: [3],
                orderable: false,
            },
        ],
    };
    window.datatable(objectCoustomers);
});
function deleteContact(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.delete_contacts,
        method: "POST",
        table: window.contactTable,
    };
    window.ajaxDelete1(data, aditionalData);
}

//validate for contact Frontend

$(document).ready(function () {
    let error_data = {
        formId: "#contactForm",
        appendClass: ".form-group",
        rules: {
            name: "required",
            email: "required",
            description: "required",
        },
    };
    show_error(error_data);
});
