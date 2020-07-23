@extends('layout.master')
@section('content')

<div class="app-main__outer">
                <div class="app-main__inner">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>Create Formation</span>
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
                                            <form class="" method="post" action="{{ route('store.formation') }}" id="formAjax" name="formAjax"
                                            data-redirect="{{ route('index') }}" enctype="multip">
                                                @csrf

                                                <div class="position-relative form-group"><label for="exampleEmail1" class="">Title</label><input name="title" id="exampleEmail1" placeholder="" type="text" class="form-control" required ></div>
                                                <div class="position-relative form-group"><label for="exampleEmail" class="">Price</label><input name="price" id="exampleEmail" placeholder="" type="text" class="form-control" pattern="\d{1,5}" maxlength="5" required></div>
                                                <div class="position-relative form-group"><label for="exampleSelectMulti" class="">Number Of lessons</label><input type="text" name="numberlessons"  class="form-control" placeholder=""  pattern="\d{1,5}" maxlength="5"></div>
                                                <div class="position-relative form-group"><label for="exampleText" class="">Description</label><textarea name="description" id="exampleText" class="form-control"placeholder="" ></textarea></div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Start Date </label>
                                                            <input type="date" name="date_start" class="form-control" placeholder="start">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">End Date </label>
                                                            <input type="date" name="date_end" class="form-control" placeholder="end">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="position-relative form-group"><label for="exampleFile" class="">Image</label><input name="photo" id="exampleFile" type="file" class="form-control-file p-3">
                                                    <img  id="previewImg" class="img-fluid float-center" width="200" >

                                                </div>
                                                <button class="mt-1 btn btn-primary" id="buttonValide" name="buttonValide">Valide</button>

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
	var inputImg = this;
	if (inputImg.files && inputImg.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#previewImg').attr('src',e.target.result);
		};
		reader.readAsDataURL(inputImg.files[0]);
	}
});
        $(document).ready(function() {

            $('#formAjax input,#formAjax textarea,#formAjax radio,#formAjax number').keyup(function(event){

                $input=$(this);
                if($input.get(0).validity.valid == true){
                    $input.removeClass("is-invalid");
                    $input.addClass("is-valid");
                }
                else{
                    $input.removeClass("is-valid");
                    $input.addClass("is-invalid");
                    $input.parents('.form-group').find('.invalid-feedback').remove();
                    $input.after("<span class=\"invalid-feedback\" role=\"alert\">"+$input.get(0).validationMessage+"</span>");
                }
                if( $('#formAjax').get(0).checkValidity()== true){
                    $('#buttonValide').prop('disabled',false);
                }
                else{
                    $('#buttonValide').prop('disabled',true);
                }
            });
            var request;
            $('#formAjax').submit(function(event) {
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
                        console.log("success");
                        window.location.href = $('#formAjax').attr("data-redirect");

                    }
                    else {
                        $('#infoafter').html("<div class=\"alert alert-danger\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" >x</button> <strong> An error occurred during the process !</strong></div>");
                    }
                });


                request.always(function() {
                    $inputs.prop('disabled', false);
                    $('#message').prop('disabled', false);
                    $('#buttonValide').prop('disabled', false);
                    $('#buttonValide').text(oldloginButtonVal);
                });
            });
        });

    </script>



@endsection
