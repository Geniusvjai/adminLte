$(document).ready(function () {
    cartload();

    // load cart data 
    function cartload() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/load-cart-data',
            method: "GET",
            success: function (response) {
                $('.basket-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.basket-item-count').append($('<span class="badge badge-pill red">' + value['totalcart'] + '</span>'));
            }
        });
    }

    //add to cart 
    $('.add-to-cart-btn').click(function (e) {
        e.preventDefault();
        // alert('i am here')
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var quantity = $(this).closest('.product_data').find('.qty-input').val();
        var color = $("input[name=color]:checked").val();
        var size = $("input[name=size]:checked").val();


        $.ajax({
            url: "/add-to-cart",
            method: "POST",
            data: {
                'quantity': quantity,
                'product_id': product_id,
                'color': color,
                'size': size,
                'csrf-token': "{{ csrf_token() }}",
            },
            success: function (response) {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(response.status);
                cartload();
            },
        });
    });

    // increment quantity 
    $('.increment-btn').click(function (e) {
        e.preventDefault();
        var incre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(incre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });

    // decrement quantity
    $('.decrement-btn').click(function (e) {
        e.preventDefault();
        var decre_value = $(this).parents('.quantity').find('.qty-input').val();
        var value = parseInt(decre_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).parents('.quantity').find('.qty-input').val(value);
        }
    });

    // change quantity when increment quantity
    $('.changeQuantity').click(function (e) {
        e.preventDefault();

        var thisClick = $(this);
        var quantity = $(this).closest(".cartpage").find('.qty-input').val();
        var product_id = $(this).closest(".cartpage").find('.product_id').val();

        var data = {
            '_token': $('input[name=_token]').val(),
            'quantity': quantity,
            'product_id': product_id,
        };

        $.ajax({
            url: '/update-to-cart',
            type: 'POST',
            data: data,
            success: function (response) {
                // location.reload();
                thisClick.closest(".cartpage").find('.cart-grand-total-price').text(response.gtprice);
                $('#totalajaxcall').load(location.href + ' .totalpricingload');
            }
        });
    });

    // Delete Cart Data using cookie
    $(document).ready(function () {

        $('.delete_cart_data').click(function (e) {
            e.preventDefault();

            // alert();

            var thisDeletearea = $(this);
            var product_id = $(this).closest(".cartpage").find('.product_id').val();
            // alert(product_id)
            var data = {
                '_token': $('input[name=_token]').val(),
                "product_id": product_id,
            };

            // $(this).closest(".cartpage").remove();

            $.ajax({
                url: '/delete-from-cart',
                type: 'DELETE',
                data: data,
                success: function (response) {
                    // window.location.reload();
                    thisDeletearea.closest('.cartpage').remove();
                    $('#totalajaxcall').load(location.href + ' .totalpricingload');

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status);
                    cartload();
                }
            });
        });

    });

    // Clear Cart Data
    $(document).ready(function () {

        $('.clear_cart').click(function (e) {
            e.preventDefault();

            $.ajax({
                url: '/clear-cart',
                type: 'GET',
                success: function (response) {
                    window.location.reload();
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });
        });
    });

    // Show Order details of user 
    $(document).ready(function () {
        $('.openOrder').click(function (e) { 
            e.preventDefault();
            var order_id = $(this).attr('data-id');
            // alert(order_id);
            $.ajax({
                type: "POST",
                url: "/show-order",
                data: {
                    'order_id':order_id,
                },
                dataType: "json",
                success: function (response) {
                    // console.log(response.openDataModal[0]['product_image']);
                    $('#order_id').html(response.openDataModal[0]['order_id'])
                    $('#order_name').html(response.openDataModal[0]['product_name'])
                    $('#order_color').html(response.openDataModal[0]['product_color'])
                    $('#order_size').html(response.openDataModal[0]['product_size'])
                    $('#order_quantity').html(response.openDataModal[0]['product_quantity'])
                    $('#order_amount').html(response.openDataModal[0]['product_price'])
                    $('#order_image').attr('src','uploads/addProduct/'+response.openDataModal[0]['product_image'])
                    $('#order_status').html(response.openDataModal[0]['status'])
                    $('#order_date').html(response.openDataModal[0]['created_at'])

                }
            });
        });
    });
});


$("#datebtn").click(function () {
    var format1 = moment($("#order_date")
        .val()).format('DD-MM-YYYY');
});