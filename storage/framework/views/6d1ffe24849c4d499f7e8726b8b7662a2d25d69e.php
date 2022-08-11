<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="header">
                <!--<span class="pull-left"><?php echo e(trans('main.newest_courses')); ?></span>-->
                <span class="popular pull-left">ভেন্যু ভাড়া </span>
                <!--<a href="/category?order=new" class="more-link pull-right"><?php echo e(trans('main.load_more')); ?></a>-->
                <a href="/category?order=venu" class="more-link pull-right">আরো দেখুন</a>
            </div>
            
            
            <div class="body body-s-r" dir="ltr">
                <div class="owl-carousel">
                    <?php $__currentLoopData = $venu_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                        <!--<?php $meta = arrayToList($new->metas, 'option', 'value'); ?>-->
                        <div class="owl-car-s" dir="rtl">
                            <a href="/venu/<?php echo e($new->id); ?>/<?php echo \Illuminate\Support\Str::slug($new->title) ?? ''; ?>" title="<?php echo e($new->title); ?>" class="content-box">
                                <!--<img src="<?php echo e(!empty($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>" alt="<?php echo $new->title ?? ''; ?>"/>-->
                                 <?php if($new->thumbnail_photo): ?>
                                    <img src="/uploads/venu_thumbnails/<?php echo e($new->thumbnail_photo); ?>" class="img img-responsive img-thumbnail">
                                <?php else: ?>
                                    <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" class="img img-responsive img-thumbnail">
                                <?php endif; ?>
                                <?php if($new->free_extra_feature): ?>
                                <span class="live_class">Special Offer</span>
                                <?php endif; ?>
                                <h3><?php echo truncate($new->title,30); ?></h3>
                                <div class="footer">
                                    <!--<?php if(isset($new->user)): ?>-->
                                    <!--<span class="avatar" title="<?php echo e($new->user->name); ?>" onclick="window.location.href = '/profile/<?php echo e($new->user->id); ?>'">-->
                                    <!--    <img src="<?php echo e(get_user_meta($new->user_id,'avatar',get_option('default_user_avatar',''))); ?>"/>-->
                                    <!--</span>-->
                                    <!--<?php endif; ?>-->
                                    <label class="pull-right content-clock"><?php echo $new->district; ?></label>
                                    <span class="boxicon mdi mdi-map-marker pull-right"></span>
                                    <!--<span class="boxicon mdi mdi-wallet pull-left"></span>-->

                                    <label class="pull-left">
                                        <?php if(isset($new->price)): ?>
                                            <?php echo e(currencySign()); ?><?php echo e($new->price); ?> /<?php echo e($new->price_type); ?>

                                        <?php else: ?>
                                            <?php echo e(trans('main.free')); ?>

                                        <?php endif; ?>
                                    </label>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/view/parts/venu.blade.php ENDPATH**/ ?>