<script src="{{ URL::to('assetsWebsite1/js/vendor/jquery-1.12.3.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/jquery.meanmenu.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/countdown.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/jquery.nivo.slider.pack.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/jquery.simpleLens.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/jquery-ui.min.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/load-more.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/plugins.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/main.js') }}"></script>
<script src="{{ URL::to('assetsWebsite1/js/vendor/modernizr-2.8.3.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


</script>


<script>
   function clock() {
    var today = new Date();
    var day = today.getDate();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    if(day >= 10) {
        document.getElementById('html-days').innerHTML  =  day;
        document.getElementById('html-days1').innerHTML =  day;
    } else {
        document.getElementById('html-days').innerHTML  = "0" + day;
        document.getElementById('html-days1').innerHTML = "0" + day;
    }

    document.getElementById('html-hours').innerHTML = h;
    document.getElementById('html-minutes').innerHTML = m;
    document.getElementById('html-seconds').innerHTML = s;

    document.getElementById('html-hours1').innerHTML = h;
    document.getElementById('html-minutes1').innerHTML = m;
    document.getElementById('html-seconds1').innerHTML = s;
    var t = setTimeout(clock, 1);

    }
    function checkTime(i) {
    if (i < 10) {i = "0" + i};
    return i;
}

</script>
<script>
    $(document).ready(function() {





    });



