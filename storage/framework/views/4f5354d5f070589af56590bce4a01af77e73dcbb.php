<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="two-ads-container">
                <div class="h-10 visible-xs"></div>
                <div class="row">
                    <?php if(isset($popular_course_left_ad)): ?>
                       <a href="<?php echo e($popular_course_left_ad->url); ?>"><img src="<?php echo e($popular_course_left_ad->image); ?>" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>
                     <?php else: ?>
                       <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>  
                    <?php endif; ?>
                    
                    <?php if(isset($popular_course_right_ad)): ?>
                        <a href="<?php echo e($popular_course_right_ad->url); ?>"><img src="<?php echo e($popular_course_right_ad->image); ?>" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>
                     <?php else: ?>
                        <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>  
                    <?php endif; ?>
                </div>
            </div>
        </div><br><br>
        
        <div class="row">
            <div class="header">
                <!--<span class="pull-left"><?php echo e(trans('main.most_sold_products')); ?></span>-->
                 <span class="pull-left"> সর্বোচ্চ দেখা কোর্স সমূহ</span>
                <!--<a href="/category?order=sell" class="more-link pull-right"><?php echo e(trans('main.load_more')); ?></a>-->
                <a href="/category?order=most_view" class="more-link pull-right">আরো দেখুন</a>
            </div>
            <div class="body body-s-r" dir="ltr">
                <span class="nav-right"></span>
                <div class="owl-carousel">
                    <?php $__currentLoopData = $sell_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $meta = arrayToList($new->metas, 'option', 'value'); ?>
                        <div class="owl-car-s" dir="rtl">
                            <a href="/product/<?php echo e($new->id); ?>/<?php echo \Illuminate\Support\Str::slug($new->title) ?? '-'; ?>" title="<?php echo e($new->title); ?>" class="content-box" style="height: 330px">
                                <!--<img src="<?php echo e(!empty($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>" alt="<?php echo $new->title ?? ''; ?>"/>-->
                                <?php if($new->thumbnail_photo): ?>
                                    <img src="/uploads/content_thumbnails/<?php echo e($new->thumbnail_photo); ?>" class="img img-responsive img-thumbnail">
                                <?php else: ?>
                                    <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" class="img img-responsive img-thumbnail">
                                <?php endif; ?>
                                <?php if($new->free_extra_feature): ?>
                                    <span class="live_class">Special Offer</span>
                                <?php endif; ?>
                                <?php if(!$new->price): ?>
                                    <span class="live_class" style="margin-left:70px">Free</span>
                                <?php endif; ?>
                                
                                <h3><?php echo truncate($new->title,30); ?></h3>
                                <div class="footer">
                                    <p class=""><i class="fa fa-university"></i>
                                     <?php
                                        $user =  DB::table('users')->where('id', $new->user_id)->first();
                                     ?>
                                     <?php if($user->name): ?>
                                        <?php echo e(truncate($user->name, 50)); ?>

                                    <?php else: ?>
                                        মুক্ত মঞ্চ
                                    <?php endif; ?>
                                     </p>
                                     <p class=""><i class="fa fa-clock-o"></i> <?php echo e(date('d F, Y', strtotime($new->course_start_date))); ?></p>
                                     <p class=""><i class="fa fa-user-plus"></i>(<?php echo $new->view; ?>)</p>
                                    <?php if(isset($new->user)): ?>
                                        <span class="avatar" title="<?php echo e($new->user->name); ?>" onclick="window.location.href = '/profile/<?php echo e($new->user->id); ?>'">
                                            <img src="<?php echo e(get_user_meta($new->user_id,'avatar',get_option('default_user_avatar',''))); ?>">
                                        </span>
                                    <?php endif; ?>
                                    <label class="pull-right"><?php echo $new->district; ?></label>
                                    <span class="boxicon mdi mdi-map-marker pull-right"></span>
                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                    <label class="pull-left" style="margin-left:0px">
                                        <?php if(isset($new->price)): ?>
                                         <?php echo e(currencySign()); ?> 
                                             <?php if(isset($new->discount_price)): ?>
                                                <span style="text-decoration: line-through;color:red;"><?php echo e($new->discount_price); ?> </span>
                                             <?php endif; ?>
                                         <?php echo e($new->price); ?> 
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
</div><?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/view/parts/most_sell.blade.php ENDPATH**/ ?>