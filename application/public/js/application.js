"use strict";

$(document).ready(function () {

    $('.product--list').on('click', '.product--vote', function() {

        var productId = $(this).data('product-id');

        if (productId) {
            $.ajax({
                url : "/api/vote",
                method : "post",
                dataType : "json",
                data : {
                    product_id : productId,
                }
            })
            .done(
                response => {
                    if (response.status) {
                        $('.product--list').find(`#vote_${response.id}`).html(response.value);
                    }
                }
            );
        }

        return false;
    })

})
