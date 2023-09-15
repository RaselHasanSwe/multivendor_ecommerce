window.customers = 'customers';
window.sliders = 'sliders';

var colorTable;
$(document).ready(function () {
    colorTable = $('.colorTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "stateSave": true,
        "order": [[0, "desc"]],
        "ajax": {
            "url": window.get_colors,
            "dataType": "json",
            "type": "GET",
            "data": { _token: window.token }
        },
        "columns": [
            { "data": "name" },
            { "data": "Action" }
        ],
        "columnDefs": [
            {
                "targets": [1],
                "orderable": false,
            },
        ],

    });
});

var sizeTable;
$(document).ready(function () {
    sizeTable = $('.sizeTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ordering": true,
        "stateSave": true,
        "order": [[0, "desc"]],
        "ajax": {
            "url": window.get_size,
            "dataType": "json",
            "type": "GET",
            "data": { _token: window.token }
        },

        "columns": [
            { "data": "name" },
            { "data": "Actions" }
        ],
        "columnDefs": [
            {
                "targets": [1],
                "orderable": false,
            },
        ],

    });
})

var faqTable;
$(document).ready(function () {
    faqTable = $(".faqTable").DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        stateSave: true,
        order: [[0, "desc"]],
        ajax: {
            url: window.get_faq,
            dataType: "json",
            type: "GET",
            data: { _token: window.token },
        },

        columns: [
            { data: "title" },
            { data: "description" },
            { data: "Actions" },
        ],
        columnDefs: [
            {
                targets: [2],
                orderable: false,
            },
        ],
    });
})


var activeVendor;
$(document).ready(function () {
    activeVendor = $(".activeVendor").DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        stateSave: true,
        order: [[0, "desc"]],
        ajax: {
            url: window.vendors,
            dataType: "json",
            type: "GET",
            data: { _token: window.token },
        },

        columns: [
            { data: "name" },
            { data: "store_name" },
            { data: "email" },
            { data: "phone" },
            { data: "Status" },
            { data: "Actions" },
        ],
        columnDefs: [
            {
                targets: [4],
                orderable: false,
            },
        ],
    });
})

var deactiveVendor;
$(document).ready(function () {
    deactiveVendor = $(".deactiveVendor").DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        stateSave: true,
        order: [[0, "desc"]],
        ajax: {
            url: window.get_deactive_vendor,
            dataType: "json",
            type: "GET",
            data: { _token: window.token },
        },

        columns: [
            { data: "name" },
            { data: "store_name" },
            { data: "email" },
            { data: "phone" },
            { data: "Status" },
            { data: "Actions" },
        ],
        columnDefs: [
            {
                targets: [4],
                orderable: false,
            },
        ],
    });
})


$(document).ready(function () {
    let objectCoustomers = {
        "dataTableName": window.customers,
        "url": window.get_customers,
        "type": "GET",
        "columns": [
            { data: "name" },
            { data: "phone" },
            { data: "email" },
            { data: "mobile" },
            { data: "city" },
            { data: "state_id" },
            { data: "zip_code" },
            { data: "address" },
            { data: "country_id" }
        ],
        "columnDefs": [
            {
                targets: [8],
                orderable: false,
            },
        ],
    }
    window.datatable(objectCoustomers);

})


$(document).ready(function () {
    let objectSlider = {
        "dataTableName": window.sliders,
        "url": window.get_sliders,
        "type": "GET",
        "columns": [
            { data: "title" },
            { data: "description" },
            { data: "button_name" },
            { data: "url" },
            { data: "file" },
            { data: "show_button" },
            { data: "Status" },
            { data: "Actions" }
        ],
        "columnDefs": [
            {
                targets: [7],
                orderable: false,
            },
        ],
    }

    window.datatable(objectSlider);

});


function deleteColor(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url: window.delete_color,
        method: 'POST',
        table: colorTable,
    }
    window.ajaxDelete1(data, aditionalData);
}


function editColor(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.edit_color,
        method: 'post'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $('.setColorModal').html(data);
        colorEditValidation();
        $('#editColorModal').modal('show');

    });
}

$(document).on("submit", "#updateColorForm", function (event) {
    event.preventDefault();
    let data = new FormData($("form#updateColorForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.update_color,
        method: "post",
    };
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $("#editColorModal").modal("hide");
        colorTable.ajax.reload(null, false);
        toastr.success("Updated!", "Success");
    });
});


function editSize(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.edit_size,
        method: "post",
    };

    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $(".setSizeModal").html(data);
        sizeEditValidation();
        $("#editSizeModal").modal("show");
    });
}

function deleteSize(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);

    let aditionalData = {
        url: window.delete_size,
        method: "POST",
        table: sizeTable,
    };
    window.ajaxDelete1(data, aditionalData);
}

$(document).on("submit", "#updateSizeForm", function (event) {
    event.preventDefault();
    let data = new FormData($("form#updateSizeForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.update_size,
        method: "post",
    };
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $("#editSizeModal").modal("hide");
        sizeTable.ajax.reload(null, false);
        toastr.success("Updated!", "Success");
    });
});


function editFaq(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.edit_faq,
        method: "post",
    };
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $(".setFaqModal").html(data);
        $("#editFaqModal").modal("show");
        if ($(".summernote").length > 0) {
            $(".summernote").summernote({ height: 150 });
        }
    });
}

function deleteFaq(id) {
    let data = new FormData();
    data.append("id", id);
    data.append("_token", window.token);

    let aditionalData = {
        url: window.delete_faq,
        method: "POST",
        table: faqTable,
    };
    window.ajaxDelete1(data, aditionalData);
}

$(document).on("submit", "#updateFaqForm", function (event) {
    event.preventDefault();
    let data = new FormData($("form#updateFaqForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.update_faq,
        method: "post",
    };
    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $("#editFaqModal").modal("hide");
        faqTable.ajax.reload(null, false);
        toastr.success("Updated!", "Success");
    });
});



function vendorStatus(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url: window.vendor_status,
        method: 'post',
        table: deactiveVendor,
        output: 'set-vendor-data',
    }

    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data.status);
        (data.status == 0) ? activeVendor.ajax.reload(null, false) : deactiveVendor.ajax.reload(null, false);
        toastr.success("Status Updated!", "Success");
    });


}

function viewActiveVendor(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.view_deactive_vendor,
        method: 'post'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $('.setColorModal').html(data);
        $('#editColorModal').modal('show');

    });
}


function deleteSlider(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url: window.delete_slider,
        method: 'POST',
        table: window.sliders,
    }
    window.ajaxDelete1(data, aditionalData);
}


function editSlider(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url: window.edit_slider,
        method: 'post'
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $('.setSliderModal').html(data);
        $('#editSliderModal').modal('show');

    });
}


$(document).on("submit", "#updateSliderForm", function (event) {
    event.preventDefault();
    let data = new FormData($("form#updateSliderForm")[0]);
    data.append("_token", window.token);
    let aditionalData = {
        url: window.update_slider,
        method: "post",
    };

    let promise = window.ajaxUpdate(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        $("#editSliderModal").modal("hide");
        window.sliders.ajax.reload(null, false);
        toastr.success("Updated!", "Success");
    });
});



