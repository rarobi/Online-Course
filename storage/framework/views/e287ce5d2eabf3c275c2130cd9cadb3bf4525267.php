<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="header">
                <!--<span class="popular pull-left header-s"><?php echo e(trans('main.live_content')); ?></span>-->
                <span class="popular pull-left header-s">সরাসরি চলমান কোর্স</span>
                <!--<a href="/category?course=webinar" class="pull-right more-link"><?php echo e(trans('main.load_more')); ?></a>-->
                <a href="/category?order=live" class="pull-right more-link">আরো দেখুন</a>
            </div>
            <div class="body body-s-r">
                <span class="nav-right"></span>
                <div class="owl-carousel">
                    <?php $__currentLoopData = $live_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <?php $meta = arrayToList($popular->metas, 'option', 'value'); ?>
                        <div class="owl-car-s" dir="rtl">
                            <a href="/product/<?php echo e($popular->id); ?>" title="<?php echo e($popular->title); ?>" class="content-box" style="height: 320px">
                                <!--<img src="<?php echo e(!empty($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>"/>-->
                                <?php if($popular->thumbnail_photo): ?>
                                    <img src="/uploads/content_thumbnails/<?php echo e($popular->thumbnail_photo); ?>" class="img img-responsive img-thumbnail">
                                <?php else: ?>
                                    <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" class="img img-responsive img-thumbnail">
                                <?php endif; ?>
                                
                                <?php if($popular->free_extra_feature): ?>
                                    <span class="live_class">Special Offer</span>
                                <?php endif; ?>
                                <?php if(!$popular->price): ?>
                                    <span class="live_class" style="margin-left:70px">Free</span>
                                <?php endif; ?>
                                <h3><?php echo truncate($popular->title,35); ?></h3>
                                <div class="footer">
                                    <!-- <p class="">-->
                                    <!--  <?php if($popular->live_url): ?>-->
                                    <!--  <a href="<?php echo e($popular->live_url); ?>" title="Live URL" class="btn btn-info" target="_blank">Join Class</a>-->
                                    <!--  <?php endif; ?>-->
                                    <!--</p>-->
                                     <p class=""><i class="fa fa-clock-o"></i> <?php echo e(date('d F, Y', strtotime($popular->course_start_date))); ?></p>
                                     <p class=""><i class="fa fa-user-plus"></i>(<?php echo $popular->view; ?>)</p>
                                    <?php if(isset($popular->user)): ?>
                                    <span class="avatar" title="<?php echo e($popular->user->name); ?>" onclick="window.location.href = '/profile/<?php echo e($popular->user->id); ?>'"><img src="<?php echo e(get_user_meta($popular->user_id,'avatar',get_option('default_user_avatar',''))); ?>"></span>
                                    <?php endif; ?>
                                    <label class="pull-right content-clock"><?php echo $popular->district; ?></label>
                                    <span class="boxicon mdi mdi-map-marker pull-right"></span>
                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                     <label class="pull-left" style="margin-left:0px">
                                            <?php if(isset($popular->price)): ?>
                                             <?php echo e(currencySign()); ?> 
                                                 <?php if(isset($popular->discount_price)): ?>
                                                    <span style="text-decoration: line-through;color:red;"><?php echo e($popular->discount_price); ?> </span>
                                                 <?php endif; ?>
                                             <?php echo e($popular->price); ?> 
                                            <?php else: ?>
                                                <?php echo e(trans('main.free')); ?>

                                            <?php endif; ?>
                                        </label>
                                    
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <span class="nav-left pull-right"></span>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/view/parts/live.blade.php ENDPATH**/ ?>