@extends('frontend.frontend_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
    My-Cart
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Check out</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->



<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">

                            <!-- panel-heading -->

                            <!-- panel-heading -->

                            <div id="collapseOne" class="panel-collapse collapse in">

                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">

                                        <!-- guest-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <h4 class="checkout-subtitle">Shipping Address</h4>
                                            <form class="register-form" action="{{ route('checkout.store') }}"  method="POST" >
                                                @csrf
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Shipping
                                                        Name<span>*</span></label>
                                                    <input type="text"
                                                        class="form-control unicase-form-control text-input"
                                                        name="shipping_name" placeholder="Shipping name"
                                                        placeholder="Shipping Name" value="{{ Auth()->user()->name }}"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Shipping
                                                        Email<span>*</span></label>
                                                    <input type="email"
                                                        class="form-control unicase-form-control text-input"
                                                        name="shipping_email" placeholder="Shipping Email"
                                                        placeholder="Shipping Email"
                                                        value="{{ Auth()->user()->email }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Shipping
                                                        Phone<span>*</span></label>
                                                    <input type="number"
                                                        class="form-control unicase-form-control text-input"
                                                        name="shipping_phone" placeholder="Shipping Phone"
                                                        placeholder="Shipping Phone"
                                                        value="{{ Auth()->user()->phone }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Postal
                                                        Code<span>*</span></label>
                                                    <input type="number"
                                                        class="form-control unicase-form-control text-input"
                                                        name="post_code" placeholder="Post Code" placeholder="Post Code"
                                                        required>
                                                </div>


                                             

                                        </div>

                                        <!-- guest-login -->

                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">

											<div class="form-group">
												<h5><b>Division Select </b> <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="division_id" class="form-control" required="" >
														<option value="" selected="" disabled="">Select Division</option>
														@foreach($divisions as $item)
											 <option value="{{ $item->id }}">{{ $item->division_name }}</option>	
														@endforeach
													</select>
													@error('division_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
													 </div> <!-- // end form group -->
											
											
													 <div class="form-group">
												<h5><b>District Select</b>  <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="district_id" class="form-control" required="" >
														<option value="" selected="" disabled="">Select District</option>
											
													</select>
													@error('district_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
													 </div> <!-- // end form group -->
											
											
													 <div class="form-group">
												<h5><b>State Select</b> <span class="text-danger">*</span></h5>
												<div class="controls">
													<select name="state_id" class="form-control" required="" >
														<option value="" selected="" disabled="">Select State</option>
											
													</select>
													@error('state_id') 
												 <span class="text-danger">{{ $message }}</span>
												 @enderror 
												 </div>
													 </div> <!-- // end form group -->
											
											
												<div class="form-group">
												 <label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
													 <textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
												  </div>


            
                                            



                                        </div>
                                       
                                        <!-- already-registered-login -->

                                    </div>
                                </div>
                                <!-- panel-body  -->

                            </div><!-- row -->
                        </div>
                        <!-- checkout-step-01 End -->






                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                </div>
                                <div class="">

                                    <ul class="nav nav-checkout-progress list-unstyled">

                                        @foreach ($carts as $item)
                                            <li>
                                                <strong>Image:</strong>
                                                <img src="{{ asset($item->options->image) }}"
                                                    style="height:50px; wight:50px;" alt="">
                                            </li>
                                            <li><strong>Qty:</strong>{{ $item->qty }}</li>
                                            <li><strong>Color:</strong>{{ $item->options->color }}</li>
                                            <li><strong>Size:</strong>{{ $item->options->size }}</li>
                                            <hr>
                                        @endforeach

                                        <li>
                                            @if (Session::has('coupon'))
                                                <strong>SubTOtal:</strong>{{ $cart_total }}
                                                <hr>
                                                <strong>Coupon:</strong>{{ Session::get('coupon')['coupon_name'] }}
                                                ({{ Session::get('coupon')['coupon_amount'] }})%
                                                <hr>
                                                <strong>Discount
                                                    Amount:</strong>{{ Session::get('coupon')['discount_amount'] }}
                                                <hr>
                                                <strong>Grand
                                                    Total:</strong>{{ Session::get('coupon')['total_amount'] }}
                                                <hr>


                                            @else
                                                <strong>SubTOtal:</strong>{{ $cart_total }}
                                                <hr>
                                                <strong>GrandTotal:</strong>{{ $cart_total }}
                                                <hr>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>










                <!--Select payment Methood-->
                
                
                
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Select Payment methood</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Stripe</label>
                                        <input type="radio" name="payment_method" value="stripe">
                                        <img src="{{ asset('frontend/assets/images/payments/2.png') }}" alt="">

                                    </div> <!--End col-md-4-->

                                    
                                    <div class="col-md-4">

                                        <label for="">Card</label>
                                        <input type="radio" name="payment_method" value="card">
                                        <img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt="">

                                    </div> <!--End col-md-4-->
                                    
                                    
                                    <div class="col-md-4">

                                        <label for="">Cash</label>
                                        <input type="radio" name="payment_method" value="cash">
                                        <img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">

                                    </div> <!--End col-md-4-->

                                   
                                </div><!--End Row-->

                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Proceed</button>
                            </div>
                        </div>
                    </div>
                  
                </div>
                  <!-- checkout-progress-sidebar -->

                    <!--ENd Payemt Process--->


                </form>
                
                
   
                
              


            </div><!-- /.row -->
        </div><!-- /.checkout-box -->



    </div><!-- /.body-content -->



    <script>
        $(document).ready(function() {
            
            $('select[name="division_id"]').on('change', function() {
                
                $('select[name="district_id"]').empty();
                $('select[name="state_id"]').empty();
                var division_id = $(this).val();
               // alert(division_id);
                if (division_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('division/find/formdistrict') }}/" + division_id,
                        dataType: "json",
                        success: function(data) {
                            
                            var d = $('select[name="district_id"]').empty();
                            $.each(data, function(key, value) {

                                $('select[name="district_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .district_name + '</option>');

                            });
                        },
                    });
                } else {
                    
                    alert('error');
                }


            });



            $('select[name="district_id"]').on('change', function () { 
            
            var district_id= $('select[name="district_id"]').val();


          if(district_id){
            
   
            $.ajax({
                type: "GET",
                url: "{{ url('getstate/from/district') }}/" +district_id,
                dataType: "json",
                success: function (response) {
                    var d =$('select[name="state_id"]').empty();
                    $.each(response, function (key, value) { 


                        $('select[name="state_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .state_name + '</option>');
                        
                    });
                   
                },
            });//end ship_state ajax function

          }
          else{
              alert('error');
          }
        
           
       });


         
           
        });

  
       



    </script>






@endsection
