<?php $__env->startSection('pages'); ?>
    <div class="h-30"></div>
    <div class="conteiner-fluid">
        <div class="container cont-10">
            <div class="h-30"></div>
            <div class="multi-steps">
                <div class="col-md-12 col-xs-12 col-sm-12 left-side">
                    <div class="steps" id="step1">

                        <form method="post" action="/user/content/course/update/<?php echo e($item->id); ?>" class="form-horizontal" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault"><?php echo e(trans('main.course_title')); ?>*</label>
                                <div class="col-md-10 tab-con">
                                    <input type="text" name="title" placeholder="30-60 Characters" class="form-control" value="<?php echo e($item->title); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault"> Course category</label>
                                <div class="col-md-10 tab-con">
                                    <select name="course_category" class="form-control font-s">
                                        <option value=""> Select a course category</option>
                                        <?php if(count($lists) > 0): ?>
                                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($list->id); ?>" <?php if($list->id == $item->category_id): ?> selected="selected" <?php endif; ?>> <?php echo e($list->title); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>    
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault"><?php echo e(trans('main.course_type')); ?></label>
                                <div class="col-md-10 tab-con">
                                    <select name="course_type" class="form-control font-s course_type">
                                        <option value=""> Select a course type</option>
                                        <option value="newest course" <?php if($item->content_type == "newest course"): ?> selected="selected" <?php endif; ?>> Newest Course</option>
                                        <option value="popular course" <?php if($item->content_type == "popular course"): ?> selected="selected" <?php endif; ?>> Popular Course</option>  
                                        <option value="most viewed course" <?php if($item->content_type == "most viewed course"): ?> selected="selected" <?php endif; ?>> Most Viwed Course</option>  
                                        <option value="featured course" <?php if($item->content_type == "featured course"): ?> selected="selected" <?php endif; ?>> Featured Course</option>  
                                        <option value="live course" <?php if($item->content_type == "live course"): ?> selected="selected" <?php endif; ?>> Live Course</option>  
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
                                <label class="control-label col-md-2 tab-con" for="inputDefault"><?php echo e(trans('main.description')); ?></label>
                                <div class="col-md-10 tab-con">
                                    <textarea class="form-control editor-te" rows="12" placeholder="Description..." name="content_details"><?php echo $item->content; ?></textarea>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Instructor Name</label>
                                <div class="col-md-4 tab-con">
                                    <!--<input type="text" name="instructor_name" placeholder="Write course instructor name" class="form-control" value="<?php echo e($instructor->name); ?>">-->
                                    <select name="instructor_id" class="form-control font-s">
                                        <option value=""> Select an instructor</option>
                                        <?php if(count($instructors) > 0): ?>
                                            <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($instructor->id); ?>" <?php if($instructor->id == $item->instructor_id): ?> selected <?php endif; ?>> <?php echo e($instructor->name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>    
                                    </select>
                                </div>
                                
                                <!--<label class="control-label col-md-2 tab-con" for="inputDefault">Instructor Photo</label>-->
                                <!--<div class="col-md-4 tab-con">-->
                                <!--    <input type="file" name="instructor_image" >-->
                                <!--</div>-->
                                <!--<div class="col-md-4">-->
                                <!--    <span id="photo_err" class="text-danger" style="font-size: 15px;"></span>-->
                                <!--    <div>-->
                                <!--        <?php if($instructor->image): ?>-->
                                <!--        <img src="/uploads/instructor_images/<?php echo e($instructor->image); ?>" id="profilePhotoViewer" width="150" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">-->
                                <!--        <?php else: ?>-->
                                <!--            <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" id="profilePhotoViewer" width="150" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">-->
                                <!--        <?php endif; ?>-->
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
                                        <?php if(count($divisions) > 0): ?>
                                            <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($list->division_name); ?>" <?php if($list->division_name == $item->division): ?> selected="selected" <?php endif; ?>> <?php echo e($list->division_name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?> 
                                    </select>
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">District</label>
                                <div class="col-md-2 tab-con">
                                    <select name="district" class="form-control font-s district-list">
                                        <option value=""> Select a district</option>
                                        <?php if(count($districts) > 0): ?>
                                            <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             <option value="<?php echo e($list->district_name); ?>" <?php if($list->district_name == $item->district): ?> selected="selected" <?php endif; ?>> <?php echo e($list->district_name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?> 
                                    </select>
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Upazila/Thana</label>
                                <div class="col-md-2 tab-con">
                                    <select name="upazila" class="form-control font-s upazila-list">
                                         <option value=""> Select a upazilla</option>
                                            <?php if(count($upazilas) > 0): ?>
                                                <?php $__currentLoopData = $upazilas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <option value="<?php echo e($list->upazilla_name); ?>" <?php if($list->upazilla_name == $item->upazila): ?> selected="selected" <?php endif; ?>> <?php echo e($list->upazilla_name); ?> </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Address*</label>
                                <div class="col-md-10 tab-con">
                                    <input type="text" name="address" placeholder="Enter your course venu address" class="form-control" value="<?php echo e($item->address); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Facilities & Equipments</label>
                                <div class="col-md-10 tab-con">
                                  
                                <?php if(count($facilities) > 0): ?>
                                    <?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                        <input type="checkbox" name="facility[]" value="<?php echo e($facility->name); ?>" <?php if(in_array($facility->name, json_decode($item->facilities))): ?> checked <?php endif; ?>> <?php echo e($facility->name); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Course Duration</label>
                                <div class="col-md-1 tab-con">
                                    <input type="number" name="course_duration" placeholder="Ex.2" class="form-control" value="<?php echo e($item->course_duration); ?>">
                                </div>
                                <div class="col-md-1 tab-con">
                                    <select name="course_duration_type" class="form-control font-s" style="padding:0px">
                                        <option value=""> Select type</option>
                                        <option value="days" <?php if($item->course_duration_type == "days"): ?> selected="selected" <?php endif; ?>> Day/s</option>
                                        <option value="hours" <?php if($item->course_duration_type == "hours"): ?> selected="selected" <?php endif; ?>> Hour/s</option>  
                                    </select>
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Course Start Time*</label>
                                <div class="col-md-2 tab-con">
                                    <input type="text" name="course_start_time" placeholder="select your course start time" class="form-control date" value="<?php echo e($item->course_start_date); ?>">
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Available Seat*</label>
                                <div class="col-md-2 tab-con">
                                    <input type="number" name="available_seat" placeholder="Enter availble seat" class="form-control" value="<?php echo e($item->available_seat); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Normal Price(Tk)</label>
                                <div class="col-md-2 tab-con">
                                    <input type="number" name="regular_price" placeholder="Enter regular price" class="form-control" value="<?php echo e($item->price); ?>">
                                </div>
                                
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Discount Price(Tk)</label>
                                <div class="col-md-2 tab-con">
                                    <input type="number" name="discount_price" placeholder="Enter discount price" class="form-control" value="<?php echo e($item->discount_price); ?>">
                                </div>
                                
                        
                                <div class="col-md-2 tab-con">
                                    <input type="checkbox" name="negotiable" value='1' <?php if($item->negotiable): ?> checked <?php endif; ?>> Negotiable
                                </div>
                                
                                <div class="col-md-2 tab-con">
                                    <input type="checkbox" name="free" value='1' <?php if($item->free): ?> checked <?php endif; ?>> Free
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
                                        <?php if($item->image): ?>
                                        <img src="/uploads/thumbnail_photo/<?php echo e($item->image); ?>" id="profilePhotoViewer" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        <?php else: ?>
                                            <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" id="profilePhotoViewer1" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        <?php endif; ?>
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
                                    <?php if(count($sliders) > 0): ?> 
                                      <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img src="/uploads/content_sliders/<?php echo e($slider->slider); ?>" id="profilePhotoViewer" width="100" style="height:100px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Name</label>
                                <div class="col-md-10 tab-con">
                                   <p><?php echo e($user->name); ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Email</label>
                                <div class="col-md-10 tab-con">
                                   <p><?php echo e($user->email); ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-2 tab-con" for="inputDefault">Phone Number</label>
                                <div class="col-md-3 tab-con">
                                   <input type="text" name="number" placeholder="Enter your phone number" class="form-control" value="<?php echo e($item->contact_number); ?>">
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
        var URL = "<?php echo e(url('pages/district')); ?>" +'/'+ divisionName;
        $.ajax({
            type: "GET",
            url: URL,
            success: function(data) {
                var selected = '';

                var selectedDistrict =  $.trim('<?php if(isset($dist_name)): ?> <?php echo ($dist_name); ?><?php else: ?> <?php echo ''; ?><?php endif; ?>');

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
        var URL = "<?php echo e(url('pages/upazila')); ?>" +'/'+ districtName;
        $.ajax({
            type: "GET",
            url: URL,
            success: function(data) {
                var selected = '';

                var selectedUpazila =  $.trim('<?php if(isset($dist_name)): ?> <?php echo ($dist_name); ?><?php else: ?> <?php echo ''; ?><?php endif; ?>');

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.user.layout.sendvideolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/user/content/course_edit.blade.php ENDPATH**/ ?>