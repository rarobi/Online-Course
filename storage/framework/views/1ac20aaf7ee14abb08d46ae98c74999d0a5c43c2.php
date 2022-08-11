<?php $__env->startSection('title'); ?>
    <?php echo e(trans('admin.th_edit')); ?> <?php echo e(trans('admin.notifications')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
            </div>

            <h2 class="panel-title"><?php echo e(trans('admin.th_edit')); ?> <?php echo e($item->title); ?></h2>
        </header>
        <div class="panel-body">

            <form action="/admin/notification/store" class="form-horizontal form-bordered" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label class="col-md-1 control-label" for="inputDefault"><?php echo e(trans('admin.th_title')); ?></label>
                    <div class="col-md-11">
                        <input type="text" value="<?php echo e($item->title); ?>" name="title" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label" for="inputDefault"><?php echo e(trans('admin.receipts')); ?></label>
                    <div class="col-md-11">
                        <select name="recipent_type" class="form-control populate recipent_selection">
                            <option value=""></option>
                            <option value="userone" <?php if($item->recipent_type == 'userone'): ?> selected <?php endif; ?> ><?php echo e(trans('admin.single_user')); ?></option>
                            <option value="users" <?php if($item->recipent_type == 'users'): ?> selected <?php endif; ?>><?php echo e(trans('admin.users_list')); ?></option>
                            <option value="category" <?php if($item->recipent_type == 'category'): ?> selected <?php endif; ?>><?php echo e(trans('admin.user_groups')); ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group recipent" id="users" <?php if($item->recipent_type == 'users'): ?> <?php echo 'style="display: block;"'; ?> <?php endif; ?>>
                    <label class="col-md-1 control-label" for="inputDefault"><?php echo e(trans('admin.users')); ?></label>
                    <div class="col-md-11" dir="ltr">
                        <select name="recipent_list_users[]" multiple data-plugin-selectTwo class="form-control populate text-left">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>" <?php if($item->recipent_type == 'users' and in_array($user->id,unserialize($item->recipent_list))): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($user->username); ?> (<?php echo e($user->name); ?>)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group recipent" id="user" <?php if($item->recipent_type == 'user'): ?> <?php echo 'style="display: block;"'; ?> <?php endif; ?>>
                    <label class="col-md-1 control-label" for="inputDefault"><?php echo e(trans('admin.user')); ?></label>
                    <div class="col-md-11">
                        <select name="recipent_list_user" class="form-control populate">
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>" <?php if($item->recipent_type == 'user' and $item->recipent_list == $user->id): ?> <?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($user->username); ?> (<?php echo e($user->name); ?>)</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group recipent" id="category" <?php if($item->recipent_type == 'category'): ?> <?php echo 'style="display: block;"'; ?> <?php endif; ?>>
                    <label class="col-md-1 control-label" for="inputDefault"><?php echo e(trans('admin.user_group')); ?></label>
                    <div class="col-md-11">
                        <select name="recipent_list_category" class="form-control populate">
                            <?php $__currentLoopData = $userCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>" <?php if($item->recipent_type == 'category' and $item->recipent_list == $cat->id): ?> <?php echo e('selected'); ?> <?php endif; ?> ><?php echo e($cat->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <textarea class="summernote" name="msg" required><?php echo e($item->msg); ?></textarea>
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php echo e($item->id); ?>">

                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary pull-left" type="submit"><?php echo e(trans('admin.th_edit')); ?></button>
                    </div>
                </div>

            </form>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $('.recipent_selection').change(function () {
                $('.recipent').hide();
                $('#' + $(this).val()).slideDown(300);
            })
        })
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Notifications','Edit']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/admin/notification/edit.blade.php ENDPATH**/ ?>