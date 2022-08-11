<?php echo $__env->make(getTemplate().'.view.layout.header',['title'=>'User Panel'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

   <?php echo $__env->make(getTemplate().'.user.layout.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->yieldContent('pages'); ?>
<?php echo $__env->make(getTemplate().'.user.layout.modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make(getTemplate().'.view.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/user/layout/layout.blade.php ENDPATH**/ ?>