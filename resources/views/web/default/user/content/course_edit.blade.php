@extends(getTemplate().'.user.layout.sendvideolayout')

@section('pages')
    <div class="h-30"></div>
    <div class="conteiner-fluid">
        <div class="container cont-10">
            <div class="h-30"></div>
            <div class="multi-steps">
                <div class="col-md-12 col-xs-12 col-sm-12 left-side">
                    <div class="steps" id="step1">

                        <form method="post" action="/user/content/course/update/{{ $item->id }}" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">{{ trans('main.course_title') }}*</label>
                                <div class="col-md-10 tab-con">
                                    <input type="text" name="title" placeholder="30-60 Characters" class="form-control" value="{{ $item->title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault"> Course category</label>
                                <div class="col-md-10 tab-con">
                                    <select name="course_category" class="form-control font-s">
                                        <option value=""> Select a course category</option>
                                        @if(count($lists) > 0)
                                            @foreach($lists as $list)
                                             <option value="{{ $list->id }}" @if($list->id == $item->category_id) selected="selected" @endif> {{ $list->title }} </option>
                                            @endforeach
                                        @endif    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">{{ trans('main.course_type') }}</label>
                                <div class="col-md-10 tab-con">
                                    <select name="course_type" class="form-control font-s course_type">
                                        <option value=""> Select a course type</option>
                                        <option value="newest course" @if($item->content_type == "newest course") selected="selected" @endif> Newest Course</option>
                                        <option value="popular course" @if($item->content_type == "popular course") selected="selected" @endif> Popular Course</option>  
                                        <option value="most viewed course" @if($item->content_type == "most viewed course") selected="selected" @endif> Most Viwed Course</option>  
                                        <option value="featured course" @if($item->content_type == "featured course") selected="selected" @endif> Featured Course</option>  
                                        <option value="live course" @if($item->content_type == "live course") selected="selected" @endif> Live Course</option>  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group live_url">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Live class URL</label>
                                <div class="col-md-6 tab-con">
                                    <input type="text" name="live_url" placeholder="Enter live class url" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">{{ trans('main.description') }}</label>
                                <div class="col-md-10 tab-con">
                                    <textarea class="form-control editor-te" rows="12" placeholder="Description..." name="content_details">{!! $item->content !!}</textarea>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Instructor Name</label>
                                <div class="col-md-4 tab-con">
                                    <!--<input type="text" name="instructor_name" placeholder="Write course instructor name" class="form-control" value="{{ $instructor->name }}">-->
                                    <select name="instructor_id" class="form-control font-s">
                                        <option value=""> Select an instructor</option>
                                        @if(count($instructors) > 0)
                                            @foreach($instructors as $instructor)
                                             <option value="{{ $instructor->id }}" @if($instructor->id == $item->instructor_id) selected @endif> {{ $instructor->name }} </option>
                                            @endforeach
                                        @endif    
                                    </select>
                                </div>
                                
                                <!--<label class="control-label col-md-2 tab-con" for="inputDefault">Instructor Photo</label>-->
                                <!--<div class="col-md-4 tab-con">-->
                                <!--    <input type="file" name="instructor_image" >-->
                                <!--</div>-->
                                <!--<div class="col-md-4">-->
                                <!--    <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>-->
                                <!--    <div>-->
                                <!--        @if($instructor->image)-->
                                <!--        <img src="/uploads/instructor_images/{{ $instructor->image }}" id="profilePhotoViewer" width="150" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">-->
                                <!--        @else-->
                                <!--            <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer" width="150" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">-->
                                <!--        @endif-->
                                <!--    </div>-->
                                <!--    <br>-->
                                <!--    <label class="btn btn-primary btn-sm">-->
                                <!--        <input onchange="changePhoto(this)" type="file" name="instructor_image" style="display: none">-->
                                <!--        <i class="fa fa-image"></i> Upload photo-->
                                <!--    </label>-->
                                <!--</div><!--col-->
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Division</label>
                                <div class="col-md-2 tab-con">
                                    <select name="division" class="form-control font-s division-list">
                                        <option value=""> Select a division</option>
                                        @if(count($divisions) > 0)
                                            @foreach($divisions as $list)
                                             <option value="{{ $list->division_name }}" @if($list->division_name == $item->division) selected="selected" @endif> {{ $list->division_name }} </option>
                                            @endforeach
                                        @endif 
                                    </select>
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">District</label>
                                <div class="col-md-2 tab-con">
                                    <select name="district" class="form-control font-s district-list">
                                        <option value=""> Select a district</option>
                                        @if(count($districts) > 0)
                                            @foreach($districts as $list)
                                             <option value="{{ $list->district_name }}" @if($list->district_name == $item->district) selected="selected" @endif> {{ $list->district_name }} </option>
                                            @endforeach
                                        @endif 
                                    </select>
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Upazila/Thana</label>
                                <div class="col-md-2 tab-con">
                                    <select name="upazila" class="form-control font-s upazila-list">
                                         <option value=""> Select a upazilla</option>
                                            @if(count($upazilas) > 0)
                                                @foreach($upazilas as $list)
                                                 <option value="{{ $list->upazilla_name }}" @if($list->upazilla_name == $item->upazila) selected="selected" @endif> {{ $list->upazilla_name }} </option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Address*</label>
                                <div class="col-md-10 tab-con">
                                    <input type="text" name="address" placeholder="Enter your course venu address" class="form-control" value="{{ $item->address }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Facilities & Equipments</label>
                                <div class="col-md-10 tab-con">
                                  
                                @if(count($facilities) > 0)
                                    @foreach($facilities as $facility)    
                                        <input type="checkbox" name="facility[]" value="{{ $facility->name }}" @if(in_array($facility->name, json_decode($item->facilities))) checked @endif> {{ $facility->name }}
                                    @endforeach
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Course Duration</label>
                                <div class="col-md-1 tab-con">
                                    <input type="number" name="course_duration" placeholder="Ex.2" class="form-control" value="{{ $item->course_duration }}">
                                </div>
                                <div class="col-md-1 tab-con">
                                    <select name="course_duration_type" class="form-control font-s" style="padding:0px">
                                        <option value=""> Select type</option>
                                        <option value="days" @if($item->course_duration_type == "days") selected="selected" @endif> Day/s</option>
                                        <option value="hours" @if($item->course_duration_type == "hours") selected="selected" @endif> Hour/s</option>  
                                    </select>
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Course Start Time*</label>
                                <div class="col-md-2 tab-con">
                                    <input type="text" name="course_start_time" placeholder="select your course start time" class="form-control date" value="{{ $item->course_start_date }}">
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Available Seat*</label>
                                <div class="col-md-2 tab-con">
                                    <input type="number" name="available_seat" placeholder="Enter availble seat" class="form-control" value="{{ $item->available_seat }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Normal Price(Tk)</label>
                                <div class="col-md-2 tab-con">
                                    <input type="number" name="regular_price" placeholder="Enter regular price" class="form-control" value="{{ $item->price }}">
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Discount Price(Tk)</label>
                                <div class="col-md-2 tab-con">
                                    <input type="number" name="discount_price" placeholder="Enter discount price" class="form-control" value="{{ $item->discount_price }}">
                                </div>
                                
                        
                                <div class="col-md-2 tab-con">
                                    <input type="checkbox" name="negotiable" value='1' @if($item->negotiable) checked @endif> Negotiable
                                </div>
                                
                                <div class="col-md-2 tab-con">
                                    <input type="checkbox" name="free" value='1' @if($item->free) checked @endif> Free
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Thumbnail photo</label>
                                <!--<div class="col-md-10 tab-con">-->
                                <!--   <input type="file" name="thumbnail_photo"> -->
                                <!--</div>-->
                                 <div class="col-md-10">
                                    <span id="photo_err1" class="text-danger" style="font-size: 15px;"></span>
                                    <div>
                                        @if($item->image)
                                        <img src="/uploads/thumbnail_photo/{{ $item->image }}" id="profilePhotoViewer" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @else
                                            <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer1" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @endif
                                    </div>
                                    <br>
                                    <label class="btn btn-primary btn-sm">
                                        <input onchange="changePhoto(this)" type="file" name="thumbnail_photo" style="display: none">
                                        <i class="fa fa-image"></i> Upload photo
                                    </label>
                                </div><!--col-->
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Slider 5 photos</label>
                                <div class="col-md-10 tab-con">
                                    <input type="file" name="slider_photos[]" multiple>
                                    @if(count($sliders) > 0) 
                                      @foreach($sliders as $slider)
                                        <img src="/uploads/content_sliders/{{ $slider->slider }}" id="profilePhotoViewer" width="100" style="height:100px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                      @endforeach
                                    @endif
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Name</label>
                                <div class="col-md-10 tab-con">
                                   <p>{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Email</label>
                                <div class="col-md-10 tab-con">
                                   <p>{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Phone Number</label>
                                <div class="col-md-3 tab-con">
                                   <input type="text" name="number" placeholder="Enter your phone number" class="form-control" value="{{ $item->contact_number }}">
                                </div>
                            </div>
                            <!--<div class="form-group">-->
                            <!--    <div class="col-md-12 tab-con">-->
                            <!--       <input type="checkbox" name="terms" value='1'> I have read and accept the <span class='text-primary'>Terms & Conditions</span>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12 tab-con">
                                    <input type="submit" class="btn btn-custom pull-left" value="UPDATE">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="h-30"></div>
        </div>
    </div>

@endsection
@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <script>
        $('.editor-te').jqte({format: false});
    </script>
    <script>
        $('document').ready(function () {
            $('input[name="post"]').change(function () {
                if ($(this).prop('checked')) {
                    $('input[name="post_price"]').removeAttr('disabled');
                } else {
                    $('input[name="post_price"]').attr('disabled', 'disabled');
                }
            });
            $('#free').change(function () {
                if ($(this).prop('checked')) {
                    $('input[name="price"]').attr('disabled', 'disabled');
                    $('input[name="post_price"]').attr('disabled', 'disabled');
                } else {
                    $('input[name="price"]').removeAttr('disabled');
                }
            });
            
            $('.date').datepicker({
                format: 'yyyy/mm/dd',
            
            });
            
            $('.live_url').hide();
            
            $('select').niceSelect();
            var url = window.location.href;
        })
    </script>
    <script>
        $('.course_type').change(function () {
            var value = $(this).val();
            if(value == 'live course'){
               $('.live_url').show(); 
            }else {
                $('.live_url').hide();
            }
        })
        
        $('#category_id').change(function () {
            var id = $(this).val();
            $('.filter-tags').removeAttr('checked');
            $('.filters').not('#filter' + id).each(function () {
                $('.filters').slideUp();
            });
            $('#filter' + id).slideDown(500);
        })
        
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
                    // console.dir(e);
                    // console.dir(e.target);
                    // console.dir(e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        //District change
        $('.division-list').change(function() {
        var divisionName = $(this).val();
        if(divisionName != '') {
            divisionList(divisionName);
            }
        });
        
        function divisionList(divisionName) {
        var URL = "{{ url('pages/district') }}" +'/'+ divisionName;
        $.ajax({
            type: "GET",
            url: URL,
            success: function(data) {
                var selected = '';

                var selectedDistrict =  $.trim('@if(isset($dist_name)) {!! ($dist_name) !!}@else {!! '' !!}@endif');

                var options = $(".district-list");
                options.empty();

                options.append('<option selected="selected" value="">Select a district</option>');
             
                $.each(data, function(key, value) {

                    options.append($("<option />").val(key).text(value));
                    if(key == selectedDistrict) {
                        console.log('ok');
                        selected    =   key;
                    }
                });

                options.niceSelect();
                options.eq(-1).remove();
                if(selected != ''){
                    options.val(selected).niceSelect('update');
                }
            }
        });
    }
    
       //Upazila Change
       $('.district-list').change(function() {
        var districtName = $(this).val();
        if(districtName != '') {
            districtList(districtName);
            }
        });
        
        function districtList(districtName) {
        var URL = "{{ url('pages/upazila') }}" +'/'+ districtName;
        $.ajax({
            type: "GET",
            url: URL,
            success: function(data) {
                var selected = '';

                var selectedUpazila =  $.trim('@if(isset($dist_name)) {!! ($dist_name) !!}@else {!! '' !!}@endif');

                var options = $(".upazila-list");
                options.empty();

                options.append('<option selected="selected" value="">Select an upazila</option>');
             
                $.each(data, function(key, value) {

                    options.append($("<option />").val(key).text(value));
                    if(key == selectedUpazila) {
                        console.log('ok');
                        selected    =   key;
                    }
                });

                options.niceSelect();
                options.eq(-1).remove();
                if(selected != ''){
                    options.val(selected).niceSelect('update');
                }
            }
        });
    }
    </script>
@endsection
