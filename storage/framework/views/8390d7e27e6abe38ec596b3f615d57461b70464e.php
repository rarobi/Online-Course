<?php $__env->startSection('title'); ?>
    Instructor Info
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>
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
                                <th><?php echo e(trans('admin.th_controls')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($list->id); ?></td>
                                    <td><?php echo e($list->name); ?></td>
                                    <td><?php echo e($list->email); ?></td>
                                    <td class="text-center"><?php echo e($list->gender); ?></td>
                                    <td class="text-center"><?php echo e($list->education); ?></td>
                                    <td class="text-center"><?php echo e($list->speciality); ?></td>
                                    <td class="text-center">
                                        <?php if($list->is_active): ?>
                                            Active
                                        <?php else: ?>
                                            In-active
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center"><?php echo e($list->address); ?></td>
                                    <td class="text-center">
                                        <?php if($list->image): ?>
                                        <img src="/uploads/instructor_images/<?php echo e($list->image); ?>" id="profilePhotoViewer" width="50" style="height:50px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin/content/instructor-edit/<?php echo e($list->id); ?>" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                        <a href="#" data-href="/admin/content/instructor-delete/<?php echo e($list->id); ?>" title="Delete" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="newitem" class="tab-pane ">
                        <form method="post" action="/admin/content/instructor-store" class="form-horizontal form-bordered" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

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
                                        <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" id="profilePhotoViewer1" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        
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
            </div>
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

<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Courses','Instructor']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/admin/content/instructor.blade.php ENDPATH**/ ?>