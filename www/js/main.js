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


