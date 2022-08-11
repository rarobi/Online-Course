@extends('admin.newlayout.layout',['breadcom'=>['Courses','Instructor']])
@section('title')
    Instructor Info
@endsection
@section('page')
    <div class="card">
        <div class="card-body">
            <div class="tabs">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#list" data-toggle="tab"> Instructors </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#newitem" data-toggle="tab"> New Instructor</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="list" class="tab-pane active">
                        <table class="table table-bordered table-striped mb-none" id="datatable-details">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> Name</th>
                                <th> Email</th>
                                <th> Gender</th>
                                <th> Mobile Edication</th>
                                <th> Speciality</th>
                                <th> Status</th>
                                <th> Address</th>
                                <th> Image</th>
                                <th>{{ trans('admin.th_controls') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->email }}</td>
                                    <td class="text-center">{{ $list->gender }}</td>
                                    <td class="text-center">{{ $list->education }}</td>
                                    <td class="text-center">{{ $list->speciality }}</td>
                                    <td class="text-center">
                                        @if($list->is_active)
                                            Active
                                        @else
                                            In-active
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $list->address }}</td>
                                    <td class="text-center">
                                        @if($list->image)
                                        <img src="/uploads/instructor_images/{{ $list->image }}" id="profilePhotoViewer" width="50" style="height:50px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin/content/instructor-edit/{{ $list->id }}" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="#" data-href="/admin/content/instructor-delete/{{ $list->id }}" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="newitem" class="tab-pane ">
                        <form method="post" action="/admin/content/instructor-store" class="form-horizontal form-bordered" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="" required class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" value="" required class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Gender</label>
                                <div class="col-md-6">
                                    <select name="gender" class="form-control">
                                        <option value=""> Select an option</option>
                                        <option value="male"> Male</option>
                                        <option value="female"> Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Mobile</label>
                                <div class="col-md-6">
                                    <input type="text" name="mobile" required placeholder="Enter Mobile" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Education Qualification</label>
                                <div class="col-md-6">
                                    <input type="text" name="education" required placeholder="Enter Qualification" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Speciality</label>
                                <div class="col-md-6">
                                    <input type="text" name="speciality" required placeholder="Enter Speciality" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Status</label>
                                <div class="col-md-6">
                                    <select name="status" class="form-control">
                                        <option value=""> Select an option</option>
                                        <option value="1"> Active</option>
                                        <option value="0"> In-active</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Address</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" required placeholder="Enter Address" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Photo</label>
                                <div class="col-md-6">
                                    <span id="photo_err1" class="text-danger" style="font-size: 15px;"></span>
                                    <div>
                                        <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer1" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        
                                    </div>
                                    <br>
                                    <label class="btn btn-primary btn-sm">
                                        <input onchange="changePhoto(this)" type="file" name="photo" style="display: none">
                                        <i class="fa fa-image"></i> Upload photo
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-6">
                                    <button class="btn btn-primary" type="submit">{{ trans('admin.save_changes') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
         function changePhoto(input) {
            if (input.files && input.files[0]) {
                $("#photo_err1").html('');
                var mime_type = input.files[0].type;
                if(!(mime_type=='image/jpeg' || mime_type=='image/jpg' || mime_type=='image/png')){
                    $("#photo_err1").html("Image format is not valid. Only PNG or JPEG or JPG type images are allowed.");
                    return false;
                }
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#profilePhotoViewer1').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
