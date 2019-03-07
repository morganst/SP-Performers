@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
      <head>
            <title>Add Student to Class</title>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      </head>
      <body>
            <div class="daily-survey-container">
            <h3>Add Student to Class: {{$cla->name}}</h3>
            <p>at: {{$cla->location}} ({{$cla->time}})</p>
            <input type="text" name="serach" id="serach" class="form-control" placeholder="Search"/>
            <br><br>
            <table style="width:100%">
                  <thead>
                        <th style="width:50%" class="sorting" data-sorting_type="desc" data-column_name="fullName" style="cursor: pointer">Name<span id="fullName_icon"></span></th>
                        <th style="width:50%">Add to Class</th>
                  </thead>
                  <tbody id="t01">
                        @include('Classes.addStudentData')
                  </tbody>
                  </table>
                        <h3>Students in Class</h3>
                <table width="100%">
                    <thead>
                        <th width="50%">Name</th>
                        <th width="50%">Remove from Class</th>
                    </thead>
                    <tbody>
                @foreach($cla->student as $student)
                <tr>
                        <td>{{$student->fullName}}</td>
                        <td style="display: block; margin: auto; width: 150px">{!!Form::open(['action' => ['ClassController@detachStudent', $cla->id, $student->id], 'method' => 'POST', 'class' => ''])!!}
                                    {{Form::submit('Remove from Class', ['class' => 'form-control-right button', 'style' => 'height: 30px; padding: 5px'])}}
                        {!!Form::close()!!}</td>
                </tr>
                @endforeach
                    <tbody>
                      </table>
                      <br>
                  </div>
                  <br>
                  <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                  <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
                  <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                  @php echo '<input type="hidden" name="id" value="'.$id.'">'@endphp
            </body>
      <script>
            $(document).ready(function(){
            
            function clear_icon()
            {
            $('#fullName_icon').html('');
            }
            
            function fetch_data(page, sort_type, sort_by, query)
            {
            var id = <?php echo json_encode($id) ?>;
            $.ajax({
            url:"/classes/"+id+"/addStudent/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
            success:function(data)
            {
            $('#t01').html('');
            $('#t01').html(data);
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