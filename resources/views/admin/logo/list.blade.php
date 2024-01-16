
@extends('admin.layouts.app')


@section('content')
    



  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link">Logo</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
     
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Logo</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Logo</a></li>
              <li class="breadcrumb-item active">Logo</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    
    <section class="content">
        <div class="container-fluid">
            
            @include('message')

          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Logo Page</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form  method="POST" action="{{ url('admin/logo/post') }}" enctype="multipart/form-data">

                    {{ csrf_field() }}
                   
                  <div class="card-body">

                    <input type="hidden" name="id" value="{{ @$getRecord[0]->id }}">
                                       
                     
                    <div class="form-group">
                        <label> Logo <span style="color: red;">*</span> </label>
                        <input type="file" class="form-control"  name="logo">

                        @if($getRecord[0]->logo)
                            <img src="{{ url('public/logo/' . $getRecord[0]->logo) }}" width="150" height="150">
                        @endif

                    </div>
                      <div class="form-group">
                        <label> Fevicon Icon <span style="color: red;">*</span> </label>
                        <input type="file" class="form-control"  name="fevicon_icon">

                        @if($getRecord[0]->fevicon_icon)
                            <img src="{{ url('public/logo/' . $getRecord[0]->fevicon_icon) }}" width="150" height="150">
                        @endif
                                                           
                    
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" name="add_to_update" value="@if(count($getRecord)>0) Update @else Add @endif" class="btn btn-primary">
                         @if(count($getRecord)>0) Update @else Add @endif 
                    </button>
                    {{-- <button> subit </button> --}}
    
                    <a href="" class="btn btn-default float-right"> Cancel </a>
                  </div>

                </form>
              </div>
              <!-- /.card -->
  
            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



</div>
<!-- /.content-wrapper -->


@endsection