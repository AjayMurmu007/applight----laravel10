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
                <h1 class="m-0 text-dark">Testimonial List</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Testimonial List</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <section class="content">
            <div class="container-fluid">
                @include('message')

                <a href="{{ url('admin/testimonial/add')}}" class="btn btn-primary" style="margin-bottom: 15px"> Add Testimonial </a>


                <div class="row">
                    <section class="col-lg-12">
                      <div class="card">
                        <div class="card-header">
  
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th> Id</th>
                                <th> Image</th>
                                <th> Name</th>
                                <th> Position Name</th>
                                <th> Description</th>
                                <th> Action </th>
                              </tr>
                            </thead>
                            <tbody>
  
                              @foreach ($getRecord as $value)
                                  
                              <tr>
                                <td> {{ $value->id }} </td>
                                <td>
                                  @if(!@empty($value->image))
                                      <img src="{{ url('public/testimonial/'. $value->image)}}" style="height: 80px; width:80px">
                                  @endif
                                </td>
                                <td> {{ $value->name }} </td>
                                <td> {{ $value->position_name }} </td>
                                <td> {{ $value->discription }} </td>
                                <td>
                                  <a href="{{ url('admin/testimonial/edit/'. $value->id)}}" class="btn btn-primary">Edit</a>
  
                                  <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('admin/testimonial/delete/'. $value->id) }}" class="btn btn-danger"> Delete </a>
                                </td>
                              </tr>
  
                              @endforeach
  
                            </tbody>
  
                          </table>
  
                        </div>
                      </div>
                    </section>
                </div>


            </div>
        </section>






        
    </div>
    <!-- /.content-wrapper -->

@endsection