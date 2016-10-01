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

function removeFromCart(itemId) {
    console.log("js-rmoveFromCart(" + itemId + ")");
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/removefromCart/" + itemId + '/',
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

