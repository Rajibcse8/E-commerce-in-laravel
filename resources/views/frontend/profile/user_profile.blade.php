@extends('frontend.frontend_master')
@section('content')

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
                            <span class="text-danger">{{ Auth::user()->name }}</span>
                            <strong>Edit And Upadete Your Profile </strong>
                        </h3>
                        <div class="card-body">
                            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Name<span>*</span></label>
                                    <input type="text" class="form-control unicase-form-control text-input" id="name"
                                        name="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Email<span>*</span></label>
                                    <input type="eamil" class="form-control unicase-form-control text-input" id="email"
                                        name="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Phone
                                        Number<span>*</span></label>
                                    <input type="text" class="form-control unicase-form-control text-input" id="phone"
                                        name="phone" value="{{ $user->phone }}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title" for="exampleInputEmail1">Update Profile
                                        Picture<span>*</span></label>
                                    <input type="file" name="profile_photo_path">
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
