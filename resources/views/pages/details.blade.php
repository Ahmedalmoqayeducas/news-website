@extends('layouts.parent')
@section('content')
<div class="container">
    {{-- @dd($data->title) --}}
    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{ $data->title }}

    </h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">{{ $data->title }} deatiles</li>
    </ol>

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{ asset('news/img/'.$data->image) }}" alt="">

            <hr>

            <!-- Date/Time -->
            {{-- there is an trick you dont solve it --}}
            <p> Posted on {{ \Carbon\Carbon::parse($data->created_at)->format('F j, Y \a\t g:i A') }}</p>

            <hr>

            <!-- Post Content -->
            <p class="lead">
                {{ $data->description }}
            </p>
            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Single Comment -->
            {{-- make a comment page --}}
            <!-- Comment with nested comments -->
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                  <h5 class="mt-0">Commenter Name</h5>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                  <div class="media mt-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                      <h5 class="mt-0">Commenter Name</h5>
                      Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                  </div>

                

                </div>
              </div>

            </div>

        </div>


    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

@endsection
