$(document).ready(function () {

    //add product btn
    $('.add-product-btn').on('click', function (e) {

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        // using $.number plugin to add comma to price i.e (3200.00  => 3,200.00)
        var price = $.number($(this).data('price'), 2);

        $(this).removeClass('btn-success').addClass('btn-default disabled');

        var html =
            `<tr>
                <td>${name}</td>
                <td>
                    <input type="number"
                           name="products[${id}][quantity]"
                           data-price="${price}"
                           class="form-control input-sm product-quantity" min="1" value="1">
                </td>
                <td class="product-price">${price}</td>               
                <td>
                    <button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}">
                        <span class="fa fa-trash"></span>
                    </button>
                </td>
            </tr>`;

        $('.order-list').append(html);

        //to calculate total price
        calculateTotal();
    });

    //disabled btn
    $('body').on('click', '.disabled', function(e) {

        e.preventDefault();

    });//end of disabled

    //remove product btn
    $('body').on('click', '.remove-product-btn', function(e) {

        e.preventDefault();

        var id = $(this).data('id');

        // remove parent tr
        $(this).closest('tr').remove();
        // adding active class again to product
        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

        //to calculate total price
        calculateTotal();

    });//end of remove product btn


    //change product quantity
    $('body').on('keyup change', '.product-quantity', function() {

        var quantity = Number($(this).val()); // convert string to number
        var unitPrice = parseFloat($(this).data('price').replace(/,/g, '')); // remove comma & parse to float

        $(this).closest('tr').find('.product-price').html($.number((quantity * unitPrice), 2));

        calculateTotal();
    });//end of product quantity change



    // calculate total price function
    function calculateTotal() {
        var price = 0;

        var total_price_ele = $('#total_price');

        // getting all products price
        $('.order-list .product-price').each(function (i) {
            price += parseFloat($(this).html().replace(/,/g, ''));
        });

        total_price_ele.html($.number(price, 2));

        if (price <= 0) {
            $('#add-order-btn').addClass('disabled');
            total_price_ele.html(0); // set html value is '0' not '0.00'
        } else {
            $('#add-order-btn').removeClass('disabled');
        }

    }

    //list all order products
    // $('.order-products').on('click', function(e) {
    //
    //     e.preventDefault();
    //
    //     $('#loading').css('display', 'flex');
    //
    //     var url = $(this).data('url');
    //     var method = $(this).data('method');
    //     $.ajax({
    //         url: url,
    //         method: method,
    //         success: function(data) {
    //
    //             $('#loading').css('display', 'none');
    //             $('#order-product-list').empty();
    //             $('#order-product-list').append(data);
    //
    //         }
    //     })
    //
    // });//end of order products click

    //print order
    // $(document).on('click', '.print-btn', function() {
    //
    //     $('#print-area').printThis();
    //
    // });//end of click function

});//end of document ready
