<?php $__env->startSection('tab1','active'); ?>
<?php $__env->startSection('tab'); ?>
    <div class="h-20"></div>
   <div class="container-fluid">
        <div class="container">
            <div class="h-20"></div>
            <div class="col-md-6 col-xs-12 tab-con">
                <div class="ucp-section-box">
                    <div class="header back-red"> Upload Photo</div>
                    <div class="body">
                        <form method="post" action="/user/gallery/new/store" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <label class="control-label" for="inputDefault"><?php echo e(trans('main.title')); ?></label>
                                <input type="text" name="title" class="form-control" id="inputDefault" required>
                            </div>

                            <div class="form-group">
                                <label class="control-label"> Add Photo</label>
                                <!--<div class="input-group" style="display: flex">-->
                                <!--    <button type="button" data-input="avatar" data-preview="holder" class="lfm_load btn btn-primary">-->
                                <!--        Choose-->
                                <!--    </button>-->
                                <!--    <input id="avatar" class="form-control" value="<?php echo e($edit->avatar ?? ''); ?>" type="text" name="avatar" dir="ltr">-->
                                <!--    <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="avatar">-->
                                <!--        <span class="input-group-text">-->
                                <!--            <i class="fa fa-eye" aria-hidden="true"></i>-->
                                <!--        </span>-->
                                <!--    </div>-->
                                <!--</div>-->
                                 <div class="input-group">
                                    <span id="photo_err1" class="text-danger" style="font-size: 15px;"></span>
                                    <div>
                                        <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" id="profilePhotoViewer1" width="200" style="height:100px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                       
                                    </div>
                                    <br>
                                    <label class="btn btn-primary btn-sm">
                                        <input onchange="changePhotoForThumbnail(this)" type="file" name="thumbnail_photo" style="display: none">
                                        <i class="fa fa-image"></i> Upload photo
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-custom pull-left" value="Save Changes"><?php echo e(trans('main.save_changes')); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xs-12 tab-con">
                <?php if(count($galleries) == 0): ?>
                    <div class="text-center">
                        <img src="/assets/default/images/empty/channel.png">
                        <div class="h-20"></div>
                        <span class="empty-first-line"> No Gallery Found</span>
                        <div class="h-10"></div>
                        <span class="empty-second-line">
                        <span>By creating gallery you will be able to show your item.</span>
                        </span>
                    </div>
                <?php else: ?>
                    <div class="table-responsive">
                        <table class="table ucp-table" id="chanel-table">
                            <thead class="back-blue">
                            <th class="text-center"><?php echo e(trans('main.title')); ?></th>
                            <th class="text-center"> Photo </th>
                            <th class="text-center"><?php echo e(trans('main.status')); ?></th>
                            <th class="text-center"><?php echo e(trans('main.controls')); ?></th>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e(\Illuminate\Support\Str::limit($gallery->title, 30, $end='...')); ?></td>
                                    <td class="text-center">
                                        <?php if($gallery->photo): ?>
                                        <img src="/uploads/gallery/<?php echo e($gallery->photo); ?>" id="profilePhotoViewer1" width="80" style="height:80px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        <?php else: ?>
                                            <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" id="profilePhotoViewer1" width="80" style="height:80px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($gallery->is_show == 1): ?>
                                            <b class="blue-s"> Active </b>
                                        <?php else: ?>
                                            <b class="green-s"> In-active</b>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" data-href="/user/gallery/delete/<?php echo e($gallery->id); ?>" data-toggle="modal" data-target="#confirm-delete" title="Delete channel"><span class="crticon mdi mdi-delete-forever"></span></a>
                                        <!--<a href="/user/channel/edit/<?php echo e($gallery->id); ?>"><span class="crticon mdi mdi-lead-pencil"></span></a>-->
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('.lfm_load').filemanager('file', {prefix: '/user/laravel-filemanager'});
        $('#gallery-hover').addClass('item-box-active');
        
         function changePhotoForThumbnail(input) {
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

<?php echo $__env->make($user['vendor'] == 1 ? getTemplate() . '.user.layout.videolayout' : getTemplate() . '.user.layout.videolayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/user/gallery/list.blade.php ENDPATH**/ ?>