<?php $__env->startSection('title'); ?>
    <?php echo e(get_option('site_title','')); ?> - <?php echo e($category->title ?? 'Categories'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('meta_description',get_option('site_meta_description')); ?>
<?php $__env->startSection('meta_keyword',get_option('site_meta_keyword')); ?>
<?php $__env->startSection('page'); ?>

    <div class="container-fluid">
        <div class="row cat-search-section" style="background: url('<?php echo e($category->background ?? ''); ?>');">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12 tab-con cat-icon-container">
                    <span><img src="<?php echo e($category->icon); ?>" class="category-icon"/> </span>
                    <span><span><?php echo e($category->title); ?></span></span>
                </div>
                <div class="col-md-2 tab-con">
                    <div class="h-10"></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box box-s">
                        <div class="container-2">
                            <form>
                                <?php echo e(csrf_field()); ?>

                                <input type="search" id="search" name="q"
                                       value="<?php echo e(!empty(request()->get('q')) ? request()->get('q') : ''); ?>"
                                       placeholder="Search in  <?php echo e(!empty($category->title) ? $category->title : 'Search in all categories'); ?>"/>
                                <span class="icon"><i class="homeicon mdi mdi-magnify"></i></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row cat-tag-section">
            <div class="container">
                <div class="col-md-7 col-xs-12 text-left tab-con">
                  <form method="get" action="<?php echo e($category->title); ?>" class="">
                    <div class="form-group pull-left">
                        <select class="form-control division-list" name="division" id="">
                            <option value="">Select a division</option>
                            <?php if(count($divisions) > 0): ?>
                                <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($list->division_name); ?>"> <?php echo e($list->division_name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?> 
                        </select>
                    </div>
                    <div class="form-group pull-left" style="margin:0px 2px 0px 2px">
                        <select class="form-control district-list" name="district">
                            <option value="">Select a district</option>
                            <?php if(count($districts) > 0): ?>
                                <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($list->district_name); ?>"> <?php echo e($list->district_name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?> 
                        </select>
                    </div>
                    <div class="form-group pull-left">
                        <select class="form-control upazila-list" name="upazila">
                            <option value="">Select a thana/upazila</option>
                            <?php if(count($upazilas) > 0): ?>
                                <?php $__currentLoopData = $upazilas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($list->upazilla_name); ?>"> <?php echo e($list->upazilla_name); ?> </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group pull-left" style="margin:0px 2px 0px 2px">
                        <button type="submit" name="search" class="pull-left search_btn"style="height:34px;background: #13ce9c;border: #13ce9c;border-radius: 4px;"><span class="homeicon mdi mdi-magnify"></span></button>
                    </div>
                  </form>  
                </div>
                <div class="col-md-2 col-xs-12 tab-con">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary <?php if($pricing == 'all' || $pricing == ''): ?> active <?php endif; ?>">
                            <input type="radio" name="pricing" value="all"
                                   <?php if($pricing == 'all' || $pricing == ''): ?> checked <?php endif; ?>> <?php echo e(trans('main.all')); ?>

                        </label>
                        <label class="btn btn-primary <?php if($pricing == 'free'): ?> active <?php endif; ?>">
                            <input type="radio" name="pricing" value="free"
                                   <?php if($pricing == 'free'): ?> checked <?php endif; ?>> <?php echo e(trans('main.free')); ?>

                        </label>
                        <label class="btn btn-primary <?php if($pricing == 'price'): ?> active <?php endif; ?>">
                            <input type="radio" name="pricing" value="price"
                                   <?php if($pricing == 'price'): ?> checked <?php endif; ?>> <?php echo e(trans('main.paid')); ?>

                        </label>
                    </div>
                </div>
                <div class="col-md-1 col-xs-12 text-left tab-con">
                    <div class="form-group">
                        <!--<label class="control-label form-label-s"-->
                        <!--       for="inputDefault"><?php echo e(trans('main.postal_delivery')); ?></label>-->
                        <!--<div class="switch switch-sm switch-primary sw-prim-s">-->
                        <!--    <input type="hidden" value="0" name="post-sell">-->
                        <!--    <input type="checkbox" name="post-sell" value="1"-->
                        <!--           <?php if(!empty(request()->get('post-sell')) && request()->get('post-sell') == 1): ?> checked-->
                        <!--           <?php endif; ?> data-plugin-ios-switch/>-->
                        <!--</div>-->
                        <!--&nbsp;&nbsp;-->
                        <!--<label class="control-label cont-lab-s"-->
                        <!--       for="inputDefault"><?php echo e(trans('main.supported_course')); ?></label>-->
                        <!--<div class="switch switch-sm switch-primary sw-prim-s">-->
                        <!--    <input type="hidden" value="0" name="support">-->
                        <!--    <input type="checkbox" name="support" value="1"-->
                        <!--           <?php if(!empty(request()->get('support')) && request()->get('support') == 1): ?> checked-->
                        <!--           <?php endif; ?> data-plugin-ios-switch/>-->
                        <!--</div>-->
                        &nbsp;&nbsp;
                        <label class="control-label form-label-s"
                               for="inputDefault"><?php echo e(trans('main.discount')); ?></label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="off">
                            <input type="checkbox" name="off" value="1" <?php if($off == 1): ?> checked
                                   <?php endif; ?> data-plugin-ios-switch/>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 text-left tab-con">
                    <div class="form-group pull-left">
                        <select class="form-control" id="order">
                            <option value="new" <?php if($order == 'new'): ?> selected <?php endif; ?>><?php echo e(trans('main.newest')); ?></option>
                            <option value="old" <?php if($order == 'old'): ?> selected <?php endif; ?>><?php echo e(trans('main.oldest')); ?></option>
                            <option value="price"
                                    <?php if($order == 'price'): ?> selected <?php endif; ?>><?php echo e(trans('main.price_ascending')); ?></option>
                            <option value="cheap"
                                    <?php if($order == 'cheap'): ?> selected <?php endif; ?>><?php echo e(trans('main.price_descending')); ?></option>
                            <option value="sell"
                                    <?php if($order == 'sell'): ?> selected <?php endif; ?>><?php echo e(trans('main.most_sold')); ?></option>
                            <option value="popular"
                                    <?php if($order == 'popular'): ?> selected <?php endif; ?>><?php echo e(trans('main.most_popular')); ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="h-20"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="col-md-3 col-xs-12 tab-con">
                    <!--<?php if(isset($category->id) && count($category->filters)>0): ?>-->
                    <!--    <div class="ucp-section-box sbox3">-->
                    <!--        <div class="header back-orange header-new"><span><?php echo e(trans('main.filters')); ?></span></div>-->
                    <!--        <div class="body">-->
                    <!--            <ul id="accordion" class="cat-filters-li accordion">-->
                    <!--                <?php $__currentLoopData = $category->filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                    <!--                    <li id="filter<?php echo e($filter->id); ?>">-->
                    <!--                        <div class="link"><?php echo e($filter->filter); ?><i class="mdi mdi-chevron-down"></i>-->
                    <!--                        </div>-->
                    <!--                        <?php if(count($filter->tags) > 0): ?>-->
                    <!--                            <ul class="submenu">-->
                    <!--                                <?php $__currentLoopData = $filter->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                    <!--                                    <li>-->
                    <!--                                        <input type="checkbox" id="filter<?php echo e($tag->id); ?>"-->
                    <!--                                               name="filters" value="<?php echo e($tag->id); ?>"-->
                    <!--                                               <?php if(!is_null($filters) && in_array($tag->id,$filters)): ?> checked <?php endif; ?>/>-->
                    <!--                                        <label-->
                    <!--                                            for="filter<?php echo e($tag->id); ?>"><span></span><?php echo e($tag->tag); ?>-->
                    <!--                                        </label>-->
                    <!--                                    </li>-->
                    <!--                                    <?php if(!is_null($filters) && in_array($tag->id,$filters)): ?>-->
                    <!--                                        <script>$(document).ready(function () {-->
                    <!--                                                $('#filter<?php echo e($filter->id); ?>').addClass('open');-->
                    <!--                                                $('#filter<?php echo e($filter->id); ?> .submenu').css('display', 'block');-->
                    <!--                                            });</script> <?php endif; ?>-->
                    <!--                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                    <!--                            </ul>-->
                    <!--                        <?php endif; ?>-->
                    <!--                    </li>-->
                    <!--                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                    <!--            </ul>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--<?php endif; ?>-->
                    <?php if(isset($setting['site']['category_most_sell_container']) && $setting['site']['category_most_sell_container'] == 1): ?>
                    <?php endif; ?>
                    <div class="row">
                        <!--<?php if(isset($ads)): ?>-->
                        <!--    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                        <!--        <?php if($ad->position == 'category-side'): ?>-->
                        <!--            <a href="<?php echo e($ad->url); ?>"><img src="<?php echo e($ad->image); ?>" class="<?php echo e($ad->size); ?>"-->
                        <!--                                          id="cat-side"></a>-->
                        <!--        <?php endif; ?>-->
                        <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                        <!--<?php endif; ?>-->
                      
                         <?php if(isset($sidebar_left_top_ad)): ?>
                            <a href="<?php echo e($sidebar_left_top_ad->url); ?>"><img src="<?php echo e($sidebar_left_top_ad->image); ?>" class="col-md-12 col-sm-12 col-xs-12" id="cat-side"></a>
                         <?php else: ?>
                            <a href="#"><img src="<?php echo e(asset('assets/default/images/dummy-add.jpg')); ?>" class="col-md-12 col-sm-12 col-xs-12" id="cat-side"></a>    
                         <?php endif; ?>
                         
                         <?php if(isset($sidebar_left_bottom_ad)): ?>
                            <a href="<?php echo e($sidebar_left_bottom_ad->url); ?>"><img src="<?php echo e($sidebar_left_bottom_ad->image); ?>" class="col-md-12 col-sm-12 col-xs-12" id="cat-side"></a>
                         <?php else: ?>
                            <a href="#"><img src="<?php echo e(asset('assets/default/images/dummy-add.jpg')); ?>" class="col-md-12 col-sm-12 col-xs-12" id="cat-side"></a>    
                         <?php endif; ?>
                    </div>
                    <div class="col-xs-12 col-md-12 container-banner-section">
                        <!--<?php if(isset($ads)): ?>-->
                        <!--    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                        <!--        <?php if($ad->position == 'main-slider-side'): ?>-->
                        <!--            <a href="<?php echo e($ad->url); ?>"><img src="<?php echo e($ad->image); ?>" class="<?php echo e($ad->size); ?>"></a>-->
                        <!--        <?php endif; ?>-->
                        <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                        <!--<?php endif; ?>-->
                    
                    </div>
                </div>
                <div class="col-md-9 col-xs-12">
                    <div class="newest-container newest-container-s">
                        <div class="row body body-target body-target-s">
                            <?php $vipIds[] = 0; ?>
                            <?php if(!empty($vip) && !isset($order) && !isset($pricing) && !isset($course) && !isset($off) && !isset($post_sell) && !isset($q) && !isset($support) && !isset($filters)): ?>
                                <?php $__currentLoopData = $vip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($content->content->id)): ?>
                                        <?php $vipIds[] = $content->content->id; ?>
                                        <div class="col-md-4 col-sm-6 col-xs-12 pagi-content vip-content tab-con">
                                            <a href="/product/<?php echo e($content->content->id); ?>/<?php echo \Illuminate\Support\Str::slug($content->content->title) ?? ''; ?>"
                                               title="<?php echo e($content->content->title); ?>"
                                               class="content-box pagi-content-box">
                                                <div class="img-container">
                                                    <img alt="<?php echo e($content->content->title ?? ''); ?>"
                                                        src="<?php echo e(!empty($meta['thumbnail']) ? $meta['thumbnail'] : ''); ?>"/>
                                                    <span class="off-badge vip-badge">
                                                        <label class="text-center"><?php echo e(trans('main.vip_badge')); ?></label>
                                                    </span>
                                                    <?php if($content->type == 'webinar' || $content->type == 'course+webinar'): ?>
                                                        <span class="live_class">Live class</span>
                                                    <?php endif; ?>
                                                </div>
                                                <h3><?php echo truncate($content->content->title,35); ?></h3>
                                                <div class="footer">
                                                    <span class="avatar" title="<?php echo e($content->user->name ?? ''); ?>"
                                                          onclick="window.location.href = '/profile/<?php echo e($content->user->id); ?>'">
                                                        <img
                                                            src="<?php echo e(get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar',''))); ?>">
                                                    </span>

                                                    <label
                                                        class="pull-right content-clock"><?php echo e(contentDuration($content->id)); ?></label>
                                                    <span class="boxicon mdi mdi-clock pull-right"></span>
                                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                    <label
                                                        class="pull-left"><?php echo e(price($content->id,$content->category_id,$meta['price'])['price_txt']); ?></label>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php $vipIds[] = 0; ?>
                            <?php endif; ?>
                            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                                <?php if(!in_array($content['id'], $vipIds)): ?>
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
                        </div>
                        <div class="h-10"></div>
                        <div class="pagi text-center center-block col-xs-12"></div>
                        <div class="row pagi-s">
                            <!--<?php if(isset($ads)): ?>-->
                            <!--    <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                            <!--        <?php if($ad->position == 'category-pagination-bottom'): ?>-->
                            <!--            <a href="<?php echo e($ad->url); ?>"><img src="<?php echo e($ad->image); ?>" class="<?php echo e($ad->size); ?>"-->
                            <!--                                          id="cat-side"></a>-->
                            <!--        <?php endif; ?>-->
                            <!--    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                            <!--<?php endif; ?>-->
                           
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-xs-12 col-md-12 container-banner-section">
                     <?php if(isset($pagination_right_ad)): ?>
                                <a href="<?php echo e($pagination_right_ad->url); ?>"><img src="<?php echo e($pagination_right_ad->image); ?>" class="col-md-6" style="height:200px"></a>
                             <?php else: ?>
                                <a href="#"><img src="<?php echo e(asset('assets/default/images/dummy-add.jpg')); ?>" class="col-md-6" style="height:200px"></a>    
                             <?php endif; ?>
                             
                             <?php if(isset($pagination_left_ad)): ?>
                                <a href="<?php echo e($pagination_left_ad->url); ?>"><img src="<?php echo e($pagination_left_ad->image); ?>" class="col-md-6" style="height:200px"></a>
                             <?php else: ?>
                                <a href="#"><img src="<?php echo e(asset('assets/default/images/dummy-add.jpg')); ?>" class="col-md-6" style="height:200px"></a>    
                             <?php endif; ?>
                </div>
            </div>
            
        </div>
        <div>
            
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"/>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>-->
    <script>
        //  $('document').ready(function () {
        //      $('select').niceSelect();
        //     var url = window.location.href; 
        //  })
         
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

<?php echo $__env->make(getTemplate().'.view.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crbangla1234/laravel/resources/views/web/default/view/category/category.blade.php ENDPATH**/ ?>