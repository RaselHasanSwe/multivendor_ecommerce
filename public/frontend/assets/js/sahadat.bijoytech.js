function addToWishlist(id) {
    let data = new FormData();
    data.append('_token', window.token);
    data.append('id', id);
    let aditionalData = {
        url:window.add_to_wishlist,
        method:'post'
    }
    let promise = window.ajaxPost(data, aditionalData);
    promise.then(function (data) {
        console.log(data);
        if(data.url)
            window.location.href = data.url;
        if(data.exist)
            toastr.info(data.exist, 'Exist!');
        if(data.success)
            toastr.success(data.success, 'Success');
    });
}

function deleteWishlist(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);
    let aditionalData = {
        url:window.delete_to_wishlist,
        method:'POST',
    }
    let promise = window.ajaxPost(data, aditionalData);
    promise.then(function (resp) {
        toastr.success(resp.success, 'Success');
        $('#delteTrId-'+id).remove();
    });
}


// $(document).ready(function () {
//     let error_data = {
//         formId     : '#addressForm',
//         rules      : {
//                         first_name: "required",
//                         email     : "required",
//                         email     : "required",
//                         phone     : "required",
//                         city      : "required",
//                         country   : "required",
//                         state     : "required",
//                         zip       : "required",
//                         address   : "required",
//                      },
//     }
//     show_error(error_data)
// });

