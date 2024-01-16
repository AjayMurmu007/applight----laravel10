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
        <a href="" class="nav-link">Home</a>
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
                <h1 class="m-0 text-dark">About</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active">About</li>
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
                      <h3 class="card-title">About Page</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form  method="POST" action="{{ url('admin/about/post') }}" enctype="multipart/form-data">
    
                        {{ csrf_field() }}
                       
                      <div class="card-body">
    
                        <input type="hidden" name="id" value="{{ @$getRecord[0]->id }}">
                                           
                        <div class="form-group">
                          <label>Title <span style="color: red;">*</span></label>
                          <input type="text" class="form-control" required name="title" value="{{ @$getRecord[0]->title }}">
                          <span style="color: red;"> {{ $errors -> first('title') }} </span>
                        </div>
                        
                        <div class="form-group">
                            <label>Discription<span style="color: red;"></span> </label>
                            <textarea type="text" class="form-control" name="discription" cols="10" rows="5"> {{ @$getRecord[0]->discription }} </textarea>
                            <span style="color: red;"> {{ $errors -> first('discription') }} </span>
                        </div>  

                        <div class="form-group">
                            <label>Title One<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" required name="title_one" value="{{ @$getRecord[0]->title_one }}">
                            <span style="color: red;"> {{ $errors -> first('title_one') }} </span>
                        </div>
                        
                        <div class="form-group">
                            <label>Discription One<span style="color: red;"></span> </label>
                            <textarea type="text" class="form-control" name="discription_one" cols="10" rows="5"> {{ @$getRecord[0]->discription_one }} </textarea>
                            <span style="color: red;"> {{ $errors -> first('discription_one') }} </span>
                        </div> 
                        
                        <div class="form-group">
                            <label>Title Two<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" required name="title_two" value="{{ @$getRecord[0]->title_two }}">
                            <span style="color: red;"> {{ $errors -> first('title_two') }} </span>
                        </div>
                        
                        <div class="form-group">
                            <label>Discription Two<span style="color: red;"></span> </label>
                            <textarea type="text" class="form-control" name="discription_two" cols="10" rows="5"> {{ @$getRecord[0]->discription_two }} </textarea>
                            <span style="color: red;"> {{ $errors -> first('discription_two') }} </span>
                        </div>

                        <div class="form-group">
                            <label>Title Three<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" required name="title_three" value="{{ @$getRecord[0]->title_three }}">
                            <span style="color: red;"> {{ $errors -> first('title_three') }} </span>
                        </div>
                        
                        <div class="form-group">
                            <label>Discription Three<span style="color: red;"></span> </label>
                            <textarea type="text" class="form-control" name="discription_three" cols="10" rows="5"> {{ @$getRecord[0]->discription_three }} </textarea>
                            <span style="color: red;"> {{ $errors -> first('discription_three') }} </span>
                        </div>
                        
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" name="admin_about_post" value="@if(count($getRecord)>0) Update @else Add @endif" class="btn btn-primary">
                            @if(count($getRecord)>0) Update @else Add @endif 
                       </button>
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