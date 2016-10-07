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

function newCategory() {
    var postData = getData('#blockNewCategory');

    $.ajax({
        type: 'POST',
        async: false,
        url: "/admin/addnewcat/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                alert(data['message']);
                $('#newCategoryName').val('');
            } else {
                alert(data['message']);
            }
        }
    });
}

function updateCat(itemId) {
    var parentId = $('#parentId_' + itemId).val();
    var newName = $('#itemName_' + itemId).val();
    var postData = {
        itemId: itemId,
        parentId: parentId,
        newName: newName
    };

    $.ajax({
        type: 'POST',
        async: false,
        url: "/admin/updatecategory/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            if (data['success']) {
                alert(data['message']);
            }
        }
    });
}



function addProduct() {
    var itemName = $('#newItemName').val(),
            itemPrice = $('#newItemPrice').val(),
            itemCatId = $('#newItemCatId').val(),
            itemDesc = $('#newItemDesc').val(),
            postData = {
                itemName: itemName,
                itemPrice: itemPrice,
                itemCatId: itemCatId,
                itemDesc: itemDesc
            };

    $.ajax({
        type: 'POST',
        async: false,
        url: "/admin/addproduct/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            alert(data['message']);
            if (data['success']) {
                $('#newItemName').val('');
                $('#newItemPrice').val('');
                $('#newItemCatId').val('');
                $('#newItemDesc').val('');
            }
        }
    });
}


function updateProduct(itemId) {
    var itemName = $('#itemName_' + itemId).val(),
            itemPrice = $('#itemPrice_' + itemId).val(),
            itemCatId = $('#itemCatId_' + itemId).val(),
            itemDesc = $('#itemDesc_' + itemId).val(),
            itemStatus = $('#itemStatus_' + itemId).attr('checked');

    if (!itemStatus) {
        itemStatus = 1;
    } else {
        itemStatus = 0;
    }

    var postData = {
        itemId: itemId,
        itemName: itemName,
        itemPrice: itemPrice,
        itemCatId: itemCatId,
        itemDesc: itemDesc,
        itemStatus: itemStatus
    };

    $.ajax({
        type: 'POST',
        async: false,
        url: "/admin/updateproduct/",
        data: postData,
        dataType: 'json',
        success: function (data) {
            alert(data['message']);
        }
    });
}