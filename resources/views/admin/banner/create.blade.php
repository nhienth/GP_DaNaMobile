@extends('admin.layouts.master')
@section('main')



<div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Form Layouts</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Forms</a>
                                    </li>
                                    <li class="breadcrumb-item active"><a href="#">Form Layouts</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic Horizontal form layout section start -->
                <section id="basic-horizontal-layouts">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Horizontal Form</h4>
                                </div>
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="first-name">First Name</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="text" id="first-name" class="form-control" name="fname" placeholder="First Name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="email-id">Email</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="email" id="email-id" class="form-control" name="email-id" placeholder="Email" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="contact-info">Mobile</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="number" id="contact-info" class="form-control" name="contact" placeholder="Mobile" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-2">
                                                        <label class="col-form-label" for="password">Password</label>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <input type="password" id="password" class="form-control" name="password" placeholder="Password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-10 offset-sm-2">
                                                <div class="mb-1">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customCheck1" />
                                                        <label class="form-check-label" for="customCheck1">Remember me</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-10 offset-sm-2">
                                                <button type="reset" class="btn btn-primary me-1">Submit</button>
                                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </section>
                <!-- Basic Horizontal form layout section end -->



                <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Single File Upload</h4>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        By default, dropzone is a multiple file uploader and does not have specific option allowing us to switch to
                                        single file uploading mode, but this functionality can be achieved by adding more options to the plugin
                                        settings, such as
                                        <code>maxfilesexceeded</code> callback and <code>maxFiles</code> option set to 1.
                                        <code>maxFiles: 1</code> is used to tell dropzone that there should be only one file.
                                    </p>
                                    <form action="#" class="dropzone dropzone-area" id="dpz-single-file">
                                        <div class="dz-message">Drop files here or click to upload.</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
    </div>


    @endsection