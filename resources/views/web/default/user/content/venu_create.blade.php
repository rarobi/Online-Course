@extends(getTemplate().'.user.layout.sendvideolayout')

@section('pages')
<style>
    .select2.select2-container.select2-container--default
    {
        width: auto !important;
    }
</style>
    <div class="h-30"></div>
    <div class="conteiner-fluid">
        <div class="container cont-10">
            <div class="h-30"></div>
            <div class="multi-steps">
                <div class="col-md-12 col-xs-12 col-sm-12 left-side">
                    <div class="steps" id="step1">

                        <form method="post" action="/user/content/venu/store" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Venu Title*</label>
                                <div class="col-md-10 tab-con">
                                    <input type="text" name="title" placeholder="30-60 Characters" class="form-control" required>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">{{ trans('main.description') }}</label>
                                <div class="col-md-10 tab-con">
                                    <textarea class="form-control editor-te" rows="12" placeholder="Description..." name="content_details" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Division</label>
                                <div class="col-md-2 tab-con">
                                    <select name="division" class="form-control font-s division-list">
                                        <option value=""> Select a division</option>
                                        @if(count($divisions) > 0)
                                            @foreach($divisions as $list)
                                             <option value="{{ $list->division_name }}"> {{ $list->division_name }} </option>
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
                                             <option value="{{ $list->district_name }}"> {{ $list->district_name }} </option>
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
                                                 <option value="{{ $list->upazilla_name }}"> {{ $list->upazilla_name }} </option>
                                                @endforeach
                                            @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Address*</label>
                                <div class="col-md-10 tab-con">
                                    <input type="text" name="address" placeholder="Enter your course venu address" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Venu Size(Sq Ft)</label>
                                <div class="col-md-2 tab-con">
                                    <input type="text" name="venu_size" placeholder="Enter your course duration" class="form-control" required>
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Available Seat*</label>
                                <div class="col-md-2 tab-con">
                                    <input type="text" name="available_seat" placeholder="Enter availble seat" class="form-control" required>
                                </div>
                                
                                <!--<label class="control-label col-md-2 tab-con" for="inputDefault">Availability(Hour/Day)*</label>-->
                                <div class="col-md-2 tab-con">
                                    <select name="availability_type" class="form-control font-s availibility_type" required>
                                        <option value=""> Select availibility type</option>
                                        <option value="hour"> Hour</option>
                                        <option value="day"> Day</option>
                                    </select>
                                </div>
                                <div class="col-md-2 tab-con price_box">
                                    <input type="text" name="availability_hour" placeholder="Enter availibility hour" class="form-control">
                                </div>
                                <div class="col-md-2 tab-con days">
                                    <select name="availability_day[]" class="form-control font-s select2" multiple>
                                        <option value=""> Select day</option>
                                        <option value="satyrday"> Saturday</option>
                                        <option value="sunday"> Sunday</option>
                                        <option value="monday"> Monday</option> 
                                        <option value="tuesday"> Tuesday</option> 
                                        <option value="wednesday"> Wednesday</option> 
                                        <option value="thursday"> Thursday</option> 
                                        <option value="firday"> Friday</option> 
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Normal Price(Tk)</label>
                                <div class="col-md-2 tab-con">
                                    <input type="text" name="regular_price" placeholder="Enter previous price" class="form-control" required>
                                </div>
                                <div class="col-md-2 tab-con">
                                    <input type="radio" name="price_type" value='hour'> Hour
                                    <input type="radio" name="price_type" value='day'> Day
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Discount Price(Tk)</label>
                                <div class="col-md-2 tab-con">
                                    <input type="text" name="discount_price" placeholder="Enter discount price" class="form-control">
                                </div>
                                <div class="col-md-2 tab-con discount_price_type">
                                    <input type="radio" name="discount_price_type" value='hour'> Hour
                                    <input type="radio" name="discount_price_type" value='day'> Day
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Extra Featured(Free service)</label>
                                <div class="col-md-10 tab-con">
                                @if(count($free_features) > 0)
                                    @foreach($free_features as $list)
                                        <input type="checkbox" name="free_feature[]" value="{{ $list->name }}"> {{ $list->name }}
                                    @endforeach
                                @endif
                                
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Extra Featured(Paid service)</label>
                                <div class="col-md-10 tab-con">
                                 @if(count($paid_features) > 0)
                                    @foreach($paid_features as $list)
                                        <input type="checkbox" name="paid_feature[]" value="{{ $list->name }}"> {{ $list->name }}
                                    @endforeach
                                @endif
                                
                                </div>
                            </div>
                       
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Thumbnail Image</label>
                                <div class="col-md-10">
                                    <span id="photo_err1" class="text-danger" style="font-size: 15px;"></span>
                                    <div>
                                        <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer1" width="150" style="height:100px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                    </div>
                                    <br>
                                    <label class="btn btn-primary btn-sm">
                                        <input onchange="changePhotoForThumbnail(this)" type="file" name="thumbnail_photo" style="display: none">
                                        <i class="fa fa-image"></i> Upload photo
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Slider photos</label>
                                <div class="col-md-10 tab-con">
                                   <input type="file" name="slider_photos[]" multiple> 
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
                                   <input type="text" name="number" placeholder="Enter your phone number" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 tab-con">
                                   <input type="checkbox" name="terms"> I have read and accept the <span class='text-primary'>Terms & Conditions</span>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <div class="col-md-12 tab-con">
                                    <input type="submit" class="btn btn-custom pull-left" id="venu_submit" value="SAVE">
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
            
             $('.price_box').hide();
             $('.days').hide();
             
             $( ".availibility_type" ).change(function() {
                 var type = $(this).children("option:selected").val();
                 if(type == 'day'){
                      $('.price_box').hide();
                      $('.days').show();
                 } else if(type == 'hour') {
                      $('.price_box').show();
                      $('.days').hide();
                 }
            })
             
           $('.select2').select2({
                placeholder: {
                    id: '',
                    text: 'Select option'
                },
                allowClear: true
            });
            
           $('select').niceSelect();
           var url = window.location.href;
        })
    </script>
    <script>
        $('#category_id').change(function () {
            var id = $(this).val();
            $('.filter-tags').removeAttr('checked');
            $('.filters').not('#filter' + id).each(function () {
                $('.filters').slideUp();
            });
            $('#filter' + id).slideDown(500);
        })
        
        $("#venu_submit").click(function() {
          var condition = $('input[name="terms"]:checked').val();
             if(condition == undefined){
                  alert("Please check on terms & condition box");
                  return false;
             } 
        });
        
        function changePhotoForThumbnail(input) {
            if (input.files && input.files[0]) {
                $("#photo_err1").html('');
                var mime_type = input.files[0].type;
                if(!(mime_type=='image/jpeg' || mime_type=='image/jpg' || mime_type=='image/png')){
                    $("#photo_err").html("Image format is not valid. Only PNG or JPEG or JPG type images are allowed.");
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
