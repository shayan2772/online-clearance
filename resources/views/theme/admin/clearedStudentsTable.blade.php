@extends('theme.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin / Cleared Students</h1>
{{--         <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i--}}
{{--                class="fas fa-download fa-sm text-white-50"></i> Apply</a>--}}
    </div>

    <!-- Content Row -->
    <div class="">
        <div class="card shadow">
            <div class="card-header">
                Students
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="studentTable" class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">Roll number</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Student Department</th>
                            <th scope="col">Clearance Status</th>
                            <th scope="col">Certificate Downloaded</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($students as $student)
                                    <tr>
                                        <td>{{$student->roll_no}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->department}}</td>
                                        <td><span class="badge rounded-pill bg-success" style="color: white;">Clreared</span></td>
                                        @if($student->certificate_downloaded)
                                            <td><span class="badge rounded-pill bg-success" style="color: white;">Yes</span></td>
                                        @else
                                            <td><span class="badge rounded-pill bg-danger" style="color: white;">No</span></td>
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
    <script>
        $(document).ready(function () {
            $('#studentTable').DataTable();
        });
    </script>
@endsection
