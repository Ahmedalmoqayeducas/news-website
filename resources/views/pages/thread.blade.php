@extends('layouts.parent')
@section('content')
 <!-- Page Content -->
 <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{ $type  }} news

    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">{{ $type }}</li>
    </ol>
    @foreach ($data as $element)


    <!-- news title One -->
    <div class="row">
      <div class="col-md-7">
        {{-- <a href="#"><img class="card-img-top" src="img/2.jpg" alt=""></a> --}}
        <a href="{{ route('thread.details',$element['id']) }}">

          <img class="img-fluid full-width h-200 rounded mb-3 mb-md-0" src="img/1.jpg" alt="">
        </a>
      </div>
      <div class="col-md-5">
        <h3>{{ $element['title'] }}</h3>
        <p>{{ $element['description'] }}</p>
        <a class="btn btn-primary" href="{{ route('thread.details',$element['id']) }}">View news title
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>
    <!-- /.row -->

    <hr>
    @endforeach

    {{ $data->links() }}
  </div>
  <!-- /.container -->

@endsection
