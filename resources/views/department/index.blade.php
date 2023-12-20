@extends('department.base')
@section('action-content')
    <section class="content">
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8"><h3 class="box-title">List of Departments</h3></div>
                </div>
            </div>
            <div class="box-body">
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th width="10%" aria-label="ID: activate to sort column ascending">ID</th>
                                    <th width="20%" aria-label="Department: activate to sort column ascending">Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $department->id }}</td>
                                        <td>{{ $department->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                Showing 1 to {{ count($departments) }} of {{ count($departments) }} entries
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style type="text/css">
      tbody {
    font-weight: 500;
  }
    </style>
@endsection
