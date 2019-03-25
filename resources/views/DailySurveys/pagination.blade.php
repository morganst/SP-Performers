@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
      <head>
            <title>Student Attendance</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      </head>
      <body>
      @if(isset($data[0]->classes['name']))
            <br>
            <div class="live-container">
            <h3>Student Attendance for: {{$data[0]->classes['name']}}</h3>
            <p>at: {{$data[0]->classes['location']}} ({{$data[0]->classes['time']}})</p>
      @else
            <br>
            <div class="live-container">
            <h3>Student Attendance</h3>
      @endif
            <input type="text" name="serach" id="serach" class="form-control" placeholder="Search"/>
            <br><br>
            <table width="100%">
                  <thead>
                        <tr>
                        <th width="30%">Name</th>
                        <th width="25%" class="sorting" data-sorting_type="desc" data-column_name="attend" style="cursor: pointer">Attend <span id="attend_icon"></span></th>
                        <th width="25%" class="sorting" data-sorting_type="desc" data-column_name="date" style="cursor: pointer">Date <span id="date_icon"></span></th>
                        <th width="20%">Remove</th>
                        </tr>
                  </thead>
                  <tbody>
                        @include('DailySurveys.pagination_data')
                  </tbody>
                  </table>
                  </div>
                  <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                  <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                  <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                  @php echo '<input type="hidden" name="id" value="'.$id.'">'@endphp
            </body>
      <script>
            $(document).ready(function(){
            
            function clear_icon()
            {
            $('#date_icon').html('');
            $('#fullName_icon').html('');
            $('#attend_icon').html('');
            }
            
            function fetch_data(page, sort_type, sort_by, query)
            {
            var id = <?php echo json_encode($id) ?>;
            $.ajax({
            url:"/"+id+"/pagination/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
            success:function(data)
            {
            $('tbody').html('');
            $('tbody').html(data);
            }
            })
            }
            
            $(document).on('keyup', '#serach', function(){
            var query = $('#serach').val();
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var page = $('#hidden_page').val();
            fetch_data(page, sort_type, column_name, query);
            });
            
            $(document).on('click', '.sorting', function(){
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = '';
            if(order_type == 'asc')
            {
            $(this).data('sorting_type', 'desc');
            reverse_order = 'desc';
            clear_icon();
            $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
            }
            if(order_type == 'desc')
            {
            $(this).data('sorting_type', 'asc');
            reverse_order = 'asc';
            clear_icon
            $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
            }
            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);
            var page = $('#hidden_page').val();
            var query = $('#serach').val();
            fetch_data(page, reverse_order, column_name, query);
            });
            
            $(document).on('click', '.pagination a', function(event){
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            
            var query = $('#serach').val();
            
            $('li').removeClass('active');
                  $(this).parent().addClass('active');
            fetch_data(page, sort_type, column_name, query);
            });
            
            });
            </script>
      </html>
@endsection