$(document).on('click', '.make-active-color', function(e){
    $('.color-variations img').removeClass('color-active');
    $(this).addClass('color-active');
});

function addToCart( data )
{
    data.append('_token', window.token);
    let aditionalData = {
        url:window.add_to_cart,
        method:'POST',
    }
    let promise = window.ajaxGet(data, aditionalData);
    promise.then(function (response) {
        $("#header-cart-dpd-ref").load(location.href+" #header-cart-dpd-ref>*","");
        toastr.success('Item added to cart', 'Success');
    });
}

function directCart( product_id, seller_id)
{
    var data = new FormData();
    data.append('seller_id', seller_id);
    data.append('qty', 1);
    data.append('color','');
    data.append('size','');
    data.append('product_id',product_id);
    addToCart( data );

}

$(document).on('submit',"#addToCart",function(event){
    event.preventDefault()

    let color = '';
    let size = '';

    if($('.color-variations img').hasClass('color-active'))
        color = $('.color-variations .color-active').attr('id');

    if($('.size-variations a').hasClass('active'))
        size = $('.size-variations .active').attr('id');

    let qty = $("#pro_quantity").val();
    let product_id = $('.product_id').val();
    let seller_id = $('.seller_id').val();

    var data = new FormData();
    data.append('seller_id', seller_id);
    data.append('qty', qty);
    data.append('color',color);
    data.append('size',size);
    data.append('product_id',product_id);
    addToCart( data )
});



