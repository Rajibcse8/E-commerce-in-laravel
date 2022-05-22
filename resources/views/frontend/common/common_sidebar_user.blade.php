<div class="col-md-2"><br>
    <img src="{{ (!empty($data->profile_photo_path)) ?
     url('upload/user_images').'/'.$data->profile_photo_path : url('upload/no_image.jpg')  }}" 
     class="card-img-top" style="border-radius=50%" height="100px" widht="100px">
     <ul class="list-group list-group-flush"><br>
         <a href="{{ route('home') }}" class="btn btn-primary btn-sm btn-block">Home</a>
         <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
         <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
         <a href="{{ route('my.order') }}" class="btn btn-primary btn-sm btn-block">Orders</a>
         <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">logout</a>


     </ul>
  </div><!--end col-md 2-->