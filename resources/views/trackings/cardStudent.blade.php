@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1>Listado de usuarios</h1> --}}
@stop

@section('content')
    <div class="container">
        <div class="team-single">
            <div class="row">
                <div class="col-lg-4 col-md-5 xs-margin-30px-bottom d-flex flex-column align-items-center ">
                    <div class="team-single-img">
                        {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt=""> --}}
                        <img src="{{ asset('storage/avatar/' . $avatar) }}" alt="Avatar del usuario" id="avatar">
                    </div><br>
                    <ul class="list-style9 no-margin">
                        <li> <a href="{{ route('students.edit', $student->id) }}" class="form-btn">Modificar información</a>
                        </li>
                        {{-- <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li> --}}
                    </ul>
                    {{-- <div class="bg-light-gray padding-30px-all md-padding-25px-all sm-padding-20px-all text-center">
                    <h4 class="margin-10px-bottom font-size24 md-font-size22 sm-font-size20 font-weight-600">{{ $roles }}</h4>                    <p class="sm-width-95 sm-margin-auto">We are proud of child student. We teaching great activities and best program for your kids.</p>
                    <div class="margin-20px-top team-single-icons">
                    </div>
                </div> --}}
                </div>


                <div class="col-lg-8 col-md-7">
                    <div class="team-single-text padding-50px-left sm-no-padding-left">
                        <h4 class="font-size38 sm-font-size32 xs-font-size30">{{ $student->name }} {{ $student->apellidos }}
                        </h4>
                        <hr>
                        {{-- <p class="no-margin-bottom">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit
                            voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                            inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. aut odit aut fugit,
                            sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro
                            quisquam est, qui dolorem ipsum voluptatem.</p> --}}
                        <div class="contact-info-section margin-40px-tb">
                            <ul class="list-style9 no-margin">
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-mobile-alt text-purple"></i>
                                            <strong class="margin-10px-left xs-margin-four-left text-purple">CV:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            @if ($student->subir_cv)
                                                <a href="{{ asset('storage/' . $student->subir_cv) }}" target="_blank">Ver
                                                    CV</a>
                                            @else
                                                <p>No se ha subido ningún CV.</p>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-envelope text-pink"></i>
                                            <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p><a href="javascript:void(0)">{{ $student->email }}</a></p>
                                        </div>
                                    </div>
                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-graduation-cap text-orange"></i>
                                            <strong class="margin-10px-left text-orange">Teléfono móvil:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{ $student->telefono_movil }}</p>
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="far fa-gem text-yellow"></i>
                                            <strong class="margin-10px-left text-yellow">Curso:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{ $course->nombre }}</p>
                                        </div>
                                    </div>

                                </li>
                                <li>

                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="far fa-file text-lightred"></i>
                                            <strong class="margin-10px-left text-lightred">Empresa de prácticas:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            @if ($student->company)
                                                <p>{{ $student->company->nombre }}</p>
                                            @else
                                                <p>Sin empresa asignada.</p>
                                            @endif
                                        </div>
                                    </div>

                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-map-marker-alt text-green"></i>
                                            <strong class="margin-10px-left text-green">Dirección de empresa:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>MODIFICAR</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-map-marker-alt text-green"></i>
                                            <strong class="margin-10px-left text-green">Fecha inicio prácticas:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{ $student->fecha_inicio_fct }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-map-marker-alt text-green"></i>
                                            <strong class="margin-10px-left text-green">Fecha fin prácticas:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            <p>{{ $student->fecha_fin_fct }}</p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-5">
                                            <i class="fas fa-map-marker-alt text-green"></i>
                                            <strong class="margin-10px-left text-green">Tutor asignado:</strong>
                                        </div>
                                        <div class="col-md-7 col-7">
                                            @if ($tutor && $tutor->name)
                                                <p>{{ $tutor->name }}</p>
                                            @else
                                                <p>Sin tutor asignado.</p>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        {{-- <h5 class="font-size24 sm-font-size22 xs-font-size20">Professional Skills</h5>

                        <div class="sm-no-margin">
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-7">Positive Behaviors</div>
                                    <div class="col-5 text-right">40%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress">
                                <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                    style="width:40%" class="animated custom-bar progress-bar slideInLeft bg-sky"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-7">Teamworking Abilities</div>
                                    <div class="col-5 text-right">50%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress">
                                <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                    style="width:50%" class="animated custom-bar progress-bar slideInLeft bg-orange"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-7">Time Management </div>
                                    <div class="col-5 text-right">60%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress">
                                <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                    style="width:60%" class="animated custom-bar progress-bar slideInLeft bg-green"></div>
                            </div>
                            <div class="progress-text">
                                <div class="row">
                                    <div class="col-7">Excellent Communication</div>
                                    <div class="col-5 text-right">80%</div>
                                </div>
                            </div>
                            <div class="custom-progress progress">
                                <div role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                                    style="width:80%" class="animated custom-bar progress-bar slideInLeft bg-yellow">
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>

                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="css/users/user.css">
    <link rel="stylesheet" type="text/css" href="/css/student.css">
    <link rel="stylesheet" href="css/student/cardStudent.css">


@stop

@section('js')

@stop
