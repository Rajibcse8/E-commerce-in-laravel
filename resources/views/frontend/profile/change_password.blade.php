@extends('frontend.frontend_master')
@section('content')

p

    <div class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-2"><br>
                    <img src="{{ !empty($user->profile_photo_path) ? url('upload/user_images') . '/' . $user->profile_photo_path : url('upload/no_image.jpg') }}"
                        class="card-img-top" style="border-radius=50%" height="100px" widht="100px">
                    <ul class="list-group list-group-flush"><br>
                        <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">logout</a>


                    </ul>
                </div>
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
                            <form action="{{ route('user.profile.update') }}" method="POST" >
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
