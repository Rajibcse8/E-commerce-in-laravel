@extends('frontend.frontend_master')
@section('content')

p

    <div class="body-content">
        <div class="container">
            <div class="row">
                  
                @include('frontend.common.common_sidebar_user')
                <!--end col-md 2-->

                <div class="col-md-2">


                </div>
                <!--end col-md 2-->

                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center">
                            <strong>Hi </strong>
                            <span class="text-danger">{{ Auth::user()->name }}</span>
                            <strong>Upadete Your Password</strong>
                        </h3>
                        <div class="card-body">
                            <form action="{{ route('user.password.update') }}" method="post" >
                                @csrf

                                <div class="form-group">
                                    <h5>Current Password<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="oldpassword" class="form-control" id="current_password" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Enter new  Password<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password" class="form-control"id="password"  required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <h5>Confirm Password<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                                    </div>
                                </div>
                              


                                .<div class="form-group">
                                    <input type="submit" class="btn btn-danger" value="Update">
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
                <!--end col-md 2-->

            </div>
            <!--end row-->
        </div>
    </div>


@endsection
