@extends('layouts.admin')

@section('page-title')
    Healthcare Staff Data
@endsection

@section('page-parent-route')
    Healthcare Staff
@endsection

@section('page-current-route')
    Index
@endsection

@section('page-desc')
    Page to manage healthcare staff data
@endsection

@section('page-content-title')
    <div class="row align-items-center">
        <div class="col-md">
            <h4 class="my-2 font-weight-bold text-dark"><i class="fa fa-fw fa-users-cog me-1"  style="color:#D8201C!important;"></i> Healthcare Staff Data </h4>
        </div>
        <div class="col-md text-end">
            <a href="javascript:;" onclick="show_hide_insert()" class="btn btn-sm btn-success"><i class="fa fa-fw fa-plus me-1"></i> Add Data</a>
        </div>
    </div>
@endsection

@section('page-content-body')

    <div class="row">
        <div class="col-12">
            <div id="insert-box">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <div class="col-md">
                                <h6 class="my-2 font-weight-bold text-dark">
                                    <i class="fa fa-fw fa-plus me-1"></i>
                                    Add Healthcare Staff Data
                                </h6>
                            </div>
                            <div class="col-md text-end my-auto">
                                <a href="javascript:;" onclick="show_hide_insert()" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-times"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.healthcare_staff.store') }}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Healthcare Centre</label>
                                        <select name="healthcare_centre_id" class="form-control @error('healthcare_centre_id') is-invalid @enderror select2">
                                            <option value="">-Choose-</option>
                                            @foreach ($data_healthcare_centre as $item)
                                                <option value="{{ $item->id }}" {{ (old('healthcare_centre_id') == $item->id) ? "selected" : "" }}>{{ $item->name . ' / ' . $item->address }}</option>
                                            @endforeach
                                        </select>
                                        @error('healthcare_centre_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Staff ID</label>
                                        <input type="text" class="form-control @error('staff_id') is-invalid @enderror" name="staff_id" value="{{ old('staff_id') }}">
                                        @error('staff_id')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                                        @error('name')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                                        @error('email')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="address" id="" cols="30" rows="10" class="form-control  @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                                        @error('address')<small class="invalid-feedback">{{ $message }}</small>@enderror

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Phone Number</label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}">
                                        @error('phone_number')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
                                        @error('username')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}">
                                        @error('password')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Password Confirmation</label>
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                        @error('password_confirmation')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                    <label>Image</label>
                                        <input type="file" class="form-control @error('myimg') is-invalid @enderror" name="myimg" value="{{ old('myimg') }}" id="myimg">
                                        @error('myimg')<small class="invalid-feedback">{{ $message }}</small>@enderror
                                    </div>
                                </div>
                                <div class="col-md-12 my-2">
                                    <img id="preview-myimg" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" alt="preview image" style="max-height: 400px;">
                                </div>
                            </div> --}}
                            <div class="text-end my-3">
                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-undo me-1"></i>Reset</button>
                                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-fw fa-paper-plane me-1"></i>Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered" id="datatables" width="100%" cellspacing="0">
                    <thead>
                        <th>#</th>
                        <th>Staff ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // $(document).ready(function() {
        //     // for display myimg
        //     $('#myimg').change(function(){
        //         let reader = new FileReader();
        //         reader.onload = (e) => {
        //         $('#preview-myimg').attr('src', e.target.result);
        //         }
        //         reader.readAsDataURL(this.files[0   ]);
        //     });
        // });

        @if ( ! $errors->any())
        $('#insert-box').hide();
        @endif
        function show_hide_insert() {
            $('#insert-box').toggle('fast', 'swing');
        }
        $('#datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.healthcare_staff.index') }}",
            columns: [
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'staff_id',
                    name: 'staff_id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [[ 0, "staff_id" ]]
        });

    </script>
@endsection