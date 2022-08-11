@extends(getTemplate().'.view.layout.layout')
@section('title')
    {{ get_option('site_title','') }} - {{ $category->title ?? 'Categories' }}
@endsection
@section('meta_description',get_option('site_meta_description'))
@section('meta_keyword',get_option('site_meta_keyword'))
@section('page')

    <div class="container-fluid">
        <div class="row cat-search-section" style="background: url('{{ $category->background ?? '' }}');">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12 tab-con cat-icon-container">
                    <span><img src="{{ $category->icon }}" class="category-icon"/> </span>
                    <span><span>{{ $category->title }}</span></span>
                </div>
                <div class="col-md-2 tab-con">
                    <div class="h-10"></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box box-s">
                        <div class="container-2">
                            <form>
                                {{ csrf_field() }}
                                <input type="search" id="search" name="q"
                                       value="{{ !empty(request()->get('q')) ? request()->get('q') : '' }}"
                                       placeholder="Search in  {{ !empty($category->title) ? $category->title : 'Search in all categories' }}"/>
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
                  <form method="get" action="{{ $category->title }}" class="">
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
                        <select class="form-control district-list" name="district">
                            <option value="">Select a district</option>
                            @if(count($districts) > 0)
                                @foreach($districts as $list)
                                 <option value="{{ $list->district_name }}"> {{ $list->district_name }} </option>
                                @endforeach
                            @endif 
                        </select>
                    </div>
                    <div class="form-group pull-left">
                        <select class="form-control upazila-list" name="upazila">
                            <option value="">Select a thana/upazila</option>
                            @if(count($upazilas) > 0)
                                @foreach($upazilas as $list)
                                 <option value="{{ $list->upazilla_name }}"> {{ $list->upazilla_name }} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group pull-left" style="margin:0px 2px 0px 2px">
                        <button type="submit" name="search" class="pull-left search_btn"style="height:34px;background: #13ce9c;border: #13ce9c;border-radius: 4px;"><span class="homeicon mdi mdi-magnify"></span></button>
                    </div>
                  </form>  
                </div>
                <div class="col-md-2 col-xs-12 tab-con">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary @if($pricing == 'all' || $pricing == '') active @endif">
                            <input type="radio" name="pricing" value="all"
                                   @if($pricing == 'all' || $pricing == '') checked @endif> {{ trans('main.all') }}
                        </label>
                        <label class="btn btn-primary @if($pricing == 'free') active @endif">
                            <input type="radio" name="pricing" value="free"
                                   @if($pricing == 'free') checked @endif> {{ trans('main.free') }}
                        </label>
                        <label class="btn btn-primary @if($pricing == 'price') active @endif">
                            <input type="radio" name="pricing" value="price"
                                   @if($pricing == 'price') checked @endif> {{ trans('main.paid') }}
                        </label>
                    </div>
                </div>
                <div class="col-md-1 col-xs-12 text-left tab-con">
                    <div class="form-group">
                        <!--<label class="control-label form-label-s"-->
                        <!--       for="inputDefault">{{ trans('main.postal_delivery') }}</label>-->
                        <!--<div class="switch switch-sm switch-primary sw-prim-s">-->
                        <!--    <input type="hidden" value="0" name="post-sell">-->
                        <!--    <input type="checkbox" name="post-sell" value="1"-->
                        <!--           @if(!empty(request()->get('post-sell')) && request()->get('post-sell') == 1) checked-->
                        <!--           @endif data-plugin-ios-switch/>-->
                        <!--</div>-->
                        <!--&nbsp;&nbsp;-->
                        <!--<label class="control-label cont-lab-s"-->
                        <!--       for="inputDefault">{{ trans('main.supported_course') }}</label>-->
                        <!--<div class="switch switch-sm switch-primary sw-prim-s">-->
                        <!--    <input type="hidden" value="0" name="support">-->
                        <!--    <input type="checkbox" name="support" value="1"-->
                        <!--           @if(!empty(request()->get('support')) && request()->get('support') == 1) checked-->
                        <!--           @endif data-plugin-ios-switch/>-->
                        <!--</div>-->
                        &nbsp;&nbsp;
                        <label class="control-label form-label-s"
                               for="inputDefault">{{ trans('main.discount') }}</label>
                        <div class="switch switch-sm switch-primary sw-prim-s">
                            <input type="hidden" value="0" name="off">
                            <input type="checkbox" name="off" value="1" @if($off == 1) checked
                                   @endif data-plugin-ios-switch/>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-xs-12 text-left tab-con">
                    <div class="form-group pull-left">
                        <select class="form-control" id="order">
                            <option value="new" @if($order == 'new') selected @endif>{{ trans('main.newest') }}</option>
                            <option value="old" @if($order == 'old') selected @endif>{{ trans('main.oldest') }}</option>
                            <option value="price"
                                    @if($order == 'price') selected @endif>{{ trans('main.price_ascending') }}</option>
                            <option value="cheap"
                                    @if($order == 'cheap') selected @endif>{{ trans('main.price_descending') }}</option>
                            <option value="sell"
                                    @if($order == 'sell') selected @endif>{{ trans('main.most_sold') }}</option>
                            <option value="popular"
                                    @if($order == 'popular') selected @endif>{{ trans('main.most_popular') }}</option>
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
                    <!--@if(isset($category->id) && count($category->filters)>0)-->
                    <!--    <div class="ucp-section-box sbox3">-->
                    <!--        <div class="header back-orange header-new"><span>{{ trans('main.filters') }}</span></div>-->
                    <!--        <div class="body">-->
                    <!--            <ul id="accordion" class="cat-filters-li accordion">-->
                    <!--                @foreach($category->filters as $filter)-->
                    <!--                    <li id="filter{{ $filter->id }}">-->
                    <!--                        <div class="link">{{ $filter->filter }}<i class="mdi mdi-chevron-down"></i>-->
                    <!--                        </div>-->
                    <!--                        @if(count($filter->tags) > 0)-->
                    <!--                            <ul class="submenu">-->
                    <!--                                @foreach($filter->tags as $tag)-->
                    <!--                                    <li>-->
                    <!--                                        <input type="checkbox" id="filter{{ $tag->id }}"-->
                    <!--                                               name="filters" value="{{ $tag->id }}"-->
                    <!--                                               @if(!is_null($filters) && in_array($tag->id,$filters)) checked @endif/>-->
                    <!--                                        <label-->
                    <!--                                            for="filter{{ $tag->id }}"><span></span>{{ $tag->tag }}-->
                    <!--                                        </label>-->
                    <!--                                    </li>-->
                    <!--                                    @if(!is_null($filters) && in_array($tag->id,$filters))-->
                    <!--                                        <script>$(document).ready(function () {-->
                    <!--                                                $('#filter{{ $filter->id }}').addClass('open');-->
                    <!--                                                $('#filter{{ $filter->id }} .submenu').css('display', 'block');-->
                    <!--                                            });</script> @endif-->
                    <!--                                @endforeach-->
                    <!--                            </ul>-->
                    <!--                        @endif-->
                    <!--                    </li>-->
                    <!--                @endforeach-->
                    <!--            </ul>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--@endif-->
                    @if(isset($setting['site']['category_most_sell_container']) && $setting['site']['category_most_sell_container'] == 1)
                    @endif
                    <div class="row">
                        <!--@if(isset($ads))-->
                        <!--    @foreach($ads as $ad)-->
                        <!--        @if($ad->position == 'category-side')-->
                        <!--            <a href="{{ $ad->url }}"><img src="{{ $ad->image }}" class="{{ $ad->size }}"-->
                        <!--                                          id="cat-side"></a>-->
                        <!--        @endif-->
                        <!--    @endforeach-->
                        <!--@endif-->
                      
                         @if(isset($sidebar_left_top_ad))
                            <a href="{{ $sidebar_left_top_ad->url }}"><img src="{{ $sidebar_left_top_ad->image }}" class="col-md-12 col-sm-12 col-xs-12" id="cat-side"></a>
                         @else
                            <a href="#"><img src="{{ asset('assets/default/images/dummy-add.jpg') }}" class="col-md-12 col-sm-12 col-xs-12" id="cat-side"></a>    
                         @endif
                         
                         @if(isset($sidebar_left_bottom_ad))
                            <a href="{{ $sidebar_left_bottom_ad->url }}"><img src="{{ $sidebar_left_bottom_ad->image }}" class="col-md-12 col-sm-12 col-xs-12" id="cat-side"></a>
                         @else
                            <a href="#"><img src="{{ asset('assets/default/images/dummy-add.jpg') }}" class="col-md-12 col-sm-12 col-xs-12" id="cat-side"></a>    
                         @endif
                    </div>
                    <div class="col-xs-12 col-md-12 container-banner-section">
                        <!--@if(isset($ads))-->
                        <!--    @foreach($ads as $ad)-->
                        <!--        @if($ad->position == 'main-slider-side')-->
                        <!--            <a href="{{ $ad->url }}"><img src="{{ $ad->image }}" class="{{ $ad->size }}"></a>-->
                        <!--        @endif-->
                        <!--    @endforeach-->
                        <!--@endif-->
                    
                    </div>
                </div>
                <div class="col-md-9 col-xs-12">
                    <div class="newest-container newest-container-s">
                        <div class="row body body-target body-target-s">
                            <?php $vipIds[] = 0; ?>
                            @if(!empty($vip) && !isset($order) && !isset($pricing) && !isset($course) && !isset($off) && !isset($post_sell) && !isset($q) && !isset($support) && !isset($filters))
                                @foreach($vip as $content)
                                    @if(isset($content->content->id))
                                        <?php $vipIds[] = $content->content->id; ?>
                                        <div class="col-md-4 col-sm-6 col-xs-12 pagi-content vip-content tab-con">
                                            <a href="/product/{{ $content->content->id }}/{!! \Illuminate\Support\Str::slug($content->content->title) ?? '' !!}"
                                               title="{{ $content->content->title }}"
                                               class="content-box pagi-content-box">
                                                <div class="img-container">
                                                    <img alt="{{ $content->content->title ?? '' }}"
                                                        src="{{ !empty($meta['thumbnail']) ? $meta['thumbnail'] : '' }}"/>
                                                    <span class="off-badge vip-badge">
                                                        <label class="text-center">{{ trans('main.vip_badge') }}</label>
                                                    </span>
                                                    @if($content->type == 'webinar' || $content->type == 'course+webinar')
                                                        <span class="live_class">Live class</span>
                                                    @endif
                                                </div>
                                                <h3>{!! truncate($content->content->title,35) !!}</h3>
                                                <div class="footer">
                                                    <span class="avatar" title="{{ $content->user->name ?? '' }}"
                                                          onclick="window.location.href = '/profile/{{ $content->user->id }}'">
                                                        <img
                                                            src="{{ get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar','')) }}">
                                                    </span>

                                                    <label
                                                        class="pull-right content-clock">{{ contentDuration($content->id) }}</label>
                                                    <span class="boxicon mdi mdi-clock pull-right"></span>
                                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                    <label
                                                        class="pull-left">{{ price($content->id,$content->category_id,$meta['price'])['price_txt'] }}</label>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <?php $vipIds[] = 0; ?>
                            @endif
                            @foreach($contents as $content)
                            
                                @if(!in_array($content['id'], $vipIds))
                                    <div class="col-md-4 col-sm-6 col-xs-12 pagi-content tab-con">
                                        <a href="/product/{{ $content['id'] }}/{!! \Illuminate\Support\Str::slug($content['title']) ?? '-' !!}" title="{{ $content['title'] }}"
                                           class="content-box pagi-content-box" style="height:280px">

                                            <div class="img-container">
                                                <!--<img alt="{{ $content['title'] ?? '' }}" src="{{ $content['metas']['thumbnail'] ?? '' }}"/>-->
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
                                                @if($content['type'] == 'webinar' || $content['type'] == 'course+webinar')
                                                    <span class="live_class">Live class</span>
                                                @endif
                                            </div>
                                            <h3>{!! truncate($content['title'],35) !!}</h3>
                                            <div class="footer">
                                                <span class="avatar" title="{{ $content['user']['name'] }}"
                                                     onclick="window.location.href = '/profile/{{ $content['user']['id'] }}'"><img
                                                        src="{{ get_user_meta($content['user_id'],'avatar',get_option('default_user_avatar','')) }}">
                                                </span>

                                                
                                                <p class=""><i class="fa fa-clock-o"></i>{{ contentDuration($content['id']) }}</p>
                                                <p class=""><i class="fa fa-user-plus"></i>( {{ $content['view'] }})</p>

                                                <span class="boxicon mdi mdi-wallet pull-left"></span>
                                                @if (!empty($content['id']) and !empty($content['category_id']) and !empty($content['price']))
                                                    <label
                                                        class="pull-left">{{ price($content['id'],$content['category_id'],$content['price'])['price_txt'] }}
                                                    </label>
                                                @endif
                                                 <p
                                                    class="pull-right content-clock">{{ $content['district'] }}
                                                </p>
                                                <span class="boxicon mdi mdi-map-marker pull-right"></span>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="h-10"></div>
                        <div class="pagi text-center center-block col-xs-12"></div>
                        <div class="row pagi-s">
                            <!--@if(isset($ads))-->
                            <!--    @foreach($ads as $ad)-->
                            <!--        @if($ad->position == 'category-pagination-bottom')-->
                            <!--            <a href="{{ $ad->url }}"><img src="{{ $ad->image }}" class="{{ $ad->size }}"-->
                            <!--                                          id="cat-side"></a>-->
                            <!--        @endif-->
                            <!--    @endforeach-->
                            <!--@endif-->
                           
                        </div>
                        
                    </div>
                </div>
                
                <div class="col-xs-12 col-md-12 container-banner-section">
                     @if(isset($pagination_right_ad))
                                <a href="{{ $pagination_right_ad->url }}"><img src="{{ $pagination_right_ad->image }}" class="col-md-6" style="height:200px"></a>
                             @else
                                <a href="#"><img src="{{ asset('assets/default/images/dummy-add.jpg') }}" class="col-md-6" style="height:200px"></a>    
                             @endif
                             
                             @if(isset($pagination_left_ad))
                                <a href="{{ $pagination_left_ad->url }}"><img src="{{ $pagination_left_ad->image }}" class="col-md-6" style="height:200px"></a>
                             @else
                                <a href="#"><img src="{{ asset('assets/default/images/dummy-add.jpg') }}" class="col-md-6" style="height:200px"></a>    
                             @endif
                </div>
            </div>
            
        </div>
        <div>
            
        </div>
    </div>

@endsection
@section('script')
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"/>-->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>-->
    <script>
        //  $('document').ready(function () {
        //      $('select').niceSelect();
        //     var url = window.location.href; 
        //  })
         
        $(function () {
            pagination('.body-target', {{ !empty($content['discount']['off']) ? $content['discount']['off'] : 6 }}, 0);
            $('.pagi').pagination({
                items: {!! count($contents) !!},
                itemsOnPage: {{ !empty($content['discount']['off']) ? $content['discount']['off'] : 6 }},
                cssStyle: 'light-theme',
                prevText: 'Pre.',
                nextText: 'Next',
                onPageClick: function (pageNumber, event) {
                    pagination('.body-target',{{ !empty($content['discount']['off']) ? $content['discount']['off'] : 6 }}, pageNumber - 1);
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
    
    //Search based on division , district & upazila
        // $('.search_btn').click(function() {
        //     alert(1);
        // }
    </script>
@endsection
