<div class="container-fluid">
    <div class="container news-container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-6 news-section">
                <div class="row contents_box">
                    <div class="header">
						<i class="secicon mdi mdi-script-text"></i>
                        <!--<span><?php echo e(trans('main.latest_articles')); ?></span>-->
                         <span>সাম্প্রতিক আর্টিকেল</span>
                    </div>
                    <div class="body">
                        <ul>
                            <?php $__currentLoopData = $article_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="/article/item/<?php echo e($article->id); ?>/<?php echo \Illuminate\Support\Str::slug($article->title) ?? ''; ?>">
                                        <img src="<?php echo e($article->image); ?>" alt="<?php echo e($article->title ?? ''); ?>"><span><?php echo e($article->title); ?></span><label for=""><?php echo e(date('l d F Y',$article->created_at)); ?></label>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="more-link">
						<i class="secicon mdi mdi-dots-horizontal"></i>
                        <!--<a href="/article/list"><?php echo e(trans('main.more')); ?></a>-->
                        <a href="/article/list">আরো দেখুন</a>
                    </div>
                </div>
                <div class="h-10"></div>
                <div class="row contents_box">
                    <div class="header header-news">
						<i class="secicon mdi mdi-clipboard-text"></i>
                        <!--<span><?php echo e(trans('main.latest_news')); ?></span>-->
                        <span>সাম্প্রতিক সংবাদ</span>
                    </div>
                    <div class="body">
                        <ul>
                            <?php $__currentLoopData = $blog_post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="/blog/post/<?php echo e($post->id); ?>/<?php echo \Illuminate\Support\Str::slug($post->title) ?? ''; ?>"><img src="<?php echo e($post->image); ?>" alt=""><span><?php echo e($post->title); ?></span><label for=""><?php echo e(date('l d F Y',$post->created_at)); ?></label></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="more-link">
						<i class="secicon mdi mdi-dots-horizontal"></i>
                        <!--<a href="/blog"><?php echo e(trans('main.more')); ?></a>-->
                        <a href="/blog">আরো দেখুন</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-6">
                <div class="row-xs">
                    <div class="two-ads-container">
                        <div class="h-10 visible-xs"></div>
                        <div class="row">
                            <?php if(isset($live_course_left_ad)): ?>
                               <a href="<?php echo e($live_course_left_ad->url); ?>"><img src="<?php echo e($live_course_left_ad->image); ?>" class="col-md-6 col-sm-6 col-xs-12" height="150"></a>
                             <?php else: ?>
                               <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="150"></a>  
                            <?php endif; ?>
                            
                            <?php if(isset($live_course_right_ad)): ?>
                                <a href="<?php echo e($live_course_right_ad->url); ?>"><img src="<?php echo e($live_course_right_ad->image); ?>" class="col-md-6 col-sm-6 col-xs-12" height="150"></a>
                             <?php else: ?>
                                <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="150"></a>  
                            <?php endif; ?>
                        </div>
                    </div>
                </div><br>
                <div class="row-xs contents_box">
                    <div class="top-user-container">
                        <div class="header">
							<i class="secicon mdi mdi-bank"></i>
                            <!--<span class="best-users"><?php echo e(trans('main.top_vendors')); ?></span>-->
                            <span class="best-users"> সেরা প্রতিষ্ঠান </span>
                        </div>
                        <div class="user-tabs">
                            <!--<ul class="nav nav-tabs nav-justified" role="tablist">-->
                            <!--    <li class="active"><a href="#tab1" role="tab" data-toggle="tab"><?php echo e(trans('main.courses_feedback')); ?></a></li>-->
                            <!--    <li><a href="#tab2" role="tab" data-toggle="tab"><?php echo e(trans('main.courses_count')); ?></a></li>-->
                            <!--    <li><a href="#tab3" role="tab" data-toggle="tab"><?php echo e(trans('main.sales')); ?></a></li>-->
                            <!--</ul>-->
                            <!-- TAB CONTENT -->
                            <div class="tab-content">
                                <div class="active tab-pane fade in" id="tab3">
                                    <?php if(isset($user_popular)): ?>
                                        <?php $__currentLoopData = $user_popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $up): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $meta = arrayToList($up->usermetas,'option','value'); ?>
                                            <div class="col-md-3 tab-con">
                                                <a href="/profile/<?php echo e($up->id); ?>">
                                                    <img alt="<?php echo e($up->username ?? ''); ?>" src="<?php echo e(!empty($meta['avatar']) ? $meta['avatar'] : '/assets/default/images/user.png'); ?>">
                                                    <span><?php echo e(!empty($up->name) ? $up->name : ''); ?></span>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-10"></div>
                <div class="row-xs contents_box">
                    <div class="top-user-container">
                        <div class="header">
							<i class="secicon mdi mdi-teach"></i>
                            <!--<span class="best-chanels"><?php echo e(trans('main.top_channels')); ?></span>-->
                            <span class="best-chanels"> সেরা চ্যানেল</span>
                        </div>
                        <div class="user-tabs">
                            <!--<ul class="nav nav-tabs nav-justified" role="tablist">-->
                            <!--    <li class="active"><a href="#tab4" role="tab" data-toggle="tab"><?php echo e(trans('main.newest')); ?></a></li>-->
                            <!--    <li><a href="#tab5" role="tab" data-toggle="tab"><?php echo e(trans('main.most_viewed')); ?></a></li>-->
                            <!--    <li><a href="#tab6" role="tab" data-toggle="tab"><?php echo e(trans('main.best_rated')); ?></a></li>-->
                            <!--</ul>-->
                            <!-- TAB CONTENT -->
                            <div class="tab-content">
                                <!--<div class="active tab-pane fade in" id="tab4">-->
                                <!--    <?php if(isset($channels)): ?>-->
                                <!--        <?php $__currentLoopData = $channels['new']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                                <!--            <div class="col-md-3 tab-con">-->
                                <!--                <a href="/chanel/<?php echo e($ur->username); ?>">-->
                                <!--                    <img alt="<?php echo e($ur->title ?? ''); ?>" src="<?php echo e(!empty($ur->avatar) ? $ur->avatar : '/assets/default/images/user.png'); ?>">-->
                                <!--                    <span><?php echo e(!empty($ur->title) ? $ur->title : ''); ?></span>-->
                                <!--                </a>-->
                                <!--            </div>-->
                                <!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                                <!--    <?php endif; ?>-->
                                <!--</div>-->
                                <div class="active tab-pane fade in" id="tab5">
                                    <?php if(isset($channels)): ?>
                                        <?php $__currentLoopData = $channels['view']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3 tab-con">
                                                <a href="/chanel/<?php echo e($ur->username); ?>">
                                                    <img alt="<?php echo e($ur->title ?? ''); ?>" src="<?php echo e(!empty($ur->avatar) ? $ur->avatar : '/assets/default/images/user.png'); ?>">
                                                    <span><?php echo e(!empty($ur->title) ? $ur->title : ''); ?></span>
                                                </a>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                                <!--<div class="tab-pane fade" id="tab6">-->
                                <!--    <?php if(isset($channels)): ?>-->
                                <!--        <?php $__currentLoopData = $channels['popular']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                                <!--            <div class="col-md-3 tab-con">-->
                                <!--                <a href="/chanel/<?php echo e($ur->username); ?>">-->
                                <!--                    <img alt="<?php echo e($ur->title ?? ''); ?>" src="<?php echo e(!empty($ur->avatar) ? $ur->avatar : '/assets/default/images/user.png'); ?>">-->
                                <!--                    <span><?php echo e(!empty($ur->title) ? $ur->title : ''); ?></span>-->
                                <!--                </a>-->
                                <!--            </div>-->
                                <!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                                <!--    <?php endif; ?>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/view/parts/news.blade.php ENDPATH**/ ?>