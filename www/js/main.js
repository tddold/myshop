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

                $('#cartCntItems').html(data['cntItems']);

                $('#addCart_' + itemId).show();
                $('#removeCart_' + itemId).hide();
            }
        }
    });
}

/**
 * Function calculate end price
 * 
 * @returns {undefined}
 */

function conversionPrise(itemId) {
    var newCnt,
            itemPrice,
            itemRealPrice;

    newCnt = $('#itemCnt_' + itemId).val();
    itemPrice = $('#itemPrice_' + itemId).attr('value');
    itemRealPrice = newCnt * itemPrice;

    $('#itemRealPrice_' + itemId).html(itemRealPrice);
}

/**
 * Get data from form
 * 
 */

function getData(obj_form) {
    var hData = {};

    $('input, textarea, select', obj_form)
            .each(function () {
                if (this.name && this.name !== '') {
                    hData[this.name] = this.value;
                    console.log('hData[' + this.name + '] = ' + hData[this.name]);
                }
            });

    return hData;
}
;

/**
 * Register new user
 * 
 */
function registerNewUser() {
    var postData = getData('#registerBox');

    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/register/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                alert('Реистацията е успешна!');

                //> block left column
                $('#registerBox').hide();

                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                //<

//                //> block login
//                $('#loginBox').hide();
//                $('#btnSaveOrder').show();
//                //<
            } else {
                alert(data['message']);
            }
        }
    });
}

function logout() {
    console.log("js-logout");
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/logout/",
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                $('#userBox').hide();

                $('#registerBox').show();
                $('#loginBox').show();
                window.location.href = '/';
            } else {
                alert(data['message']);
            }
        }
    });
}

/**
 * Login user * 
 * 
 */
function login() {
    var email,
            pwd,
            postData;
    email = $('#loginEmail').val();
    pwd = $('#loginPwd').val();

    postData = "email=" + email + "&pwd=" + pwd;

    console.log("js-login");

    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/login/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                $('#registerBox').hide();
                $('#loginBox').hide();

                $('#userLink').attr('href', '/user/');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
            } else {
                alert(data['message']);

            }
        }
    });
}

function showRegisterBox() {
    if ($('#registerBoxHidden').css('display') != 'block') {
        $('#registerBoxHidden').show();
    } else {
        $('#registerBoxHidden').hide();
    }
}