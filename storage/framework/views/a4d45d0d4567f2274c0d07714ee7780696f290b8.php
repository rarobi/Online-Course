<?php $__env->startSection('title'); ?>
    <?php echo e(get_option('site_title','')); ?> - Division Wise Content
<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description',get_option('site_meta_description')); ?>
<?php $__env->startSection('meta_keyword',get_option('site_meta_keyword')); ?>
<?php $__env->startSection('page'); ?>

    <div class="container-fluid">
        <div class="row cat-search-section" style="background: url('');">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12 tab-con cat-icon-container">
                   
                </div>
                <div class="col-md-2 tab-con">
                    <div class="h-10"></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box box-s">
                        <div class="container-2">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row cat-tag-section">
            <div class="container">
               <div class="user-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab1" role="tab" data-toggle="tab"><strong>Courses</strong></a></li>
                            <li><a href="#tab2" role="tab" data-toggle="tab"><strong>Venue</strong></a></li>
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1">
                                <div class="col-md-12 col-xs-12" style="margin-top:20px">
                                    <div class="newest-container newest-container-s">
                                        <div class="row body body-target body-target-s">
                                           <?php if(count($contents) > 0): ?> 
                                                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php if($content->type == 'course'): ?>
                                                    <div class="col-md-4 col-sm-6 col-xs-12 pagi-content tab-con">
                                                        <a href="/product/<?php echo e($content['id']); ?>/<?php echo \Illuminate\Support\Str::slug($content['title']) ?? '-'; ?>" title="<?php echo e($content['title']); ?>"
                                                               class="content-box pagi-content-box" style="height:280px">
                    
                                                                <div class="img-container">
                                                                    <!--<img alt="<?php echo e($content['title'] ?? ''); ?>" src="<?php echo e($content['metas']['thumbnail'] ?? ''); ?>"/>-->
                                                                    <?php if($content['thumbnail_photo']): ?>
                                                                            <?php if($content['type'] == 'venu'): ?>
                                                                            <img src="/uploads/venu_thumbnails/<?php echo e($content['thumbnail_photo']); ?>" class="img img-responsive img-thumbnail">
                                                                            <?php else: ?>
                                                                            <img src="/uploads/content_thumbnails/<?php echo e($content['thumbnail_photo']); ?>" class="img img-responsive img-thumbnail">
                                                                            <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" class="img img-responsive img-thumbnail">
                                                                        <?php endif; ?>
                                                                    <?php if($content['discount'] != null): ?>
                                                                    <span class="off-badge">
                                                                        <label class="text-center">%<?php echo e(!empty($content['discount']['off']) ? $content['discount']['off'] : 0); ?><br><span><?php echo e(trans('main.discount')); ?></span></label>
                                                                    </span>
                                                                    <?php endif; ?>
                                                                    <?php if($content['type'] == 'webinar' || $content['type'] == 'course+webinar'): ?>
                                                                        <span class="live_class">Live class</span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <h3><?php echo truncate($content['title'],35); ?></h3>
                                                                <div class="footer">
                                                                    <span class="avatar" title="<?php echo e($content['user']['name']); ?>"
                                                                         onclick="window.location.href = '/profile/<?php echo e($content['user']['id']); ?>'"><img
                                                                            src="<?php echo e(get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar',''))); ?>">
                                                                    </span>
                    
                                                                    
                                                                    <p class=""><i class="fa fa-clock-o"></i><?php echo e(contentDuration($content['id'])); ?></p>
                                                                    <p class=""><i class="fa fa-user-plus"></i>( <?php echo e($content['view']); ?>)</p>
                    
                                                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                                    <?php if(!empty($content['id']) and !empty($content['category_id']) and !empty($content['price'])): ?>
                                                                        <label
                                                                            class="pull-left"><?php echo e(price($content['id'],$content['category_id'],$content['price'])['price_txt']); ?>

                                                                        </label>
                                                                    <?php endif; ?>
                                                                     <p
                                                                        class="pull-right content-clock"><?php echo e($content['district']); ?>

                                                                    </p>
                                                                    <span class="boxicon mdi mdi-map-marker pull-right"></span>
                                                                </div>
                                                            </a>
                                                    </div>
                                                   
                                                  <?php endif; ?>  
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php else: ?>
                                                <p>No Data Found</p>  
                                          <?php endif; ?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <div class="col-md-12 col-xs-12" style="margin-top:20px">
                                    <div class="newest-container newest-container-s">
                                        <div class="row body body-target body-target-s">
                                           <?php if(count($contents) > 0): ?> 
                                            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <?php if($content->type == 'venue'): ?>
                                                <div class="col-md-4 col-sm-6 col-xs-12 pagi-content tab-con">
                                                    <a href="/product/<?php echo e($content['id']); ?>/<?php echo \Illuminate\Support\Str::slug($content['title']) ?? '-'; ?>" title="<?php echo e($content['title']); ?>"
                                                           class="content-box pagi-content-box" style="height:280px">
                
                                                            <div class="img-container">
                                                                <!--<img alt="<?php echo e($content['title'] ?? ''); ?>" src="<?php echo e($content['metas']['thumbnail'] ?? ''); ?>"/>-->
                                                                <?php if($content['thumbnail_photo']): ?>
                                                                        <?php if($content['type'] == 'venu'): ?>
                                                                        <img src="/uploads/venu_thumbnails/<?php echo e($content['thumbnail_photo']); ?>" class="img img-responsive img-thumbnail">
                                                                        <?php else: ?>
                                                                        <img src="/uploads/content_thumbnails/<?php echo e($content['thumbnail_photo']); ?>" class="img img-responsive img-thumbnail">
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <img src="<?php echo e(url('/assets/default/images/profile_big_icon.png')); ?>" class="img img-responsive img-thumbnail">
                                                                    <?php endif; ?>
                                                                <?php if($content['discount'] != null): ?>
                                                                <span class="off-badge">
                                                                    <label class="text-center">%<?php echo e(!empty($content['discount']['off']) ? $content['discount']['off'] : 0); ?><br><span><?php echo e(trans('main.discount')); ?></span></label>
                                                                </span>
                                                                <?php endif; ?>
                                                                <?php if($content['type'] == 'webinar' || $content['type'] == 'course+webinar'): ?>
                                                                    <span class="live_class">Live class</span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <h3><?php echo truncate($content['title'],35); ?></h3>
                                                            <div class="footer">
                                                                <span class="avatar" title="<?php echo e($content['user']['name']); ?>"
                                                                     onclick="window.location.href = '/profile/<?php echo e($content['user']['id']); ?>'"><img
                                                                        src="<?php echo e(get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar',''))); ?>">
                                                                </span>
                
                                                                
                                                                <p class=""><i class="fa fa-clock-o"></i><?php echo e(contentDuration($content['id'])); ?></p>
                                                                <p class=""><i class="fa fa-user-plus"></i>( <?php echo e($content['view']); ?>)</p>
                
                                                                <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                                <?php if(!empty($content['id']) and !empty($content['category_id']) and !empty($content['price'])): ?>
                                                                    <label
                                                                        class="pull-left"><?php echo e(price($content['id'],$content['category_id'],$content['price'])['price_txt']); ?>

                                                                    </label>
                                                                <?php endif; ?>
                                                                 <p
                                                                    class="pull-right content-clock"><?php echo e($content['district']); ?>

                                                                </p>
                                                                <span class="boxicon mdi mdi-map-marker pull-right"></span>
                                                            </div>
                                                        </a>
                                                </div>
                                             
                                              <?php endif; ?>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php else: ?>
                                                <p>No Data Found</p>  
                                          <?php endif; ?>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(function () {
            pagination('.body-target', <?php echo e(!empty($content['discount']['off']) ? $content['discount']['off'] : 6); ?>, 0);
            $('.pagi').pagination({
                items: <?php echo count($contents); ?>,
                itemsOnPage: <?php echo e(!empty($content['discount']['off']) ? $content['discount']['off'] : 6); ?>,
                cssStyle: 'light-theme',
                prevText: 'Pre.',
                nextText: 'Next',
                onPageClick: function (pageNumber, event) {
                    pagination('.body-target',<?php echo e(!empty($content['discount']['off']) ? $content['discount']['off'] : 6); ?>, pageNumber - 1);
                }
            });
        });
    </script>
    <script type="application/javascript" src="/assets/default/javascripts/category-page-custom.js"></script>
    <script>
        //District change
        $('.division-list').change(function() {
        var divisionName = $(this).val();
        if(divisionName != '') {
            divisionList(divisionName);
            }
        });
        
        function divisionList(divisionName) {
        var URL = "<?php echo e(url('pages/district')); ?>" +'/'+ divisionName;
        $.ajax({
            type: "GET",
            url: URL,
            success: function(data) {
                var selected = '';

                var selectedDistrict =  $.trim('<?php if(isset($dist_name)): ?> <?php echo ($dist_name); ?><?php else: ?> <?php echo ''; ?><?php endif; ?>');

                var options = $(".district-list");
                options.empty();

                options.append('<option selected="selected" value="">Select a district</option>');
             
                $.each(data, function(key, value) {

                    options.append($("<option />").val(key).text(value));
                    if(key == selectedDistrict) {
                        console.log('ok');
                        selected    =   key;
                    }
                });

                options.niceSelect();
                options.eq(-1).remove();
                if(selected != ''){
                    options.val(selected).niceSelect('update');
                }
            }
        });
    }
    
       //Upazila Change
       $('.district-list').change(function() {
        var districtName = $(this).val();
        if(districtName != '') {
            districtList(districtName);
            }
        });
        
        function districtList(districtName) {
        var URL = "<?php echo e(url('pages/upazila')); ?>" +'/'+ districtName;
        $.ajax({
            type: "GET",
            url: URL,
            success: function(data) {
                var selected = '';

                var selectedUpazila =  $.trim('<?php if(isset($dist_name)): ?> <?php echo ($dist_name); ?><?php else: ?> <?php echo ''; ?><?php endif; ?>');

                var options = $(".upazila-list");
                options.empty();

                options.append('<option selected="selected" value="">Select an upazila</option>');
             
                $.each(data, function(key, value) {

                    options.append($("<option />").val(key).text(value));
                    if(key == selectedUpazila) {
                        console.log('ok');
                        selected    =   key;
                    }
                });

                options.niceSelect();
                options.eq(-1).remove();
                if(selected != ''){
                    options.val(selected).niceSelect('update');
                }
            }
        });
    }
    
    //Search based on division , district & upazila
        // $('.search_btn').click(function() {
        //     alert(1);
        // }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(getTemplate().'.view.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/view/category/division_wise.blade.php ENDPATH**/ ?>