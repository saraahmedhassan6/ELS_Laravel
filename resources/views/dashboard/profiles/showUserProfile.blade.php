@extends('dashboard.layouts.master')

@section('dashCss')
<link rel="stylesheet" href="{{URL::asset('assets/CSS/dashboard/profile.css')}}" rel="stylesheet" />
@endsection

@section('dashContent')
    <h1 class="headerOne">Profile</h1>
    <h5 class="headerFive">Update Profile</h5>
    <form action="/Profile/update" method="post" autocomplete="off" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="AddImgDiv">
            <img id="previewImageProfile" src="{{ asset('assets/Uploads/' . $roleFolder . '/' . $profile->photo) }}" alt="Preview">
            <br>
            <div class="form-group">
                <input type="file" id="photo" name="photo" style="display: none;">
                <label for="photo" class="EditPhotoLabelProfile">
                    Edit
                </label>
            </div>
        </div>
        <div class="AddInputDivProfile">
            <div class="form-group">
                <input type="hidden" class="form-control" id="id" name="id" value="{{$profile->id}}" >
                <label for="SSN" class="AddLabel">SSN</label>
                <input type="text" class="form-control" id="SSN" name="SSN" value="{{$profile->SSN}}" required>
            </div>
            <div class="form-group">
                <label for="Fname" class="AddLabel">First Name</label>
                <input type="text" class="form-control" id="Fname" name="Fname" value="{{$profile->Fname}}" required>
            </div>
            <div class="form-group">
                <label for="Lname" class="AddLabel">Last Name</label>
                <input type="text" class="form-control" id="Lname" name="Lname" value="{{$profile->Lname}}" required>
            </div>
            <div class="form-group">
                <label for="email" class="AddLabel">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$profile->email}}" required>
            </div>
            <div class="form-group">
                <label for="password" class="AddLabel">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{$profile->password}}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary SubmitProfile" >Save</button>
    </form>
@endsection

@section('dashJS')
    <script>
        window.addEventListener('DOMContentLoaded', function() {
            var imgElement = document.getElementById('previewImageProfile');
            imgElement.style.display = 'block';
        });

        document.getElementById('photo').addEventListener('change', function(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var imgElement = document.getElementById('previewImageProfile');
                imgElement.src = reader.result;
                imgElement.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        });
    </script>
@endsection