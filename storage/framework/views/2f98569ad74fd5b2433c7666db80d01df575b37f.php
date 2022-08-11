<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="header">
                <!--<span class="popular pull-left feat-s"><?php echo trans('main.featured'); ?></span>-->
                <span class="popular pull-left feat-s">ফিচার্ড কোর্স সমূহ</span>
                <!--<a href="/category" class="more-link pull-right"><?php echo e(trans('main.load_more')); ?></a>-->
                <a href="/category?order=featured" class="more-link pull-right">আরো দেখুন</a>
            </div>
            <div class="body body-s-r">
                <div class="owl-carousel">
                    <?php $__currentLoopData = $vip_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popular): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($popular->mode == 'publish'): ?>
                            <?php $meta = arrayToList($popular->metas, 'option', 'value'); ?>
                            <div class="owl-car-s" dir="rtl">
                                <a href="/product/<?php echo e($popular->id); ?>/<?php echo \Illuminate\Support\Str::slug($popular->title) ?? '-'; ?>" title="<?php echo e($popular->title); ?>" class="content-box" style="height: 330px">

                                    <span></span>
                                    <!--<img alt="<?php echo e($popular->title ?? ''); ?>" src="<?php echo e(!empty($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>"/>-->
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
                                    <h3><?php echo truncate($popular->title,30); ?></h3>
                                    <div class="footer">
                                        <p class=""><i class="fa fa-university"></i>
                                         <?php
                                            $user =  DB::table('users')->where('id', $popular->user_id)->first();
                                         ?>
                                         <?php if($user->name): ?>
                                            <?php echo e(truncate($user->name, 50)); ?>

                                         <?php else: ?>
                                            মুক্ত মঞ্চ
                                         <?php endif; ?>
                                         </p>
                                        <p class=""><i class="fa fa-clock-o"></i> <?php echo e(date('d F, Y', strtotime($popular->course_start_date))); ?></p>
                                        <p class=""><i class="fa fa-user-plus"></i>(<?php echo $popular->view; ?>)</p>
                                        <span class="avatar" title="<?php echo e($popular->user->name); ?>" onclick="window.location.href = '/profile/<?php echo e($popular->user->id); ?>'"><img src="<?php echo e(get_user_meta($popular->user_id,'avatar',get_option('default_user_avatar',''))); ?>"></span>
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
                       
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="two-ads-container">
                <div class="h-10 visible-xs"></div>
                <div class="row">
                    <?php if(isset($feature_course_left_ad)): ?>
                       <a href="<?php echo e($feature_course_left_ad->url); ?>"><img src="<?php echo e($feature_course_left_ad->image); ?>" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>
                     <?php else: ?>
                       <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>  
                    <?php endif; ?>
                    
                    <?php if(isset($feature_course_right_ad)): ?>
                        <a href="<?php echo e($feature_course_right_ad->url); ?>"><img src="<?php echo e($feature_course_right_ad->image); ?>" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>
                     <?php else: ?>
                        <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>  
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/view/parts/vip.blade.php ENDPATH**/ ?>