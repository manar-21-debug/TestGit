@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img id="previewImg" src="{{url('/')}}/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">

            <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" id="exampleFile" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
        </div>
    </div>
</div>
@endsection


@section('customJS')
<script>
    $('#exampleFile').on("change", function(){
        console.log($(this).val());
	var inputImg = this;
	if (inputImg.files && inputImg.files[0]) {
        console.log("here");
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#previewImg').attr('src',e.target.result);
		};
		reader.readAsDataURL(inputImg.files[0]);
        console.log("here1");

	}
});

    </script>



@endsection





{{-- "/uploads/avatars/{{ $user->avatar }}" --}}
