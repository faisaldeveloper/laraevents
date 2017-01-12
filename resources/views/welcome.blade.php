@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.

                    <p id="msg">{{$contents}}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('head-scripts')
<script src="{{ asset('bower_components/toastr/toastr.js') }}"></script>
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
 <script>  
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('798fcd5b3d015b38e9a4', {
      encrypted: true
    });
    var channel = pusher.subscribe('time_test');

    $(function () { //ready

    channel.bind('time', function(data) {
      //alert(data.message);
      $("#msg").text(data.message);
      toastr.info(data.message);
    });

    });
   /* toastr.options.preventDuplicates = true;
    toastr.options.closeButton = true;
    */   
  </script>
@endpush

@endsection
