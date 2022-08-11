<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="header">
                <!--<span class="pull-left"><?php echo e(trans('main.newest_courses')); ?></span>-->
                <span class="pull-left"> নতুন কোর্স সমূহ</span>
                <!--<a href="/category?order=new" class="more-link pull-right"><?php echo e(trans('main.load_more')); ?></a>-->
                <a href="/category?order=new" class="more-link pull-right">আরো দেখুন</a>
            </div>
            
            
            <div class="body body-s-r" dir="ltr">
                <div class="owl-carousel">
                    <?php $__currentLoopData = $new_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $meta = arrayToList($new->metas, 'option', 'value'); ?>
                        <div class="owl-car-s" dir="rtl">
                             
                            <!--<span class="offer_badge">Free</span>-->
                            <a href="/product/<?php echo e($new->id); ?>/<?php echo \Illuminate\Support\Str::slug($new->title) ?? ''; ?>" title="<?php echo e($new->title); ?>" class="content-box" style="height: 330px">
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
                                
                                <h3><?php echo truncate($new->title,50); ?></h3>
                                <!--<h3><?php echo e(\Illuminate\Support\Str::limit($new->title,50)); ?>      </h3>-->
                               
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
                                     <p class=""><i class="fa fa-user-plus"></i>( <?php echo e($new->view); ?>)</p>
                                    <?php if(isset($new->user)): ?>
                                    <span class="avatar" title="<?php echo e($new->user->name); ?>" onclick="window.location.href = '/profile/<?php echo e($new->user->id); ?>'">
                                        <img src="<?php echo e(get_user_meta($new->user_id,'avatar',get_option('default_user_avatar',''))); ?>"/>
                                    </span>
                                    <?php endif; ?>
                                    <label class="pull-right content-clock"><?php echo e($new->district); ?></label>
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
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/view/parts/newest.blade.php ENDPATH**/ ?>