</script>
<script>
    $(document).ready(function(){

        function number_format (number, decimals, dec_point, thousands_sep) {
            number = number.toFixed(decimals);

            var nstr = number.toString();
            nstr += '';
            x = nstr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? dec_point + x[1] : '';
            var rgx = /(\d+)(\d{3})/;

            while (rgx.test(x1))
                x1 = x1.replace(rgx, '$1' + thousands_sep + '$2');

            return x1 + x2;
        }


        function loadCart() {

                $.ajax({
                type: "GET",
                url: "/load/Cart",
                success: function (response) {

                    let _html   = "";
                    let _html_   = "";
                    let html    = "";
                    let data    = response.productViewCart;
                    var total   = 0;
                    var totals   = 0;
                    var transport = 15;
                    var thanhTien = 0;
                    console.log(response);

                    data.forEach((x) => {
                                var priceEachProduct = x.price_sale ? x.price_sale : x.price;
                                thanhTien = priceEachProduct * x.quantity;
                                total += thanhTien;
                                totals = total + 15;

                                _html +=  '<tr>';
                                _html +=  '<td class="td-img text-left">';
                                _html +=  '<a href="/detail/'+x.slug_name+'"><img src="/imgProduct/'+x.image+'" alt="Add Product"></a>';
                                _html +=  '<div class="items-dsc">';
                                _html +=  '<h5><a href="/detail/'+x.slug_name+'">'+x.name+'</a></h5>';
                                _html +=  '<p class="itemcolor">Size   : <span>'+x.cart_id_attribute+'</span></p>';
                                _html +=  '</div>';
                                _html +=  '</td>';
                                _html +=  '<td>$'+number_format(priceEachProduct,1,'.',',')+'</td>';
                                _html +=  '<td>';
                                _html +=  '<form action="#" method="POST">';
                                _html +=  '<div class="plus-minus">';
                                _html +=  '<a class="dec qtybuttonCart qtyMinus" data-cartattribute="'+x.cart_id_attribute+'" data-id="'+x.product_id_cart+'" data-user="'+x.user_id+'">-</a>';
                                _html +=  '<input type="text" value="'+x.quantity+'" name="menusQuantity" class="plus-minus-box">';
                                _html +=  '<a class="inc qtybuttonCart qtyPlus" data-cartattribute="'+x.cart_id_attribute+'" data-id="'+x.product_id_cart+'" data-user="'+x.user_id+'">+</a>';
                                _html +=  '</div>';
                                _html +=  '</form>';
                                _html +=  '</td>';
                                _html +=  '<td>';
                                _html +=  '<strong>$'+number_format(thanhTien,1,'.',',')+'</strong>';
                                _html +=  '</td>';
                                _html +=  '<td><i class="mdi mdi-close cart-remove" data-id="'+x.id+'" title="Remove this product"></i></td>';
                                _html +=  '</tr>';
                            });

                            $('#Cartmytable').html(_html);

                            html += '<table>';
                            html += '<tbody>';
                            html += '<tr>';
                            html += '<th>Cart Subtotal</th>';
                            html += '<td class="append-success">$'+number_format(total,1,'.',',')+'</td>';
                            html += '</tr>';
                            html += '<tr>';
                            html += '<th>Shipping and Handing</th>';
                            html += '<td>$'+number_format(transport,1,'.',',')+'</td>';
                            html += '</tr>';
                            html += '</tbody>';
                            html += '<tfoot>';
                            html += '<tr>';
                            html += '<th class="tfoot-padd">Order total</th>';
                            html += '<td class="tfoot-padd">$'+number_format(totals,1,'.',',')+'</td>';
                            html += '</tr>';
                            html += '</tfoot>';
                            html += '</table>';
                    $('#table-bill').html(html);
                },
            });
        }
       loadCart();

    //    function loadCoupon() {

    //         $.ajax({
    //             url:"/load/Coupon",
    //             type:"GET",
    //             success: function (data) {
    //                 let html   = "";
    //                 var dataCartCoupon = data.productViewCart;
    //                 var dataCoupon = data.coupon;
    //                 var total   = 0;
    //                 var transport = 15;
    //                 var thanhTien = 0;

    //                 console.log(dataCartCoupon);
    //                 console.log(dataCoupon);
    //                 dataCartCoupon.forEach(function (x) {
    //                     var priceEachProduct = x.price_sale ? x.price_sale : x.price;
    //                     thanhTien = priceEachProduct * x.quantity;
    //                     total += thanhTien + transport;
    //                     total -= data.coupon.coupon_price;


    //                 });
    //                 html += '<table>';
    //                 html += '<tbody>';
    //                 html += '<tr>';
    //                 html += '<th>Cart Subtotal</th>';
    //                 html += '<td>$'+number_format(thanhTien,1,'.',',')+'</td>';
    //                 html += '</tr>';
    //                 html += '<tr>';
    //                 html += '<th>Shipping and Handing</th>';
    //                 html += '<td>$'+number_format(transport,1,'.',',')+'</td>';
    //                 html += '</tr>';
    //                 html += '<tr>';
    //                 html += '<th>Vat</th>';
    //                 html += '<td>$'+number_format(data.coupon.coupon_price,1,'.',',')+'0</td>';
    //                 html += '</tr>';
    //                 html += '</tbody>';
    //                 html += '<tfoot>';
    //                 html += '<tr>';
    //                 html += '<th class="tfoot-padd">Order total</th>';
    //                 html += '<td class="tfoot-padd">$'+number_format(total,1,'.',',')+'</td>';
    //                 html += '</tr>';
    //                 html += '</tfoot>';
    //                 html += '</table>';
    //                 $('#table-bill').html(html);


    //             }

    //         });

    //    }



        function loadCartGioHang() {

            $.ajax({
                type: "GET",
                url: "/load/Cart",
                success: function (response) {

                    let _html_   = "";
                    let data    = response.productViewCart;
                    var total   = 0;
                    var itemsDem = 0;

                    data.forEach((x) => {
                        var priceEachProduct = x.price_sale ? x.price_sale : x.price;
                        var thanhTien = priceEachProduct * x.quantity;
                        total += thanhTien;
                        itemsDem += x.quantity;
                    });
                    _html_ += ' <i class="mdi mdi-cart"></i>';
                    _html_ +=  ' ['+itemsDem+'] items :  <strong>$'+number_format(total,1,'.',',')+'</strong>';
                    $('#add-itemcarr').html(_html_);
                    },
            });
        }

        loadCartGioHang();




        function loadCartGioHangHover() {

            $.ajax({
                type: "GET",
                url: "/load/Cart",
                success: function (response) {

                    let _html   = "";
                    let _html_  ="";
                    let data    = response.productViewCart;
                    var total   = 0;
                    var itemsDem = 0;

                    data.forEach((x) => {
                        var priceEachProduct = x.price_sale ? x.price_sale : x.price;
                        var thanhTien = priceEachProduct * x.quantity;
                        total += thanhTien;
                        itemsDem += x.quantity;
                        _html +='<div class="sin-itme clearfix" >';
                        _html +='<i class="mdi mdi-close cart-remove" data-id="'+x.id+'"></i>';
                        _html +='<a class="cart-img" href="/detail/'+x.slug_name+'"><img src="/imgProduct/'+x.image+'" alt="" /></a>';
                        _html +='<div class="menu-cart-text">';
                        _html +='<a href="/detail/'+x.slug_name+'"><h5>'+x.name+'</h5></a>';
                        _html +='<span>X'+x.quantity+'</span>';
                        _html +='<span>Size : '+x.cart_id_attribute+'</span>';
                        _html +='<strong>$'+number_format(priceEachProduct,1,'.',',')+'</strong>';
                        _html +='</div>'
                        _html +='</div>';
                    });
                    _html_ +=' <span>total <strong> : $'+number_format(total,1,'.',',')+'</strong></span>';
                    $('#append-hoverCart').html(_html);
                    $('#append-hoverCart-total').html(_html_);

                    },
            });
        }

        loadCartGioHangHover();


        $('.coupon_click').click(function(e){
            e.preventDefault(e)
            var subject =   $("input[name='subject']").val();

            var payload = {
                'subject' : subject,
            }
            $.ajax({
                url:"/coupon/bill",
                type:"post",
                data:payload,
                success: function (data) {

                    if(data.status == true) {
                        $(".append-success").text(data.dataSession);
                    }
                },
            })
        });






    // add To Cart Detail
        $(".addCart-3").on('click',function(e){
                e.preventDefault(e);

                var  getID = $(this).data('id');
                var cart_id_attribute = $("#myselect3_"+getID+" option:selected").val();
                var quantity = $('#quantity3_'+getID).val();
                var product_id_cart = $(this).siblings('input[name="product_id_cart"]').val();
                var price_cart_product = $(this).siblings('input[name="price_cart_product"]').val();
                var user_id = $(this).siblings('input[name="user_id"]').val();
                var cart_price = $(this).siblings('input[name="cart_price"]').val();

                var payload = {
                    'product_id_cart'    : product_id_cart,
                    'quantity'           : quantity,
                    'price_cart_product' : price_cart_product,
                    'cart_id_attribute'  : cart_id_attribute,
                    'cart_price'         : cart_price,
                    'user_id'            : user_id,

                }
                $.ajax({
                    url:"/add/ToCart/"+ getID,
                    type:"POST",
                    data:payload,


                    success:function (data) {

                            if(data.status == 0) {

                            $('#quantity3_'+getID).val(1);

                            Toastify({
                                text: 'Quantity must equal number',
                                duration: 2000,
                                className: "infoCustomerToastError",
                                newWindow: true,
                                close: false,
                                gravity: "top",
                                position: "right",
                                stopOnFocus: true,
                            }).showToast();

                            }else if(data.status == 1) {
                            $("#myselect3_"+getID+" option:first").prop("selected", "selected");
                            $('#quantity3_'+getID).val(1);

                            Toastify({
                                text: data.success,
                                duration: 2000,
                                className: "infoCustomerToast",
                                newWindow: true,
                                close: false,
                                gravity: "top",
                                position: "right",
                                stopOnFocus: true,
                            }).showToast();
                            loadCartGioHang();
                            loadCartGioHangHover();



                            } else if (data.status ==  2) {
                            Toastify({
                            text: data.error,
                            duration: 2000,
                            className: "infoCustomerToastError",
                            newWindow: true,
                            close: false,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                            }).showToast();

                        }
                   },
                });
        });

        $(".addCart-2").on('click',function(e){
            e.preventDefault(e);

            var  getID = $(this).data('id');
            var cart_id_attribute1 =   $("#myselect1_"+getID+" option:selected").val();
            var cart_id_attribute2 =   $("#myselect2_"+getID+" option:selected").val();
            var quantity1 = $('#quantity1_'+getID).val();
            var quantity2 = $('#quantity2_'+getID).val();
            var product_id_cart = $(this).siblings('input[name="product_id_cart"]').val();
            var user_id = $(this).siblings('input[name="user_id"]').val();
            var cart_price = $(this).siblings('input[name="cart_price"]').val();


            var payload = {
                'product_id_cart'    : product_id_cart,
                'quantity'           : quantity2 ||quantity1 ,
                'cart_id_attribute'  : cart_id_attribute2 || cart_id_attribute1 ,
                'user_id'            : user_id,
                'cart_price'         : cart_price,


            }
            $.ajax({
                url:"/add/ToCart/"+ getID,
                type:"POST",
                data:payload,


                success:function (data) {

                    if(data.status == 0) {

                        $('#quantity1_'+getID).val(1);
                        $('#quantity2_'+getID).val(1);
                        Toastify({
                            text: 'Quantity must equal number',
                            duration: 2000,
                            className: "infoCustomerToastError",
                            newWindow: true,
                            close: false,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                        }).showToast();

                    }else if(data.status == 1) {
                        $("#myselect1_"+getID+" option:first").prop("selected", "selected");
                        $("#myselect2_"+getID+" option:first").prop("selected", "selected");
                        $('#quantity1_'+getID).val(1);
                        $('#quantity2_'+getID).val(1);

                        Toastify({
                            text: data.success,
                            duration: 2000,
                            className: "infoCustomerToast",
                            newWindow: true,
                            close: false,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                        }).showToast();
                        loadCartGioHang();
                        loadCartGioHangHover();




                    } else if (data.status ==  2) {
                        Toastify({
                        text: data.error,
                        duration: 2000,
                        className: "infoCustomerToastError",
                        newWindow: true,
                        close: false,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                    }).showToast();

                    }
                },

                error: function (data) {
                    console.log(data);
                }

            });



        });

        $(".addCart").on('click',function(e){
            e.preventDefault(e);

            var quantity =    $(this).siblings('input[name="quantity"]').val();;
            var price_cart_product = $(this).siblings('input[name="price_cart_product"]').val();
            var cart_id_attribute = $(this).siblings('input[name="cart_id_attribute"]').val();
            var user_id = $(this).siblings('input[name="user_id"]').val();
            var product_id_cart = $(this).siblings('input[name="product_id_cart"]').val();
            var cart_price = $(this).siblings('input[name="cart_price"]').val();
            var  getID = $(this).data('id');

            var payload = {
                'product_id_cart'    : product_id_cart,
                'quantity'           : quantity,
                'price_cart_product' : price_cart_product,
                'cart_id_attribute'  : cart_id_attribute,
                'cart_price'         : cart_price,
                'user_id'            : user_id,

            }
            $.ajax({
                url:"/add/ToCart/"+ getID,
                type:"POST",
                data:payload,


                success:function (data) {

                    if(data.status == 0) {


                        Toastify({
                            text: 'Quantity must equal number',
                            duration: 2000,
                            className: "infoCustomerToastError",
                            newWindow: true,
                            close: false,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                        }).showToast();


                        }else if(data.status == 1) {

                        Toastify({
                            text: data.success,
                            duration: 2000,
                            className: "infoCustomerToast",
                            newWindow: true,
                            close: false,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                        }).showToast();
                        loadCartGioHang();
                        loadCartGioHangHover();


                        } else if (data.status ==  2) {
                        Toastify({
                        text: data.error,
                        duration: 2000,
                        className: "infoCustomerToastError",
                        newWindow: true,
                        close: false,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        }).showToast();

                    }
                },
            });

        });

        //addWishList

        $(".addWishList").on('click', function(e) {
            e.preventDefault(e);

            var  getId = $(this).data('id');
            var  getUserId = $(this).data('user-id');

            var payload = {
                'wish_list_product_id' : getId,
                'wish_list_user_id'    : getUserId,
            }

            $.ajax({
                url:"/add/wishList/"+getId,
                type:"POST",
                data: payload,

                success:function (data) {
                    if(data.status == 1) {

                        Toastify({
                            text: data.success,
                            duration: 2000,
                            className: "infoCustomerToast",
                            newWindow: true,
                            close: false,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                        }).showToast();
                    } else if (data.status ==  2) {
                        Toastify({
                        text: data.error,
                        duration: 2000,
                        className: "infoCustomerToastError",
                        newWindow: true,
                        close: false,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        }).showToast();
                    } else if (data.status ==  0) {
                        Toastify({
                        text: data.error,
                        duration: 2000,
                        className: "infoCustomerToastError",
                        newWindow: true,
                        close: false,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        }).showToast();
                }
                }
            });


        });

        //loadWishlist

        function loadWishlist() {
            $.ajax({
                url:"/get/view/WishList",
                type: "GET",
                success: function(response) {
                    console.log(response);
                }


            });
        }
        loadWishlist();




            //Delete Cart
        $("body").on("click", ".cart-remove", function () {

            var getIdDelete = $(this).data('id');

            $.ajax ({
                url : "/delete/Cart/" + getIdDelete,
                type: "GET",
                success: function ($res) {

                    if($res.status == true) {
                        loadCartGioHang();
                        loadCart();
                        loadCartGioHangHover();
                        console.log($res.dataCartCount);
                        if($res.dataCartCount == 1) {
                           location.reload();
                        }
                    }
                },
            });

        });

        //Delete Cart All
        function deleteBillCartProduct() {
            var user_id     = $("input[name='bill_user_id']").val();
            $.ajax ({
                url : "/delete/billCart/user/" + user_id,
                type: "GET",
            });

        }

        //form validation for login
        $('#checkoutBill').on('click', function(e) {
            e.preventDefault(e);
               var bill_user_id     = $("input[name='bill_user_id']").val();
               var bill_name        = $("input[name='bill_name']").val();
               var bill_phone       = $("input[name='bill_phone']").val();
               var bill_email       = $("input[name='bill_email']").val();
               var bill_address     = $("#bill_address").val();
               var bill_note        = $("#bill_note").val();
               var bill_payment     = $("input[name=bill_payment]:checked").val();

            var payload = {
                'bill_user_id' : bill_user_id,
                'bill_name'    : bill_name,
                'bill_phone'   : bill_phone,
                'bill_email'   : bill_email,
                'bill_address' : bill_address,
                'bill_note'    : bill_note,
                'bill_payment' : bill_payment,
            }

            $.ajax({
                url:"/post/billCart",
                type:"POST",
                data:payload,
                beforeSend:function () {
                $(document).find('span.error-text').text('');
                },

                success: function (data) {
                    if(data.status == 0) {
                        $.each(data.error, function (prefix, value) {
                            $('span.'+prefix+'_error').text(value[0]);
                        });
                    } else {
                        Toastify({
                            text: data.success,
                            duration: 2000,
                            className: "infoCustomerToast",
                            newWindow: true,
                            close: false,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                        }).showToast();
                        deleteBillCartProduct();
                        location.reload();
                    }
                }
            });
        });

        var quantitiy=0;
       $('.quantity-right-plus').click(function(e){

            e.preventDefault();
            var quantity = parseInt($('#quantity').val());

                $('#quantity').val(quantity + 1);

        });

         $('.quantity-left-minus').click(function(e){
            e.preventDefault();

            var quantity = parseInt($('#quantity').val());

                if(quantity>1){
                    $('#quantity').val(quantity - 1);
                }
        });



        $(".qtybutton").on("click", function() {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if(oldValue < 1) {
                console.log('cc');
            }
            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue >= 2) {
                    var newVal = parseFloat(oldValue) - 1;

                } else {
                    newVal = 1;
                }
            }
            $button.parent().find("input").val(newVal);

	    });


        $(document).on('click', '.qtybuttonCart', function() {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if(oldValue < 1) {
                console.log('cc');
            }
            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue >= 2) {
                    var newVal = parseFloat(oldValue) - 1;

                } else {
                    newVal = 1;
                }
            }
            $button.parent().find("input").val(newVal);


            var cart_id_attribute = $(this).data('cartattribute');
            var product_id_cart  = $(this).data('id');
            var user_id  = $(this).data('user');

            $.ajax({
                        url     : "/update/Cart",
                        type    : "POST",
                        data    : {
                            'cart_id_attribute' : cart_id_attribute,
                            'product_id_cart': product_id_cart,
                            'quantity'            : newVal,
                            'user_id'    : user_id,
                        },
                        success : function ($res) {

                            if($res.status == 1) {
                            loadCartGioHang();
                            loadCart();
                            loadCartGioHangHover();
                            }
                        },
                });
        });

        function loadSearch() {
            var value     = $("input[name='searchProduct']").val();

            $.ajax({
                url     :"/search/ajax",
                type    : "get",
                data    : {
                    'searchProduct' : $value,
                },
                success:function(data){

                    var dataSearch = data.product;
                    var html = "";

                    dataSearch.forEach(function (x) {
                        html += '<div class="item-ult">';
                        html += '<div class="titleProduct" style="text-align: left;height: 100%;">';
                        html += '<div class="" style=" padding-top: 16px; ">';
                        html += '<h4 style="font-size: 12px; ">';
                        html += '<a href="/detail/'+x.slug_name+'" title="'+x.name+'" style=" font-weight: 600; ">'+x.name+'</a>';
                        html += '</h4>';
                        if(x.price_sale > 0) {
                            html += '<p style=" font-weight: 600; ">$'+number_format(x.price_sale,1,'.',',')+'';
                            html += '<del style=" margin-left: 7px; ">$'+number_format(x.price,1,'.',',')+'</del>';
                        } else {
                            html += '<p style=" font-weight: 600; ">$'+number_format(x.price,1,'.',',')+'';
                        }
                        html += '</p>';
                        html += '</div>';
                        html += '</div>';
                        html += '<div class=""style=" position: absolute; right: 0; top: 15px; ">';
                        html += '<div class="bg-img" >';
                        html += '<a href="/detail/'+x.slug_name+'">';
                        html += '<img class="img-fluid rounded" src="/imgProduct/'+x.image+'" style="width: 46px;border-radius: 0.25rem!important;"alt="">';
                        html += '</a>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                    });

                    $('#addClass').html(html);
                },

            });


        }

        $('#searchProduct').on('keyup',function(){
            $value = $(this).val();
            if($value == '') {

                $('#addClass').removeClass('hoverSearch');

            } else {

                $('#addClass').addClass('hoverSearch');

            }

            loadSearch();
        });

        function loadCommentUser () {
            var ajaxLoadComment     = $("input[name='ajaxLoadComment']").val();

            $.ajax({
                url: "/load/comment/" + ajaxLoadComment,
                type: "GET",
                success : function ($data) {
                    var dataCommentUser = $data.data;
                    var html = "";
                    dataCommentUser.forEach(function (x) {
                        html +=  '<div class="about-author">';
                        html +=  '<div class="autohr-text">';
                        html +=  '<img src="img/blog/author1.png" alt="">';
                        html +=  '<div class="author-des">';
                        html +=  '<h4><a href="#">'+x.comment_user_name+'</a></h4>';
                        html +=  '<span>  '+x.created_at+'</span>';
                        html +=  '<p>'+x.comment_information+'.</p>';
                        html +=  '</div>';
                        html +=  '</div>';
                        html +=  '</div>';
                        html +=  '<hr>';
                    });

                    $('#commentLoadHTML').html(html);

                }
            });
        }

        loadCommentUser()

        $('#submit-ReviewProduct').on('click', function(e) {
            e.preventDefault();
            var dataID  = $(this).data('id');
            var comment_user_name     = $("input[name='comment_user_name']").val();
            var comment_user_email     = $("input[name='comment_user_email']").val();
            var comment_information     = $("#comment_information").val();


            var payload = {
                'comment_user_name'     : comment_user_name,
                'comment_user_email'    : comment_user_email,
                'comment_information'   : comment_information
            }

            $.ajax({
                url:"/users/comment/"+dataID,
                type: 'POST',
                data:payload,
                beforeSend:function () {
                    $(document).find('p.error-text').text('');
                },
                success: function (data) {
                    if(data.status == 0) {
                        $.each(data.error, function (prefix, value) {
                            $('p.'+prefix+'_error').text(value[0]);
                        });
                    } else if(data.status == 1) {
                        Toastify({
                            text: data.success,
                            duration: 2000,
                            className: "infoCustomerToast",
                            newWindow: true,
                            close: false,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                        }).showToast();
                        var comment_user_name     = $("input[name='comment_user_name']").val("");
                        var comment_user_email     = $("input[name='comment_user_email']").val("");
                        var comment_information     = $("#comment_information").val("");
                        loadCommentUser()

                    } else {
                        Toastify({
                        text: data.error,
                        duration: 2000,
                        className: "infoCustomerToastError",
                        newWindow: true,
                        close: false,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        }).showToast();
                    }
                }


            });


        });

        $('#submit_MyAccount1').on('click', function(e) {
            e.preventDefault();
               var old_password         = $("input[name='old_password1']").val();
               var new_password         = $("input[name='new_password1']").val();
               var confirm_password     = $("input[name='confirm_password1']").val();

               var payload = {
                'old_password': old_password,
                'new_password': new_password,
                'confirm_password': confirm_password,
               }

               console.log(payload);

               $.ajax({
                    url:"/change/MyAccount/Password",
                    type:"POST",
                    data:payload,
                    beforeSend:function () {
                        $(document).find('span.error-text').text('');
                    },
                    success: function (data) {
                        if(data.status == 0) {
                            $.each(data.error, function (prefix, value) {
                                $('span.'+prefix+'_error').text(value[0]);
                            });
                        }else if (data.status == 1) {
                            $('span.old_password_error').text(data.error);
                        } else if(data.status == 2) {
                            $('span.new_password_error').text(data.error);

                        } else {
                            Toastify({
                            text: data.success,
                            duration: 2000,
                            className: "infoCustomerToast",
                            newWindow: true,
                            close: false,
                            gravity: "top",
                            position: "right",
                            stopOnFocus: true,
                        }).showToast();
                          $("input[name='old_password1']").val("");
                            $("input[name='new_password1']").val("");
                             $("input[name='confirm_password1']").val("");

                        }

                    }
               });


        });

    });

</script>




