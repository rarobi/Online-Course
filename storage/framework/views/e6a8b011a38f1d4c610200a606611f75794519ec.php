<?php $__env->startSection('title'); ?>
    Course Facilitt
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page'); ?>

    <div class="tabs">
        <div id="edititem" class="tab-pane active">
                <form method="post" action="/admin/content/facility-update/<?php echo e($facility->id); ?>" class="form-horizontal form-bordered">
                    <?php echo e(csrf_field()); ?>

                    <!--<input type="hidden" name="edit" value="<?php echo e($facility->id); ?>">-->
                    

                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault"> Facility </label>
                        <div class="col-md-6">
                            <input type="text" name="name" value="<?php echo e($facility->name); ?>" class="form-control">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="inputDefault"> Status</label>
                        <div class="col-md-6">
                            <select name="status" class="form-control">
                                <option value=""> Select an option</option>
                                <option value="1"  <?php if($facility->is_show == 1): ?> selected <?php endif; ?>> Show </option>
                                <option value="0" <?php if($facility->is_show == 0): ?> selected <?php endif; ?>> Hide </option>
                            </select>
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


<?php echo $__env->make('admin.newlayout.layout',['breadcom'=>['Courses','Facility','Edit']], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/admin/content/edit_facility.blade.php ENDPATH**/ ?>