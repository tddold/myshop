/**
 * Funnction add product to cart
 * 
 * @param {integer} itemId ID product
 * @return  if success reload data for  prudacts in cart
 */
function addToCart(itemId) {
    console.log('js-addToCart()');
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/addtocart/" + itemId + '/',
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).hide();
                $('#removeCart_' + itemId).show();
            }
        }
    });
}

/**
 * Remove product from cart
 * 
 * @param {imteger} itemId ID product
 * @returns {undefined} update data in cart
 */
function removeFromCart(itemId) {
    console.log("js-removeFromCart(" + itemId + ")");
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/removefromcart/" + itemId + '/',
        dataType: 'json',
        success: function (data) {
            if (data) {

                $('#cartCntItems').html('cntItems');

                $('#addCart_' + itemId).show();
                $('#removeCart_' + itemId).hide();
            }
        }
    });
}

function conversionPrise(itemId) {
    var newCnt,
            itemPrice,
            itemRealPrice;

    newCnt = $('#itemCnt_' + itemId).val();
    itemPrice = $('#itemPrice_' + itemId).attr('value');
    itemRealPrice = newCnt * itemPrice;

    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}
