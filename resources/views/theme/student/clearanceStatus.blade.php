@extends('theme.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Clearance Status</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Apply</a> --}}
</div>

<!-- Content Row -->
<div class="">
    <div class="card shadow">
        <div class="card-header">
            Clearance Status
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="studentTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th scope="col">Department Name</th>
                        <th scope="col">Clearance Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <td>{{$department->department_name}}</td>
                                @if ($department->pivot->department_clearance_status)
                                    <td><span class="badge rounded-pill bg-success">Clreared</span></td>
                                @else
                                    <td><span class="badge rounded-pill bg-danger">Not clear</span></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- <script>
    $(document).ready( function () {
    $('#studentTable').DataTable();
    });
</script> --}}
@endsection
