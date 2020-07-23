@extends('layout.master')
@section('content')

<div class="app-main__outer">
    <div class="app-main__inner">
        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                    <span>Formation List</span>
                </a>
            </li>
        </ul>
        <div class="container-fluid">

                    <div class="row">
                      @foreach($formations as $formation)
                      <div class="col-xl-3 py-3" >

                        <div class="card shadow ">
                      <img src="{{ url('../')}}/storage/app/{{ $formation->photo}}" class="card-img-top" style="height: 10rem;width: 25.rem">
                               <div class="caption p-4">

                                <div class="card mb-3 widget-content bg-light-bloom">
                                    <div class="widget-content-wrapper text-dark">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">{{ $formation->name }} <br>By: {{ $formation->user->name }}</div>
                                            <div class="widget-heading" style="color: tomato">Price: {{ $formation->price }}</div>
                                            <div class="widget-heading">N° Of Lessons: {{ $formation->numberlessons }}</div>
                                            <div class="widget-heading" style="max-width: 290px" >Description: {{ $formation->description }}</div>

                                            <div class="widget-heading" style="color: #3f6ad8">Start Date: {{ $formation->date_start }}</div>
                                            <div class="widget-heading" style="color: #3f6ad8">End Date: {{ $formation->date_end }}</div>

                                            <div class="widget-heading">Created at: {{ $formation->created_at }}</div>
                                        </div>
                                        <div class="widget-content-right">
                                        </div>
                                    </div>
                                </div>
                                <p>
                                    <a href="{{ route('edit.formation',$formation->id) }}" class="btn btn btn-success">Edit</a>
                                    <a href="#" data-url="{{ route('delete.formation',$formation->id) }}" class="btn btn btn-danger DeleteBtn"><i class="fa fa-trash" style="font-size: 1.5em;"></i></a>

                                </p>
                                 </div>
                        </div>
                         </div>
                     @endforeach
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
    $('.DeleteBtn').click(function(){
     var deleteBTN = $(this);
     swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this formation !",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: 'GET',
                url: deleteBTN.attr('data-url'),
                success: function (data) {
                    swal('Success','Deleting done !').then((value) => {
                        window.location.href = '{{ route('index') }}';
                    });
                },
                error: function (data) {
                    swal('Error on deleting','Please try again !')
                },
            });
        }
        });

    });


    </script>
@endsection

@section('javascripts')


@endsection


