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
                <h1 class="m-0 text-dark">Contact Us List</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                  <li class="breadcrumb-item active">Contact Us List</li>
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
                    <section class="col-lg-12">
                        
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title"> Search Contact Us</h3>
                            </div>
                            
                            <form action="" method="get">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label for=""> ID </label>
                                            <input type="text" name="id" class="form-control" placeholder="Enter ID" value="{{ Request()->id }}">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for=""> Name </label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ Request()->name }}">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for=""> Email </label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ Request()->email }}">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for=""> Subject </label>
                                            <input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="{{ Request()->subject }}">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for=""> Message </label>
                                            <input type="text" name="message" class="form-control" placeholder="Enter Message" value="{{ Request()->message }}">
                                        </div>

                                        <div class="form-group col-md-2">
                                            <button class="btn btn-primary" type="submit" style="margin-top: 30px;"> Search </button>
                                            <a href="{{ url('admin/contact_us') }}" class="btn btn-success" style="margin-top: 30px;"> Reset </a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>

                      <div class="card">
                        <div class="card-header">
  
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th> Id</th>
                                <th> Name </th> 
                                <th> Email </th>
                                <th> Subject</th> 
                                <th> Message </th>                            
                                <th> Action </th>
                              </tr>
                            </thead>
                            <tbody>
  
                             @foreach ($getRecord as $value)

                             <tr>
                                <td> {{ $value->id }} </td>
                                <td> {{ $value->name }} </td>
                                <td> {{ $value->email }} </td>
                                <td> {{ $value->subject }} </td>
                                <td> {{ $value->message }} </td>
                                <td> <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('admin/contact_us/delete/'. $value->id) }}" class="btn btn-danger"> Delete </a> </td>
                             </tr>
                                 
                             @endforeach
  
                            </tbody>
  
                          </table>
  
                        </div>

                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                      </div>
                    </section>
                </div>


            </div>
        </section>






        
    </div>
    <!-- /.content-wrapper -->

@endsection