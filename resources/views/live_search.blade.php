@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@section('content')
  <br />
  <div class="container box">
      @if(session()->has('message'))
      <div class="alert alert-success">
          {{ session()->get('message') }}
      </div>
      @endif
   <div class="panel panel-default">
    <div class="panel-heading">Student Attendance</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Student Attendance" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Attendance</th>
         <th>Class</th>
         <th>Date</th>
         <th>Remove</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
    </div> 
   </div>
   <a href="/classes" style="float:right;" class="btn btn-primary" role="button" aria-pressed="true">Back</a><br>
  </div>
 </body>
</html>
@endsection
<script>
$(document).ready(function(){

 fetch_attend_data();

 function fetch_attend_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_attend_data(query);
 });
});
</script>