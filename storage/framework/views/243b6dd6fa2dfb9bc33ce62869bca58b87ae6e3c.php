<?php $__env->startSection('title'); ?>
    <?php echo e(!empty($setting['site']['site_title']) ? $setting['site']['site_title'] : ''); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description',get_option('site_meta_description')); ?>
<?php $__env->startSection('meta_keyword',get_option('site_meta_keyword')); ?>
<?php $__env->startSection('page'); ?>
    <div class="container-fluid">
        <div class="h-20"></div>
        <div class="container">
            <div class="col-xs-12">
                <?php echo $content; ?>

            </div>
        </div>
        <div class="h-20"></div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.view.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/view/blog/page.blade.php ENDPATH**/ ?>