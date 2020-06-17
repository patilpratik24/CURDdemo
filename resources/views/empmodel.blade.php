<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
</head>
<body>

{{-- Start Add Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please enter the following data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="{{ action('EmployeeController@store') }}" method="POST">
    {{ csrf_field() }}

      <div class="modal-body">
      
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
        </div>

        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="phno" class="form-control" placeholder="Enter Your Phone Number"> 
      </div>

       <div class="form-group">
          <label>Age</label>
          <input type="text" name="age" class="form-control" placeholder="Enter Your Age"> 
      </div>

      <div class="form-group">
          <label>City</label>
          <input type="text" name="city" class="form-control" placeholder="Enter Your City"> 
      </div>

     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save Data</button>
      </div>
    </form> 
    </div>
  </div>
</div>
{{-- End Add Modal --}}


{{-- Start Edit Modal --}}
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please enter the following data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="/users" method="POST" id="editForm">

    {{ csrf_field() }}
    {{ method_field('PUT')}}
      <div class="modal-body">
      
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name">
        </div>

        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="phno" id="phno" class="form-control" placeholder="Enter Your Phone Number"> 
      </div>

       <div class="form-group">
          <label>Age</label>
          <input type="text" name="age" id="age" class="form-control" placeholder="Enter Your Age"> 
      </div>

      <div class="form-group">
          <label>City</label>
          <input type="text" name="city" id="city" class="form-control" placeholder="Enter Your City"> 
      </div>

     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update Data</button>
      </div>
    </form> 
    </div>
  </div>
</div>
{{-- End Edit Modal --}}


{{-- Start Delete Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form action="/users" method="POST" id="deleteForm">
      {{ csrf_field() }}
      {{ method_field('DELETE')}}
      <div class="modal-body">
        <input type="hidden" name="-method" id="DELETE">
        <p>Are you sure you want to delete this data?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">DELETE</button>
      </div>
    </form> 
    </div>
  </div>
</div>
{{-- End Delete Modal --}}




  <div class="container">
    <h1>With Bootstrap modal</h1>
    @if(count($errors)>0)]

    <div class="alert alert-danger">
      <u1>
        @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
          </u1>
          </div>
        @endif

          @if(\Session::has('success'))
            <div class='alert alert-success'>
              <p>{{\Session::get('success')}}</p>
            </div>
          @endif

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Data 
         </button>

         <br><br>
         <table id='datatable' class="table table-bordered table-striped">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Phone Number</th>
              <th scope="col">Age</th>
              <th scope="col">City</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($emps as $empdata)
            <tr>
              <th>{{ $empdata->id}}</th>
              <td>{{ $empdata->name}}</td>
              <td>{{ $empdata->phno}}</td>
              <td>{{ $empdata->age}}</td>
              <td>{{ $empdata->city}}</td>
              <td>
                <a href="#" class="btn btn-success edit">EDIT</a>
                <a href="#" class="btn btn-danger delete">DELETE</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>


        </div>    




<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

  <script type='text/javascript'>

    $(document).ready(function(){

      var table = $('#datatable').DataTable();

      table.on('click', '.edit', function(){

        $tr = $(this).closest('tr');
        if($($tr).hasClass('child'))
        {
          $tr=$tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#name').val(data[1]);
        $('#phno').val(data[2]);
        $('#age').val(data[3]);
        $('#city').val(data[4]);

        $('#editForm').attr('action','/users/'+data[0]);
        $('#editModal').modal('show');
      });

      table.on('click','.delete', function (){

        $tr = $(this).closest('tr');
        if($($tr).hasClass('child'))
        {
          $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#id').val(data[0]);

        $('#deleteForm').attr('action','/users/'+data[0]);
        $('#deleteModal').modal('show');
       });  

    });
  </script>

  



</body>
</html>