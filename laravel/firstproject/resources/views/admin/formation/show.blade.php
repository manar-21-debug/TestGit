{{-- @extends('layout.master')
@section('content')
<div class="app-main__outer">



    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-car icon-gradient bg-mean-fruit">
                            </i>
                    </div>
                    <div>Analytics Dashboard
                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                            <i class="fa fa-star"></i>
                        </button>
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                    <i class="fa fa-business-time fa-w-20"></i>
                                </span>
                                Buttons
                            </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                                Inbox
                                            </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                                Book
                                            </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                                Picture
                                            </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                                File Disabled
                                            </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <div class="container" id="app">


            <div class="col-md-12">
                {{-- <h1>@{{ message }}</h1> --}}
                {{-- <div class="card bg-primary">
                    <div class="card-header">
                        <div class="col-md-10"><h3 class="card-header">Experience</h3></div>

                        <div class="col-md-2">
                            <button class="btn btn-success  pull-right">Ajouter</button>
                        </div>

                        </div>
                        <div class="card-body">
                           <div class="list-group">
                               <div class="list-group-item">
                                   <div class="pull-right">
                                       <button class="btn btn-warning btn-sm">Editer</button>
                                   </div>
                                   <div class="widget-heading">Description: {{ $formation->description }}</div>
                                   <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus alias repellat quam quas hic sint, eius saepe minus, consequuntur doloribus nostrum optio! Ea quae, ipsum explicabo nobis quisquam facilis deleniti delectus reiciendis, quidem numquam nostrum porro, recusandae ex. Dolore, autem debitis! Fuga, tempore nemo quasi iure molestiae mollitia nihil. Culpa?</p>
                                   <small>01/07/2020 - 30/08/2020</small>
                               </div>
                           </div>
                           <div class="list-group">
                               <div class="list-group-item">
                                   <div class="pull-right">
                                       <button class="btn btn-warning btn-sm">Editer</button>
                                   </div>
                                   <h3>Lorem ipsum dolor sit amet consectetur.</h3>
                                   <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus alias repellat quam quas hic sint, eius saepe minus, consequuntur doloribus nostrum optio! Ea quae, ipsum explicabo nobis quisquam facilis deleniti delectus reiciendis, quidem numquam nostrum porro, recusandae ex. Dolore, autem debitis! Fuga, tempore nemo quasi iure molestiae mollitia nihil. Culpa?</p>
                                   <small>01/07/2020 - 30/08/2020</small>
                               </div>
                           </div>
                           <div class="list-group">
                               <div class="list-group-item">
                                   <div class="pull-right">
                                       <button class="btn btn-warning btn-sm">Editer</button>
                                   </div>
                                   <h3>Lorem ipsum dolor sit amet consectetur.</h3>
                                   <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus alias repellat quam quas hic sint, eius saepe minus, consequuntur doloribus nostrum optio! Ea quae, ipsum explicabo nobis quisquam facilis deleniti delectus reiciendis, quidem numquam nostrum porro, recusandae ex. Dolore, autem debitis! Fuga, tempore nemo quasi iure molestiae mollitia nihil. Culpa?</p>
                                   <small>01/07/2020 - 30/08/2020</small>
                               </div>
                           </div>

                        </div>
                    </div>
                </div>


</div>

@endsection
@section('javascripts') --}}
{{-- <script src="{{ url('/') }}/js/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data:  {
            message: 'je suis ayy...    '
        },
        methods: {
            getExperiences: function() {
                axios.get('http://localhost:8080/getexperiences')
                .then(response => {
                    console.log('success : ', response)
                })
                .catch(error=> {
                    console.log('errors : ', error);
                })
            }
        },
        mounted:function(){
            this.getExperiences();
        }
    })

</script> --}}



@endsection --}}
