@extends('theme.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">IC Progress / Students</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Apply</a> --}}
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
                          <th scope="col">Remarks</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{$student->roll_no}}</td>
                                <td>{{$student->name}}</td>
                                <td>{{$student->department}}</td>
                                 @if ($student->pivot->department_clearance_status)
                                    <td><span class="badge rounded-pill bg-success" style="color: white;">Clreared</span></td>
                                @else
                                    <td><span class="badge rounded-pill bg-danger" style="color: white;">Not clear</span></td>
                                @endif
                                @if (!$student->pivot->department_clearance_status)
                                    <td>{{$student->pivot->remarks}}</td>
                                @else
                                    <td></td>
                                @endif
                                @if ($student->pivot->department_clearance_status)
                                    <td><a href="{{route('icProgressUnclearStudentStatus', ['id' => $student->id])}}" class="btn btn-danger btn-sm">Unclear</a></td>
                                @else
                                    <td><a href="{{route('icProgressClearStudentStatus', ['id' => $student->id])}}" class="btn btn-success btn sm">Clear</a>
                                        <button type="button" class="btn btn-primary remarks" data-id="{{ $student->id }}" data-toggle="modal" data-target="#exampleModalCenter">
                                            Remarks
                                        </button></td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" id="remarksForm">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="remarks" id="remarks"
                               placeholder="Remarks" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
                <button id="submit" type="button" class="btn btn-primary btn-user">
                    Submit
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready( function () {
        $('#studentTable').DataTable();

        var studentId;
        $('.remarks').on('click', function () {
            studentId = $(this).data('id');
            console
        })
        $('#submit').on('click', function () {
            var data = $('#remarksForm').serialize()+'&id='+studentId
            $.ajax({

                url : `{!! route('icProgressSubmitRemarks') !!}`,
                type : 'GET',
                data : data,
                dataType:'json',
                success : function(data) {
                    $('#exampleModalCenter').modal('hide');
                },
                error : function(request,error)
                {
                    alert("Request: "+JSON.stringify(request));
                }
            });
        })
    });
</script>
@endsection
