@extends('employees.base')

@section('action-content')
<section class="content">
  <div class="box">
    <div class="box-header">
      <div class="row">
        <div class="col-sm-8"><h3 class="box-title">List of employees</h3></div>
        <div class="col-sm-4">
          <a class="btn btn-primary" style="margin-left: 200px;" href="{{ route('employees.create') }}">Add new employee</a>
        </div>
      </div>
    </div>
    <div class="box-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="employees-table">
          <thead>
            <tr>
              <th>Employee Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Department</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($employees as $employee)
            <tr>
              <td>{{ ucfirst($employee->name)}}</td>
              <td>{{ $employee->email }}</td>
              <td>{{ $employee->phone_number }}</td>
              <td>{{ $employee->department->name }}</td>
              <td>
                <button type="button" class="btn btn-danger col-sm-3 col-xs-5 btn-margin delete-btn" data-id="{{ $employee->id }}">Delete</button>
                <a href="{{ route('employees.edit', ['id' => $employee->id]) }}" class="btn btn-primary col-sm-3 col-xs-5 btn-margin edit-btn">Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#employees-table').DataTable();

    $('.delete-btn').on('click', function () {
      var employeeId = $(this).data('id');
      Swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        customClass: 'swal-wide',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: 'GET',
            url: "{{ url('/employees/delete') }}/" + employeeId,
            data: {
              '_token': '{{ csrf_token() }}'
            },
            success: function (data) {
              Swal.fire('Deleted!',
                'Employee has been deleted.',
                'success'
                );
              location.reload();
            },
            error: function (data) {
              Swal.fire(
                'Error!',
                'There was an error deleting the employee.',
                'error'
                );
            }
          });
        }
      });
    });
  });
</script>
<style >
  .swal-wide {
    width: 300px;
    height: 250px;
  }
  div#swal2-html-container {
    font-size: 16px;
  }
  button.swal2-cancel.swal2-styled,button.swal2-confirm.swal2-styled {
    font-size: 12px;
  }
  .delete-btn, .edit-btn {
    width: 30%;
    padding: 2px 5px;
    color: #fff;
  }
  .table-responsive tbody {
    font-weight: 500;
  }
</style>
@endsection