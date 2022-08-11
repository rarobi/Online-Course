<?php $__env->startSection('title'); ?>
    <?php echo $setting['site']['site_title'].'Channel- '.$chanel->title; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description',get_option('site_meta_description')); ?>
<?php $__env->startSection('meta_keyword',get_option('site_meta_keyword')); ?>
<?php $__env->startSection('page'); ?>
    <div class="container-fluid profile-top-background" style="background: url('<?php echo e($chanel->image ?? ''); ?>');">
        <div class="col-md-3 col-xs-12">

        </div>
        <div class="col-md-9 col-xs-12 bottom-section">
            <span>
                <label class="profile-name"><?php echo e($chanel->title); ?></label>
                <!--<?php if($follow == 0): ?>-->
                <!--    <a class="btn btn-red btn-hover-animate" href="/chanel/follow/<?php echo e($chanel->user_id); ?>"><span class="homeicon mdi mdi-plus"></span> <?php echo e(trans('main.follow')); ?></a>-->
                <!--<?php else: ?>-->
                <!--    <a class="btn btn-red btn-hover-animate" href="/chanel/unfollow/<?php echo e($chanel->user_id); ?>"><span class="homeicon mdi mdi-close"></span><?php echo e(trans('main.unfollow')); ?></a>-->
                <!--<?php endif; ?>-->
                <!--<label class="buttons"><span class="homeicon mdi mdi-account-heart"></span><p><?php echo e(!empty($follow) ? $follow : '0'); ?> <?php echo e(trans('main.followers')); ?></p></label>-->
                <!--<label class="buttons"><span class="homeicon mdi mdi-library-video"></span><p><?php echo e(!empty($chanel->contents_count) ? $chanel->contents_count : 0); ?> <?php echo e(trans('main.courses')); ?></p></label>-->
                <!--<label class="buttons"><span class="homeicon mdi mdi-clock"></span><p class="duration-f"><?php echo e(!empty($duration) ? $duration : '0'); ?>&nbsp;<?php echo e(trans('main.minutes_stat')); ?></p></label>-->
        </div>
    </div>

    <div class="container-fluid profile-middle-background">
        <div class="container">
            <div class="col-md-2 col-xs-12 tab-con">
                <?php if($chanel->formal == 'ok'): ?>
                    <label title="Formal" class="formal-chanel"><i class="mdi mdi-check-circle"></i></label>
                <?php endif; ?>
                <img class="sbox3" src="<?php echo e($chanel->avatar); ?>"/>
                <div class="rate-section raty" score="<?php echo channelRate($chanel->id) ?? 0; ?>"></div>
            </div>
            <div class="location-section col-md-10 col-xs-12">
                <div><b><?php echo $chanel->description; ?></b></div>
                <div><b><a href="<?=url('/') . '/' . Request::path();?>" class="uname-f"><?php echo e($chanel->username); ?></a></b></div>
            </div>
        </div>
    </div>

    <div class="h-10"></div>

    <!--<div class="container-fluid cont-box-bg">-->

    <!--    <div class="container remove-padding-xs">-->

    <!--        <div class="col-xs-12">-->

    <!--            <div class="h-20"></div>-->
    <!--            <div class="h-10"></div>-->

    <!--            <div class="profile-section-fade newest-container remove-padding-xs remove-bg-xs newest-container-r">-->
    <!--                <div class="body body-target-s">-->
    <!--                    <div class="row">-->
    <!--                        <?php $__currentLoopData = $chanel->contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
    <!--                            <?php if($vid->content != null): ?>-->
    <!--                                <?php $meta = arrayToList($vid->content->metas,'option','value'); ?>-->
    <!--                                <div class="col-md-3 col-sm-6 col-xs-6 tab-con">-->
    <!--                                    <a href="/product/<?php echo e($vid->content->id); ?>" title="<?php echo e($vid->content->title); ?>" class="content-box">-->
    <!--                                        <img alt="<?php echo e($vid->content->title ?? ''); ?>" src="<?php echo e(!empty($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>"/>-->
    <!--                                        <h3><?php echo truncate($vid->content->title,35); ?></h3>-->
    <!--                                        <div class="footer">-->
    <!--                                            <label class="pull-right"><?php echo e(!empty($meta['duration']) ? $meta['duration'] : ''); ?> <?php echo e(trans('main.min')); ?></label>-->
    <!--                                            <span class="boxicon mdi mdi-clock pull-right"></span>-->
    <!--                                            <span class="boxicon mdi mdi-wallet pull-left"></span>-->
    <!--                                            <label class="pull-left"><?php echo e(currencySign()); ?><?php echo e(!empty($meta['price']) ? $meta['price'] : '0'); ?></label>-->
    <!--                                        </div>-->
    <!--                                    </a>-->
    <!--                                </div>-->
    <!--                            <?php endif; ?>-->
    <!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->


    <!--        </div>-->

    <!--    </div>-->
    <!--</div>-->
    <!--<div class="container-fluid bg-gray-s">-->
    <!--    <div class="row ucp-menu-item">-->
    <!--        <div class="container">-->
    <!--            <div class="seven-cols">-->
    <!--                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
    <!--                    <a href="javascript:void(0)" tab-id="t-biography" class="item-box sbox3 arrow_box">-->
    <!--                        <span class="micon mdi mdi-account-tie"></span>-->
    <!--                        <span><?php echo e(trans('main.profile')); ?></span>-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
    <!--                    <a href="javascript:void(0)" tab-id="t-videos" class="item-box sbox3">-->
    <!--                        <span class="micon mdi mdi-library-video"></span>-->
                            <!--<span><?php echo e(trans('main.courses')); ?></span>-->
    <!--                        <span> Total Post</span>-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--                <div class="h-10 visible-xs"></div>-->
    <!--                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
    <!--                    <a href="javascript:void(0)" tab-id="t-channels" class="item-box sbox3">-->
    <!--                        <span class="micon mdi mdi-bullhorn"></span>-->
    <!--                        <span><?php echo e(trans('main.channels')); ?></span>-->
    <!--                    </a>-->
    <!--                </div>-->
                    <!--<div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
                    <!--    <a href="javascript:void(0)" tab-id="t-medals" class="item-box sbox3">-->
                    <!--        <span class="micon mdi mdi-medal"></span>-->
                    <!--        <span><?php echo e(trans('main.badges')); ?></span>-->
                    <!--    </a>-->
                    <!--</div>-->
                    <!--<div class="h-10 visible-xs"></div>-->
                    <!--<div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
                    <!--    <a href="javascript:void(0)" tab-id="t-record" class="item-box sbox3">-->
                    <!--        <span class="micon mdi mdi-video"></span>-->
                    <!--        <span><?php echo e(trans('main.future_courses')); ?></span>-->
                    <!--    </a>-->
                    <!--</div>-->
    <!--                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
    <!--                    <a href="javascript:void(0)" tab-id="t-article" class="item-box sbox3">-->
    <!--                        <span class="micon mdi mdi-notebook"></span>-->
                            <!--<span><?php echo e(trans('main.articles')); ?></span>-->
    <!--                        <span> Others</span>-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--                <div class="h-10 visible-xs"></div>-->
    <!--                <div class="col-md-1 col-sm-6 col-xs-12 tab-con">-->
    <!--                    <a href="javascript:void(0)" tab-id="t-request" class="item-box sbox3">-->
    <!--                        <span class="micon mdi mdi-camera-enhance"></span>-->
                            <!--<span><?php echo e(trans('main.request_course')); ?></span>-->
    <!--                        <span> Gallery</span>-->
    <!--                    </a>-->
    <!--                </div>-->
                    
    <!--                <div class="col-md-3 col-xs-12 text-center">-->
    <!--                    <ul class="profile_social">-->
    <!--                        <?php if(!empty($socials)): ?>-->
    <!--                            <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
    <!--                                <li class="profile_social_list">-->
    <!--                                    <a href="<?php echo e($social->link); ?>" target="_blank" title="<?php echo e($social->title); ?>">-->
    <!--                                        <img src="<?php echo e($social->icon); ?>" alt="<?php echo e($social->title); ?>"/>-->
    <!--                                    </a>-->
    <!--                                </li>-->
    <!--                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
    <!--                        <?php endif; ?>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="container-fluid bg-gray-s " style="margin-top:10px">
        <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!--<?php if(isset($ads)): ?>-->
                <!--<?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                <!--    <?php if($ad->position == 'main-slider-side'): ?>-->
                <!--        <a href="<?php echo e($ad->url); ?>"><img src="<?php echo e($ad->image); ?>" class="<?php echo e($ad->size); ?>"></a>-->
                <!--    <?php endif; ?>-->
                <!--<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                <!--<?php endif; ?>-->
                <div class="row">
                <?php if(isset($sidebar_top_ad)): ?>
                    <a href="<?php echo e($sidebar_top_ad->url); ?>"><img src="<?php echo e($sidebar_top_ad->image); ?>" class="<?php echo e($sidebar_top_ad->size); ?>"></a>
                <?php else: ?>
                    <a href="#"><img src="<?php echo e(asset('assets/default/images/dummy-add.jpg')); ?>" class="col-md-12 col-sm-12 col-xs-12"></a>    
                <?php endif; ?>
                </div>
                <br>
                <div class="row">
                    <?php if(isset($sidebar_bottom_ad)): ?>
                        <a href="<?php echo e($sidebar_bottom_ad->url); ?>"><img src="<?php echo e($sidebar_bottom_ad->image); ?>" class="<?php echo e($sidebar_bottom_ad->size); ?>"></a>
                    <?php else: ?>
                        <a href="#"><img src="<?php echo e(asset('assets/default/images/dummy-add.jpg')); ?>" class="col-md-12 col-sm-12 col-xs-12"></a>    
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-8 remove-padding-xs">
                <div id="t-biography" class="profile-section-fade profile-section sbox3 doview">
                    <div class="h-20"></div>
                    <?php if(!isset($chanel->contents)): ?>
                        <div class="text-center">
                            <img src="/assets/default/images/empty/biography.png">
                            <div class="h-20"></div>
                            <span class="empty-first-line"> No channel video found</span>
                            <div class="h-20"></div>
                        </div>
                    <?php else: ?>
                        Channel's video list
                        
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col">Link</th>>
                            </tr>
                          </thead>
                          <tbody>
                             
                            <?php $__currentLoopData = $chanel->contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($c->content): ?>
                                <tr>
                                  <td><?php echo e($c->content->title); ?></td>
                                  <td>Not Found</td>
                            
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="h-10"></div>
     
        <div class="row">
            <!--<?php if(isset($ads)): ?>-->
            <!--    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
            <!--        <?php if($ad->position == 'product-page'): ?>-->
            <!--            <a href="<?php echo e($ad->url); ?>"><img src="<?php echo e($ad->image); ?>" class="col-md-12" style="height:200px"></a>-->
            <!--        <?php endif; ?>-->
            <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
            <!--<?php endif; ?>-->
            <?php if(isset($footer_ad)): ?>
                <a href="<?php echo e($footer_ad->url); ?>"><img src="<?php echo e($footer_ad->image); ?>" class="class="col-md-12" style="height:200px"></a>
            <?php else: ?>
                <a href="#"><img src="<?php echo e(asset('assets/default/images/dummy-add.jpg')); ?>" class="col-md-12 col-sm-12 col-xs-12" style="height:200px"></a>    
            <?php endif; ?>
            
        </div>
         <div class="h-10"></div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $('.ucp-menu-item a').click(function () {
                var id = $(this).attr('tab-id');
                $('.ucp-menu-item a').removeClass('arrow_box');
                $(this).addClass('arrow_box');
                $('.profile-section-fade').not('#' + id).fadeOut(500, function () {
                    $('#' + id).fadeIn(500);
                });
            })
        })
    </script>
    <script>
        $('.raty').raty({
            starType: 'i',
            score: function (){
                return $(this).attr('score');
            },
            readOnly:true
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.view.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/view/chanel/chanel.blade.php ENDPATH**/ ?>