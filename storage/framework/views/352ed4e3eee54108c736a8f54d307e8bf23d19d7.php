
<?php $__env->startSection('title'); ?>
    Instructor Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <div class="tabs">
        <div id="edititem" class="tab-pane active">
                <form method="post" action="/admin/content/instructor-update/<?php echo e($instructor->id); ?>" class="form-horizontal form-bordered">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Name</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" value="<?php echo e($instructor->name); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Email</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" value="<?php echo e($instructor->email); ?>" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Gender</label>
                                <div class="col-md-6">
                                    <select name="gender" class="form-control">
                                        <option value=""> Select an option</option>
                                        <option value="male" <?php if($instructor->gender == 'male'): ?> selected <?php endif; ?>> Male</option>
                                        <option value="female" <?php if($instructor->gender == 'female'): ?> selected <?php endif; ?>> Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Mobile</label>
                                <div class="col-md-6">
                                    <input type="text" name="mobile" value="<?php echo e($instructor->mobile); ?>" placeholder="Enter Mobile" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Education Qualification</label>
                                <div class="col-md-6">
                                    <input type="text" name="education" value="<?php echo e($instructor->education); ?>" placeholder="Enter Qualification" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Speciality</label>
                                <div class="col-md-6">
                                    <input type="text" name="speciality" value="<?php echo e($instructor->speciality); ?>" placeholder="Enter Speciality" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Status</label>
                                <div class="col-md-6">
                                    <select name="status" class="form-control">
                                        <option value=""> Select an option</option>
                                        <option value="1" <?php if($instructor->is_active == 1): ?> selected <?php endif; ?>> Active</option>
                                        <option value="0" <?php if($instructor->is_active == 0): ?> selected <?php endif; ?>> In-active</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault">Address</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" value="<?php echo e($instructor->address); ?>" placeholder="Enter Address" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="inputDefault"> Photo</label>
                                <div class="col-md-6">
                                    <span id="photo_err1" class="text-danger" style="font-size: 15px;"></span>
                                    <div>
                                        <?php if($instructor->image): ?>
                                        <img src="/uploads/instructor_images/<?php echo e($instructor->image); ?>" id="profilePhotoViewer1" width="150" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        <?php else: ?>
                                            <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" id="profilePhotoViewer1" width="150" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        <?php endif; ?>
                                        
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
                            <button class="btn btn-primary" type="submit"><?php echo e(trans('admin.save_changes')); ?></button>
                        </div>
                    </div>

                </form>
            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Courses','Instructor','Edit']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/admin/content/edit_instructor.blade.php ENDPATH**/ ?>