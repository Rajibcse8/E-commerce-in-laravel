<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/rateit.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-select.min.css') }}">

    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.css') }}">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800'
        rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body class="cnt-home">
    <!-- ============================================== HEADER ============================================== -->

    @include('frontend.body.header')

    <!-- ============================================== HEADER : END ============================================== -->
    @yield('content')
    <!-- /#top-banner-and-menu -->

    <!-- ============================================================= FOOTER ============================================================= -->
    @include('frontend.body.brand')
    @include('frontend.body.footer')
    <!-- ============================================================= FOOTER : END============================================================= -->




    <!-- JavaScripts placed at the end of the document so the pages load faster -->
    <script src="{{ asset('frontend/assets/js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/echo.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.easing-1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.rateit.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/assets/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>






    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif
    </script>


    <!--BootStrap  Modal for Loading Add to Cart  Data-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">

                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="" class="card-img-top" alt="" style="height :200px; width:200px"
                                    id="pimage">

                            </div>
                        </div>
                        <!--End Col-->
                        <div class="col-md-4">
                            <ul class="list-group">
                                <li class="list-group-item">Product Price :<strong class="text-info">$<span
                                            id="pprice"></span></strong>
                                    <strong class="text-danger">$<del id="poldprice"></del></strong>
                                </li>


                                <li class="list-group-item">Product Price :<span id="pcode"></span></li>
                                <li class="list-group-item">Product Category :<span id="pcategory"></span></li>
                                <li class="list-group-item">Product Brand :<span id="pbrand"></span></li>
                                <li class="list-group-item" id="available"><strong class="text-info">
                                        Available</strong> </li>
                                <li class="list-group-item" id="notavailable"><strong class="text-danger">Not
                                        Available</strong> </li>
                            </ul>

                        </div>
                        <!--End Col-->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="color">Select Color</label>
                                <select class="form-control" id="color" name="color">


                                </select>
                            </div>

                            <div class="form-group" id="sizeArea">
                                <label for="size">Select Size</label>
                                <select class="form-control" id="size" name="size">


                                </select>
                            </div>

                            <div class="form-group">
                                <label for="quantity">Product Quatity</label>
                                <input type="number" class="form-control" id="quantity" value="1" min="1">

                            </div>
                            <input type="hidden" id="product_id">
                            <button type="submit" class="btn btn-primary mb-2" onclick="addToCart()">Add To
                                Cart</button>

                        </div>
                        <!--End Col-->
                    </div>

                </div>{{-- End modal Body --}}
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal End-->

    <script type="text/javascript">
        $.ajaxSetup({

            'headers': {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        //start--function
        function ProductView(id) {

            $.ajax({
                type: "GET",
                url: "/product/view/modal/" + id,
                dataType: "json",
                success: function(data) {
                    //console.log(data);

                    $('#pname').text(data.product.product_name_en);

                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name_en);
                    $('#pbrand').text(data.product.brand.brand_name_en);
                    $('#product_id').val(id);
                    $('#quantity').val(1);

                    $('#pimage').attr('src', '/' + data.product.product_thumbnail);

                    ///price--start
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#poldprice').text('');
                        $('#pprice').text(data.product.selling_price);
                    } else {
                        $('#pprice').text(data.product.selling_price - data.product.discount_price);
                        $('#poldprice').text(data.product.selling_price);
                    }

                    //price end----------

                    //stock-availablity--start--
                    if (data.product.product_qty > 0) {
                        $('#available').show();
                        $('#notavailable').hide();
                    } else {

                        $('#available').hide();
                        $('#notavailable').show();

                    }

                    //stock-availability--end--

                    //color-------
                    $('select[name="color"]').empty();
                    $.each(data.color, function(key, value) {
                        $('select[name="color"]').append(
                            '<option value=' + '"' + value + '">' + value + '</option>')
                    });
                    //end color function

                    //size staer---
                    $('select[name="size"]').empty();
                    $.each(data.size, function(key, value) {
                        $('select[name="size"]').append('<option value="' + value + '">' + value +
                            '</option>')

                    });

                    if (data.size == "") {
                        $("#sizeArea").hide();
                    } else {
                        $("#sizeArea").show();
                    }
                    //size end

                } //ajax success function end------------

            });


        }
        //End view function---------------

        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();



            var quantity = $('#quantity').val();

            //alert(size);

            $.ajax({
                type: "POST",
                dataType: "json",
                data: {
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    miniCart();
                    $('#closeModal').click();
                    //console.log(data);

                    //Start Sweet-alert

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000,
                    })

                    if ($.isEmptyObject(data.success)) {
                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    } else {
                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    }

                    //End Sweet-alert

                },

            })


        }
    </script>

    <script type="text/javascript">
        function miniCart() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/product/mini/cart/',
                success: function(response) {

                    var miniCart = "";
                    $('span[id="cartsubtotal"]').text(response.cart_total);
                    $('span[id="cartqty"]').text(response.cart_qty);
                    $.each(response.carts, function(key, value) {

                        miniCart += `<div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="${value.options.image}" alt=""></a> 
                                            </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">${value.name}</a></h3>
                                            <div class="price">${value.price *value.qty}</div>
                                        </div>
                                        <div class="col-xs-1 action">
                                         <button type="submit" id="${value.rowId}" onclick="minicartRemove(this.id)"><i class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr>`;
                        //alert('http://127.0.0.1:8000/'+value.options.image);
                    })

                    $('#miniCart').html(miniCart);

                }


            });
        }
        miniCart()
        //Mini Cart removeItem  Function---Start

        function minicartRemove(rowID) {

            $.ajax({
                type: 'GET',
                url: 'mini-cart/product/remove/' + rowID,
                dataType: 'json',
                success: function(data) {
                    minicart();


                    //Start Sweet-alert

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000,
                    })

                    if ($.isEmptyObject(data.success)) {
                        Toast.fire({
                            type: 'error',
                            title: data.error,
                        })
                    } else {
                        Toast.fire({
                            type: 'success',
                            title: data.success,
                        })
                    }

                    //End Sweet-alert

                },
            })
        }

        //Mini Cart removeItem  Function---End
    </script>

    <script type="text/javascript">
        //Start --Add-to-wishlist--function-----------
        function AddToWishlist(id) {

//             $.ajaxSetup({
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//   }
// });

        
            $.ajax({

                type: 'POST',
                dataType: 'json',
                url: '/add/to/wishlist/'+id,
                success: function(data) {


                    //Start Sweet-alert

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        
                        showConfirmButton: false,
                        timer: 3000,
                    })

                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            type: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            type: 'error',
                            title: data.error,
                        })
                    }

                    //End Sweet-alert

                },


            })

            //END --Add-to-wishlist--function-----------

        }
    </script>


