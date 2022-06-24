@extends('theme.app')

@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Clearance Form</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Apply</a>
</div>

<!-- Content Row -->
<div class="">
    <div class="card shadow">
        <div class="card-header">
          Personal Information
        </div>
        <div class="card-body">
            <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="studentName"
                                id="studentName" placeholder="Student Name" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" name="fatherName"
                                id="fatherName" placeholder="Father Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" name="studentCNIC"
                                id="studentCNIC" placeholder="Student CNIC" required>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" name="contactNumber"
                                id="contactNumber" placeholder="Contact Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="address" id="address"
                            placeholder="Address" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button id="next" type="button" class="btn btn-primary btn-user">
                            Submit
                        </button>
                    </div>
                
                {{-- <div id="form2" class="d-none">
                    <div class="form-group ml-1">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember
                                Me</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 d-flex justify-content-start">
                            <button id="back" type="button" class="btn btn-primary btn-user">
                                Back
                            </button>
                        </div>
                        <div class="col-sm-6 d-flex justify-content-end">
                            <button id="back" type="submit" class="btn btn-success btn-user">
                                Submit
                            </button>
                        </div>
                    </div>
                </div> --}}
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // $('#next').on('click', function () {
    //     $('#form1').addClass('d-none');
    //     $('#form2').removeClass('d-none');
    //     $('.card-header').html('Deparments');
    // });

    // $('#back').on('click', function () {
    //     $('#form2').addClass('d-none');
    //     $('#form1').removeClass('d-none');
    //     $('.card-header').html('Personal Information');
    // });
</script>
@endsection
