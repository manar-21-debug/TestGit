@extends('layout.master')
@section('content')

<div class="app-main__outer">
                <div class="app-main__inner">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>Edit Formation</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body">
                                            <h5 class="card-title">Formation Details</h5>
                                            <form method="post" enctype="multipart/form-data" action="{{ route('update.formation',$formation->id) }}" id="formAjax"
                                            data-redirect="{{ route('index') }}" enctype="multip">

                                                @csrf

                                                <div class="position-relative form-group"><label for="exampleEmail1" class="">Title</label><input name="name" id="exampleEmail1" placeholder="" type="text" class="form-control" required value="{{$formation->name}}" ></div>



                                                <div class="position-relative form-group"><label for="exampleEmail" class="">Price</label><input name="price" id="exampleEmail" placeholder="" type="text" class="form-control" pattern="\d{1,5}" maxlength="5" required value="{{$formation->price}}"></div>

                                                <div class="position-relative form-group"><label for="exampleSelectMulti" class="">Number Of lessons</label><input type="text" name="numberlessons"  class="form-control" placeholder=""  pattern="\d{1,5}" maxlength="5" value="{{$formation->numberlessons}}"></div>


                                                <div class="position-relative form-group"><label for="exampleText" class="">Description</label><textarea name="description" id="exampleText" class="form-control"placeholder="" >{{$formation->description}}</textarea></div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date_start">Start Date </label>
                                                            <input type="date" name="date_start" id="date_start" class="form-control" placeholder="start">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date_end">End Date </label>
                                                            <input type="date" name="date_end" class="form-control" placeholder="end" value="{{ $formation->date_end}}">
                                                        </div>
                                                    </div>
                                                </div>
                                               <div class="position-relative form-group"><label for="exampleFile" class="" >Image</label><input name="photo" id="exampleFile" type="file" class="form-control-file p-3">
                                                <img  id="previewImg" class="img-fluid float-center" width="200" src="{{ url('../')}}/storage/app/{{ $formation->photo}}">
                                                </div>
                                                <button class="mt-1 btn btn-danger" id="buttonValide" name="buttonValide">Edit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                 <!--Copyright-->
    <div class="footer-copyright py-3 text-center bg-white text-black" >
        <div class="container-fluid">
          © 2020 Copyright: <a href="https://www.itspot.ma/"> itspot.ma</a>

        </div>
      </div>
      <!--/.Copyright-->





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



 var request;
            $('#formAjax').submit(function(event) {

                console.log("date value",$('#date_start').val());
                event.preventDefault();
                if (request) {
                    request.abort();
                }
                var $form = $(this);
                var $inputs = $form.find('input');
                var formData = new FormData($form[0]);
                var oldloginButtonVal = $('#buttonValide').text();
                $('#buttonValide').text('Login please wait ...');
                $inputs.prop('disabled', true);
                $('#buttonValide').prop('disabled', true);
                $('#message').prop('disabled', true);
                request = $.ajax({
                    url: $form.attr('action'),
                    type: $form.attr('method'),
                    processData: false,
                    contentType: false,
                    data: formData
                });
                request.done(function(response, textStatus, jqXHR) {

                    if (response.success){
                        swal('Success','Editing done !').then((value) => {
                            window.location.href = '{{ route('index') }}';
                            });

                    }
                    else {
                            swal('Error','Editing error !');
                    }
                });


                request.always(function() {
                    $inputs.prop('disabled', false);
                    $('#message').prop('disabled', false);
                    $('#buttonValide').prop('disabled', false);
                    $('#buttonValide').text(oldloginButtonVal);
                });
            });

    </script>



@endsection

