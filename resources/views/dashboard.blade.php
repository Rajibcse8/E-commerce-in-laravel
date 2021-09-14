@extends('frontend.frontend_master')
@section('content')

 <div class="body-content">
     <div class="container">
         <div class="row">
             <div class="col-md-2"><br>
               <img src="{{ (!empty($editData->profile_photo_path)) ?
                url('upload/admin_images').'/'.$editData->profile_photo_path : url('upload/no_image.jpg')  }}" 
                class="card-img-top" style="border-radius=50%" height="100px" widht="100px">
                <ul class="list-group list-group-flush"><br>
                    <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">logout</a>


                </ul>
             </div><!--end col-md 2-->

             <div class="col-md-2">


            </div><!--end col-md 2-->

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                        <span class="text-danger">{{ Auth::user()->name }}</span>
                        <strong>This is your Profile page</strong>
                    </h3>
                </div>


            </div><!--end col-md 2-->

         </div> <!--end row-->
     </div>
 </div>


@endsection











{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout> --}}