<!--WishList Product Load  Start-->
    <script type="text/javascript">

    function wishlist(){
        $.ajax({
            type:'get',
            url:'/load/wishlist/product',
            dataType:'json',
            success:function(response){
            
               var rows=""
               $.each(response, function (key, value) { 
                  //alert('127.0.0.1/'+value.product.product_thumbnail)
                    rows+=`<tr>
                                    <td class="col-md-2"><img
                                            src="/${value.product.product_thumbnail} " alt="image">
                                    </td>
                                    <td class="col-md-7">
                                        <div class="product-name"><a href="#">${value.product.product_name_en}</a></div>
                                       
                                        <div class="price">
                                            ${value.product.discount_price ==null ?
                                             `$${value.product.selling_price}`  :
                                             `$${value.product.selling_price-value.product.discount_price}<span>$${value.product.selling_price}</span>`
                                            }
                                           
                                        </div>
                                    </td>
                                    <td class="col-md-2">
                                        <button  class="btn btn-primary icon" id="${value.product_id}" onclick="ProductView(this.id)" type="button" title="Add Cart" data-toggle="modal" 
                                         data-target="#exampleModal">Add_to_Cart</button>
                                     </td>     
                                    <td class="col-md-1 close-btn">
                                        <button type="submit" id="${value.product_id}" onclick="RemoveWishlistItem(this.id)"><i class="fa fa-times"></i></button>
                                    </td>
                                </tr>`
               });

               $('#wishlist').html(rows);

            },
        })
    }

    wishlist();
      
    </script>
<!--Wishlist product load End-->

<!--Wishllist product remove start-->
<script type="text/javascript">
 function RemoveWishlistItem(id){
   $.ajax({
       type: "get",
       url: "/remove/wishlist/item/"+id,
       dataType: "json",
       success: function (response) {
           wishlist();
             //Start Sweet-alert

             const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        
                        showConfirmButton: false,
                        timer: 3000,
                    })

                    if ($.isEmptyObject(response.error)) {
                        Toast.fire({
                            icon: 'success',
                            type: 'success',
                            title: response.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            type: 'error',
                            title: response.error,
                        })
                    }

                    //End Sweet-alert

       }
   });
 }
   
</script>
<!--Wishllist product remove start-->


</body>

</html>
