@extends('admin.newlayout.layout',['breadcom'=>['Courses','Instructor','Edit']])
@section('title')
    Instructor Info
@endsection
@section('page')

    <div class="tabs">
        <div id="edititem" class="tab-pane active">
                <form method="post" action="/admin/content/instructor-update/{{ $instructor->id }}" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="{{ $instructor->name }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" value="{{ $instructor->email }}" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Gender</label>
                                <div class="col-md-6">
                                    <select name="gender" class="form-control">
                                        <option value=""> Select an option</option>
                                        <option value="male" @if($instructor->gender == 'male') selected @endif> Male</option>
                                        <option value="female" @if($instructor->gender == 'female') selected @endif> Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Mobile</label>
                                <div class="col-md-6">
                                    <input type="text" name="mobile" value="{{ $instructor->mobile }}" placeholder="Enter Mobile" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Education Qualification</label>
                                <div class="col-md-6">
                                    <input type="text" name="education" value="{{ $instructor->education }}" placeholder="Enter Qualification" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Speciality</label>
                                <div class="col-md-6">
                                    <input type="text" name="speciality" value="{{ $instructor->speciality }}" placeholder="Enter Speciality" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Status</label>
                                <div class="col-md-6">
                                    <select name="status" class="form-control">
                                        <option value=""> Select an option</option>
                                        <option value="1" @if($instructor->is_active == 1) selected @endif> Active</option>
                                        <option value="0" @if($instructor->is_active == 0) selected @endif> In-active</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Address</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" value="{{ $instructor->address }}" placeholder="Enter Address" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Photo</label>
                                <div class="col-md-6">
                                    <span id="photo_err1" class="text-danger" style="font-size: 15px;"></span>
                                    <div>
                                        @if($instructor->image)
                                        <img src="/uploads/instructor_images/{{ $instructor->image }}" id="profilePhotoViewer1" width="150" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @else
                                            <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer1" width="150" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @endif
                                        
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