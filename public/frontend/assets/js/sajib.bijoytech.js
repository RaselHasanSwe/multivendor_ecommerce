window.cart_table = 'cartTable';

function deleteCartItem(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('_token', window.token);

    let aditionalData = {
        url: window.delete_cart_item,
        method: 'POST',
    }

    let promise = window.ajaxPost(data, aditionalData);
    promise.then(function (response) {
        toastr.success('Deleted!', 'Success');
        $("#header-cart-dpd-ref").load(location.href + " #header-cart-dpd-ref>*", "");
        $("#all-cart-refresh").load(location.href + " #all-cart-refresh>*", "");
    });
}



function emptyCart() {
    let data = new FormData();
    data.append('_token', window.token);

    let aditionalData = {
        url: window.destroy_cart,
        method: 'POST',
        table: window.cart_table,
    }

    let promise = window.ajaxPost(data, aditionalData);
    promise.then(function (response) {
        toastr.success('Cart Clear!', 'Success');
        $("#header-cart-dpd-ref").load(location.href + " #header-cart-dpd-ref>*", "");
        $("#all-cart-refresh").load(location.href + " #all-cart-refresh>*", "");
    });
}


function changeQty(rowID, qty) {
    let data = new FormData();
    data.append('_token', window.token);
    data.append('quantity', qty);
    data.append('rowID', rowID);

    let aditionalData = {
        url: window.update_cart,
        method: 'POST',
    }

    let promise = window.ajaxPost(data, aditionalData);
    promise.then(function (response) {
        toastr.success('Updated quentity!', 'Success');
        $("#header-cart-dpd-ref").load(location.href + " #header-cart-dpd-ref>*", "");
        $("#all-cart-refresh").load(location.href + " #all-cart-refresh>*", "");
    });

}


function applyPromocode(promoCode) {
    alert(promoCode);
    let data = new FormData();
    data.append('_token', window.token);
    data.append('quantity', qty);
    data.append('rowID', rowID);

    let aditionalData = {
        url: window.update_cart,
        method: 'POST',
    }

    let promise = window.ajaxPost(data, aditionalData);
    promise.then(function (response) {
        toastr.success('Updated quentity!', 'Success');
        $("#header-cart-dpd-ref").load(location.href + " #header-cart-dpd-ref>*", "");
        $("#all-cart-refresh").load(location.href + " #all-cart-refresh>*", "");
    });

}
