@extends(getTemplate().'.view.layout.layout')
@section('title')
    {{ get_option('site_title','') }} - {{ !empty($category->title) ? $category->title : 'Categories' }}
@endsection
@section('meta_description',get_option('site_meta_description'))
@section('meta_keyword',get_option('site_meta_keyword'))
@section('page')

    <div class="container-fluid">
        <div class="row cat-search-section cat-search-section-s">
            <div class="container">
                <div class="col-md-4 col-sm-6 col-xs-12 cat-icon-container">
                </div>
                <div class="col-md-4">
                    <div class="h-10"></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box box-s">
                        <div class="container-2">
                            <form>
                                {{ csrf_field() }}
                                <input type="search" id="search" name="q" value="{{ !empty(request()->get('q')) ? request()->get('q') : ''  }}" placeholder=" {{ !empty($category->title) ? $category->title : 'Search in all categories' }}"/>
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
                    <form method="get" action="" class="">
                    <div class="form-group pull-left">
                        <select class="form-control division-list" name="division" id="">
                            <option value="">Select a division</option>
                            @if(count($divisions) > 0)
                                @foreach($divisions as $list)
                                 <option value="{{ $list->division_name }}"> {{ $list->division_name }} </option>
                                @endforeach
                            @endif 
                        </select>
                    </div>
                    <div class="form-group pull-left" style="margin:0px 2px 0px 2px">
                        <select class="form-control district-list" name="district" id="" >
                            <option value="">Select a district</option>
                             @if(count($districts) > 0)
                                @foreach($districts as $list)
                                 <option value="{{ $list->district_name }}"> {{ $list->district_name }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group pull-left">
                        <select class="form-control upazila-list" name="upazila" id="">
                            <option value="">Select a thana/upazila</option>
                            @if(count($upazilas) > 0)
                                @foreach($upazilas as $list)
                                 <option value="{{ $list->upazilla_name }}"> {{ $list->upazilla_name }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group pull-left" style="margin:0px 2px 0px 2px">
                        <button type="submit" name="search" class="pull-left"style="height:33px;background: #13ce9c;border: #13ce9c;border-radius: 4px;"><span class="homeicon mdi mdi-magnify"></span></button>
                    </div>
                    </form>
                </div>
                <div class="col-md-2 col-xs-12 tab-con">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary @if($pricing == 'all' || $pricing == '') active @endif">
                            <input type="radio" name="pricing" value="all" @if($pricing == 'all' || $pricing == '') checked @endif> {{ trans('main.all') }}
                        </label>
                        <label class="btn btn-primary @if($pricing == 'free') active @endif">
                            <input type="radio" name="pricing" value="free" @if($pricing == 'free') checked @endif> {{ trans('main.free') }}
                        </label>
                        <label class="btn btn-primary @if($pricing == 'price') active @endif">
                            <input type="radio" name="pricing" value="price" @if($pricing == 'price') checked @endif> {{ trans('main.paid') }}
                        </label>
                    </div>
                </div>
                <!--<div class="col-md-3 col-xs-12 tab-con">-->
                <!--    <div class="btn-group" data-toggle="buttons">-->
                <!--        <label class="btn btn-primary @if($course == 'all' || $course == '') active @endif">-->
                <!--            <input type="radio" name="course" value="all" @if($course == 'all' || $course == '') checked @endif> {{ trans('main.all') }}-->
                <!--        </label>-->
                <!--        <label class="btn btn-primary @if($course == 'multi') active @endif">-->
                <!--            <input type="radio" name="course" value="multi" @if($course == 'multi') checked @endif> {{ trans('main.course') }}-->
                <!--        </label>-->
                <!--        <label class="btn btn-primary @if($course == 'webinar') active @endif">-->
                <!--            <input type="radio" name="course" value="webinar" @if($course == 'webinar') checked @endif> {{ trans('main.webinar') }}-->
                <!--        </label>-->
                <!--        <label class="btn btn-primary @if($course == 'one') active @endif">-->
                <!--            <input type="radio" name="course" value="one" @if($course == 'one') active @endif> {{ trans('main.single') }}-->
                <!--        </label>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-md-1 col-xs-12 text-left tab-con">
                    <div class="form-group">
                        <!--<label class="control-label cont-lab-s" for="inputDefault">{{ trans('main.postal_delivery') }}</label>-->
                        <!--<div class="switch switch-sm switch-primary sw-prim-s">-->
                        <!--    <input type="hidden" value="0" name="post-sell">-->
                        <!--    <input type="checkbox" name="post-sell" value="1" @if(!empty(request()->get('post-sell')) && request()->get('post-sell') == 1) checked @endif data-plugin-ios-switch/>-->
                        <!--</div>-->
                        <!--&nbsp;&nbsp;-->
                        <!--<label class="control-label cont-lab-s" for="inputDefault">{{ trans('main.supported_course') }}</label>-->
                        <!--<div class="switch switch-sm switch-primary sw-prim-s">-->
                        <!--    <input type="hidden" value="0" name="support">-->
                        <!--    <input type="checkbox" name="support" value="1" @if(!empty(request()->get('support')) && request()->get('support') == 1) checked @endif data-plugin-ios-switch/>-->
                        <!--</div>-->
                        &nbsp;&nbsp;
                        <label class="control-label cont-lab-s" for="inputDefault">{{ trans('main.discount') }}</label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="post">
                            <input type="checkbox" name="off" value="1" @if($off == 1) checked @endif data-plugin-ios-switch/>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 text-left tab-con">
                    <div class="form-group pull-left">
                        <select class="form-control" id="order">
                            <option value="new" @if($order == 'new') selected @endif>{{ trans('main.newest') }}</option>
                            <option value="old" @if($order == 'old') selected @endif>{{ trans('main.oldest') }}</option>
                            <option value="price" @if($order == 'price') selected @endif>{{ trans('main.price_ascending') }}</option>
                            <option value="cheap" @if($order == 'cheap') selected @endif>{{ trans('main.price_descending') }}</option>
                            <option value="sell" @if($order == 'sell') selected @endif>{{ trans('main.most_sold') }}</option>
                            <option value="popular" @if($order == 'popular') selected @endif>{{ trans('main.most_popular') }}</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="h-20"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="container">
                <div class="h-20"></div>
                <div class="col-md-12 col-xs-12">
                    <div class="newest-container">
                        <div class="row body body-target body-target-s">
                            <?php $vipIds[] = 0; ?>
                            @if(!empty($vip) && !isset($order) && !isset($pricing) && !isset($course) && !isset($off) && !isset($post_sell) && !isset($q) && !isset($support) && !isset($filters))
                                @foreach($vip as $content)
                                    @if(isset($content->content->id))
                                        <?php
                                            $vipIds[] = $content->content->id;
                                            $meta = arrayToList($content->content->metas, 'option', 'value');
                                        ?>
                                        <div class="col-md-3 col-sm-6 col-xs-12 pagi-content vip-content tab-con">
                                            <a href="/product/{{ $content->content->id }}/{!! \Illuminate\Support\Str::slug($content->content->title) ?? '-' !!}" title="{{ $content->content->title }}" class="content-box pagi-content-box">

                                                <div class="img-container">
                                                    <!--<img alt="{{ $content->content->title ?? '' }}" src="{{ $meta['thumbnail'] }}"/>-->
                                                    @if($content->thumbnail_photo)
                                                        <img src="/uploads/content_thumbnails/{{ $content->thumbnail_photo }}" class="img img-responsive img-thumbnail">
                                                    @else
                                                        <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" class="img img-responsive img-thumbnail">
                                                    @endif
                                                    <span class="off-badge vip-badge">
                                                        <label class="text-center">{{ trans('main.vip_badge') }}</label>
                                                    </span>
                                                    @if($content->type == 'webinar' || $content->type == 'course+webinar')
                                                        <span class="live_class">Live class</span>
                                                    @endif
                                                </div>
                                                <h3>{!! truncate($content->content->title,30) !!}</h3>
                                                <div class="footer">
                                                    <span class="avatar" title="{{ $content->user->name }}" onclick="window.location.href = '/profile/{{ $content->user->id }}'"><img src="{{ get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar','')) }}"></span>

                                                        <label class="pull-right content-clock">{{ contentDuration($content->id) }}</label>
                                                        <span class="boxicon mdi mdi-clock pull-right"></span>

                                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                    <label class="pull-left">{{ price($content->id,$content->category_id,$meta['price'])['price_txt'] ?? 0 }}</label>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <?php $vipIds[] = 0; ?>
                            @endif
                            @foreach($contents as $content)
                       
                                @if(!in_array($content['id'],$vipIds))
                                    <div class="col-md-3 col-sm-6 col-xs-12 pagi-content tab-con">
                                        <!--<div class="container-s-r">-->
                                        <!--    <strong class="red-r"> Day</strong>-->
                                        <!--    <strong>{{ trans('main.days') }}</strong>-->
                                        <!--    <strong>{{ trans('main.special_offer') }}</strong>-->
                                        <!--</div>-->
                                        <a href="/product/{{ $content['id'] }}/{!! \Illuminate\Support\Str::slug($content['title']) ?? '' !!}" title="{{ $content['title'] }}" class="content-box pagi-content-box">

                                            <div class="img-container">
                                                <!--<img alt="{{ $content['title'] ?? '' }}" src="{{ !empty($content['metas']['thumbnail']) ? $content['metas']['thumbnail'] : '' }}"/>-->
                                                @if($content['thumbnail_photo'])
                                                    @if($content['type'] == 'venu')
                                                    <img src="/uploads/venu_thumbnails/{{ $content['thumbnail_photo'] }}" class="img img-responsive img-thumbnail">
                                                    @else
                                                    <img src="/uploads/content_thumbnails/{{ $content['thumbnail_photo'] }}" class="img img-responsive img-thumbnail">
                                                    @endif
                                                @else
                                                    <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" class="img img-responsive img-thumbnail">
                                                @endif
                                                @if($content['discount'] != null)
                                                    <span class="off-badge">
                                                        <label class="text-center">%{{ !empty($content['discount']['off']) ? $content['discount']['off'] : 0 }}<br><span>{{ trans('main.discount') }}</span></label>
                                                    </span>
                                                @endif
                                                @if($content['content_type'] == 'live course')
                                                    <span class="live_class">Live class</span>
                                                @endif
                                            </div>
                                            <h3>{!! truncate($content['title'],30) !!}</h3>
                                            <div class="footer">
                                                @if($content['type'] != 'venu')
                                                <span class="avatar" title="{{ !empty($content['user']['name']) ? $content['user']['name'] : '' }}" onclick="window.location.href = '/profile/{{ $content['user']['id'] }}'"><img src="{{ get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar','')) }}"></span>
                                                @endif
                                                    <label class="pull-right content-clock">{{ contentDuration($content['id']) }}</label>
                                                    <span class="boxicon mdi mdi-clock pull-right"></span>

                                                <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                <label class="pull-left">@if(isset($content['metas']['price'])) {{ price($content['id'],$content['category_id'],$content['metas']['price'])['price_txt'] ?? 0 }} @endif</label>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="h-10"></div>
                        <div class="pagi text-center center-block col-xs-12"></div>
                        <div class="row pagi-s">
                           @if(isset($pagination_left_ad))
                              <a href="{{ $pagination_left_ad->url }}"><img src="{{ $pagination_left_ad->image }}" class="col-md-6" style="height:200px"></a>
                            @else
                                <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6" style="height:200px"></a>    
                            @endif
                            
                            @if(isset($pagination_right_ad))
                              <a href="{{ $pagination_right_ad->url }}"><img src="{{ $pagination_right_ad->image }}" class="col-md-6" style="height:200px"></a>
                            @else
                                <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6" style="height:200px"></a>    
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"/>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>-->
    <script>
        //  $('document').ready(function () {;
        //      $('select').niceSelect();
        //     var url = window.location.href; 
        //  });
         
        $(function () {
            pagination('.body-target', {{ !empty($setting['site']['category_content_count']) ? $setting['site']['category_content_count'] : 6 }}, 0);
            $('.pagi').pagination({
                items: {!! count($contents) !!},
                itemsOnPage:  {{ !empty($setting['site']['category_content_count']) ? $setting['site']['category_content_count'] : 6 }},
                cssStyle: 'light-theme',
                prevText: 'Pre.',
                nextText: 'Next',
                onPageClick: function (pageNumber, event) {
                    pagination('.body-target', {{ !empty($setting['site']['category_content_count']) ? $setting['site']['category_content_count'] : 6 }}, pageNumber - 1);
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
        var URL = "{{ url('pages/district') }}" +'/'+ divisionName;
        $.ajax({
            type: "GET",
            url: URL,
            success: function(data) {
                var selected = '';

                var selectedDistrict =  $.trim('@if(isset($dist_name)) {!! ($dist_name) !!}@else {!! '' !!}@endif');

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
        var URL = "{{ url('pages/upazila') }}" +'/'+ districtName;
        $.ajax({
            type: "GET",
            url: URL,
            success: function(data) {
                var selected = '';

                var selectedUpazila =  $.trim('@if(isset($dist_name)) {!! ($dist_name) !!}@else {!! '' !!}@endif');

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
    </script>
@endsection
