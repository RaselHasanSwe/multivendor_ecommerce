
// sorting Status
getSortStatus();
$('#sortBy').change(function(){

    getSortStatus();

});
function getSortStatus(){
    var sortBy = $('#sortBy').val();
    if ($('#sort_by')) {
        $('#sort_by').remove();
    }
    var input  = "<input type='hidden'"+" value='"+sortBy +"' name='sort_by' id='sort_by'>";
    $('#sortingForm').append(input);
}

// checked color
$(document).on('click','.color-status',function(e){
        let colorId = $(this).attr('id');
        if ( $(this).hasClass('active')) {
            var input  = "<input id='color-"+colorId +"' type='hidden'"+" value='"+colorId +"' name='color_id[]'>";
            $('#sortingForm').append(input);
        }else{
            $('#color-'+colorId).remove();
        }
});

// checked size
$(document).on('click','.size-status',function(e){
    let sizeId = $(this).attr('id');
    if ( $(this).hasClass('active')) {
        var input  = "<input id='size-"+sizeId +"' type='hidden'"+" value='"+sizeId +"' name='size_id[]'>";
        $('#sortingForm').append(input);
    }else{
        $('#size-'+sizeId).remove();
    }
});

// get category and search key

$(document).on('click','.btn-search',function(e){
    let sizeId = $(this).attr('id');
    if ( $(this).hasClass('active')) {
        var input  = "<input id='size-"+sizeId +"' type='hidden'"+" value='"+sizeId +"' name='size_id[]'>";
        $('#sortingForm').append(input);
    }else{
        $('#size-'+sizeId).remove();
    }
});
// min max price
function getMinPrice(){
    var min_price = $('#min_price').val();

    var input  = "<input id='sortingMinPrice' type='hidden' value='"+min_price +"' name='min_price'>";
    if ($('#sortingMinPrice')) {
        $('#sortingMinPrice').remove();
    }
    $('#sortingForm').append(input);
}
function getMaxPrice(){
    var max_price = $('#max_price').val();
    var input  = "<input id='sortingMaxPrice' type='hidden' value='"+max_price +"' name='max_price'>";
    if ($('#sortingMaxPrice')) {
        $('#sortingMaxPrice').remove();
    }
    $('#sortingForm').append(input);
}

function searchByPrice(){
    getMinPrice();
    getMaxPrice();
}

// search box

function getSearchCategory(){
    var category = $('#category').val();
    var input  = "<input id='sortingCategory' type='hidden' value='"+category +"' name='category'>";
    if ($('#sortingCategory')) {
        $('#sortingCategory').remove();
    }
    $('#sortingForm').append(input);
}

function getSearchKey(){
    var key = $('#search').val();
    var input  = "<input id='searchKey' type='hidden' value='"+key +"' name='search'>";
    if ($('#searchKey')) {
        $('#searchKey').remove();
    }
    $('#sortingForm').append(input);
}


function filter(){
    $('#sortingForm').ajaxForm({url: 'server.php', type: 'get'})
}
