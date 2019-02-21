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
            <br />
            <div class="daily-survey-container">
            <h3>Student Notes:</h3>
            <input type="text" name="serach" id="serach" class="form-control" placeholder="Search"/>
            <br><br>
            <table style='border-spacing:0px'>
                  <thead>
                        <tr>
                        <th width="15%" class="sorting" data-sorting_type="desc" data-column_name="Type" style="cursor: pointer">Type<span id="type_icon"></span></th>
                        <th width="20%" class="sorting" data-sorting_type="desc" data-column_name="Instructor" style="cursor: pointer">Created By<span id="instructor_icon"></span></th>
                        <th width="20%"class="sorting" data-sorting_type="desc" data-column_name="fullName" style="cursor: pointer">Student</th>
                        <th width="15%" class="sorting" data-sorting_type="desc" data-column_name="Class" style="cursor: pointer">Class<span id="class_icon"></span></th>
                        <th width="15%" class="sorting" data-sorting_type="desc" data-column_name="created_at" style="cursor: pointer">Date<span id="date_icon"></span></th>
                        <th width="15%">Edit</th>
                        <tr>
                        <tr>
                              <td><br></td>
                        </tr>
                  </thead>
                  <tbody>
                        @include('Notes.index_data')
                  </tbody>
            </table>
            </div>
            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
            <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="NId" />
            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
      </body>
      <script>
            $(document).ready(function(){
            
            function clear_icon()
            {
            $('#date_icon').html('');
            $('#type_icon').html('');
            $('#instructor_icon').html('');
            $('#class_icon').html('');
            }
            
            function fetch_data(page, sort_type, sort_by, query, note)
            {
            $.ajax({
            url:"/index/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
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