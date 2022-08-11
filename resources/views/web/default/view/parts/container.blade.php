<div class="container hidden-xs hidden-sm" id="anchor-animate">
    <div class="h-25"></div>
    <div class="row">
        <div class="col-xs-12 col-md-4 container-banner-section">
    
            @if(isset($banner_top_ad))
              <a href="{{ $banner_top_ad->url }}"><img src="{{ $banner_top_ad->image }}" class="{{ $banner_top_ad->size }}"></a>
            @else
                <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-12 col-sm-12 col-xs-12"></a>    
            @endif
            
            @if(isset($banner_bottom_ad))
              <a href="{{ $banner_bottom_ad->url }}"><img src="{{ $banner_bottom_ad->image }}" class="{{ $banner_bottom_ad->size }}"></a>
            @else
                <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-12 col-sm-12 col-xs-12"></a>    
            @endif
        </div>
        <div class="col-xs-12 col-md-8 parts-container">
            @if(!empty($slider_container))
                @foreach($slider_container as $slide)
                    @if(isset($slide->content->metas))
                        <?php $slide_meta = arrayToList($slide->content->metas, 'option', 'value'); ?>
                    
                        <div class="parts-container-slide" id="slide{{ $slide->content->id }}">
                            <div class="header">
                                <span>{{ trans('main.featured') }}</span>
                                <h2><a href="/product/{{ $slide->content->id }}">{{ truncate($slide->content->title,150) }}</a></h2>
                            </div>
                            <div class="body-container">
                                <div class="row">
                                    <div class="col-md-7">
                                        <img src="{{ !empty($slide_meta['cover']) ? $slide_meta['cover'] : url('/assets/default/images/dummy_slider.png') }}" alt="{!! $slide->content->title ?? '' !!}" class="img-responsive img-main-container img-con-r">
                                    </div>
                                    <div class="col-md-5 img-con-s">
                                        <div class="item-container">
                                            <div class="col-md-10 text-item text-center">
                                                <span>{{ truncate($slide->description,250) }}</span>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="homeicon mdi mdi-comment"></span>
                                            </div>
                                        </div>
                                        <div class="item-container">
                                            <div class="col-md-10 timer-item">
                                                <label> {{ date('d F Y',$slide->first_date) }}</label>
                                            </div>
                                            <div class="col-md-2 ">
                                                <span class="homeicon mdi mdi-alarm"></span>
                                            </div>
                                        </div>
                                        <div class="item-container">
                                            <div class="col-md-10 price-item">
                                                @if(isset($slide_meta['price']) && $slide_meta['price']>0)
                                                    <label>{{currencySign()}}{{ $slide_meta['price'] }}</label>
                                                @else
                                                    <label>{{ trans('main.free_item') }}</label>
                                                @endif
                                            </div>
                                            <div class="col-md-2">
                                                <span class="homeicon mdi mdi-wallet"></span>
                                            </div>
                                        </div>
                                        <div class="item-container">
                                            <div class="col-md-10 price-item profile-item">
                                                <label><a href="/profile/{{ $slide->content->user->id ?? '' }}" class="profile-s">{{ truncate($slide->content->user->name,70) ?? '' }}</a></label>
                                            </div>
                                            <div class="col-md-2">
                                                <span class="homeicon mdi mdi-teach"></span>
                                            </div>
                                        </div>
                                        <div>
                                            <a href="/product/{{ $slide->content->id ?? '' }}" class="btn btn-container-more btn-container-more-s">{{ trans('main.view_product') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            <div class="col-xs-12">
                <ul class="container-bullet">
                    @if(!empty($slider_container))
                        @foreach($slider_container as $index => $slide)
                            @if(!empty($slide->content))
                                <li data-target="slide{{ $slide->content->id }}" @if($index == 0) class="active" @endif></li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="h-25"></div>
 
    <div class="row">
        <div class="two-ads-container">
            <div class="h-10 visible-xs"></div>
            <div class="row">
                @if(isset($course_left_ad))
                   <a href="{{ $course_left_ad->url }}"><img src="{{ $course_left_ad->image }}" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>
                 @else
                   <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>  
                @endif
                
                @if(isset($course_right_ad))
                    <a href="{{ $course_right_ad->url }}"><img src="{{ $course_right_ad->image }}" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>
                 @else
                    <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>  
                @endif
            </div> 
        </div>
    </div>
    
     <div class="h-25"></div>
     
     <div class="row">
         <div class="header">
                <span class="pull-left division"> বিভাগ থেকে আপনার প্রিয় কোর্স /ভেন্যু নির্বাচন করুন</span>
            
            </div>
        <div class="col-md-12">
            <div class="col-md-1 division_box">
                <a href="{{ url('/division_based?division=Dhaka') }}">
                    <img src="{{  asset("assets/default/images/maps/dhakaDivision.png")}}" class="division_img"><br>
                    <p>ঢাকা বিভাগ</p>
                </a>
            </div>
            <div class="col-md-1 division_box">
                <a href="{{ url('/division_based?division=Chittagong') }}">
                <img src="{{  asset("assets/default/images/maps/chittagongDivision.png")}}" class="division_img">
                <p>চট্টগ্রাম বিভাগ</p></a>
            </div>
            <div class="col-md-1 division_box">
                <a href="{{ url('/division_based?division=Sylhet') }}">
                <img src="{{  asset("assets/default/images/maps/sylhetDivision.png")}}" class="division_img">
                <p>সিলেট বিভাগ</p></a>
            </div>
            <div class="col-md-1 division_box">
                <a href="{{ url('/division_based?division=Rajshahi') }}">
                <img src="{{  asset("assets/default/images/maps/rajshahiDivision.png")}}" class="division_img">
                <p>রাজশাহী বিভাগ</p></a>
            </div>
             <div class="col-md-1 division_box">
                 <a href="{{ url('/division_based?division=Khulna') }}">
                <img src="{{  asset("assets/default/images/maps/khulnaDivision.png")}}" class="division_img">
                <p>খুলনা বিভাগ</p></a>
            </div>
             <div class="col-md-1 division_box">
                 <a href="{{ url('/division_based?division=Barisal') }}">
                <img src="{{  asset("assets/default/images/maps/barisalDivision.png")}}" class="division_img">
                <p>বরিশাল বিভাগ</p></a>
            </div>
            <div class="col-md-1 division_box">
                <a href="{{ url('/division_based?division=Rangpur') }}">
                <img src="{{  asset("assets/default/images/maps/rangpurDivision.png")}}" class="division_img">
                <p>রংপুর বিভাগ</p></a>
            </div>
            <div class="col-md-1 col-md-offset-2 division_box">
                <a href="{{ url('/division_based?division=Mymensingh') }}">
                <img src="{{  asset("assets/default/images/maps/mymensinghDivision.png")}}" class="division_img">
                <p>ময়মনসিং বিভাগ</p></a>
            </div>
            
        </div>
    </div>
    
    <div class="h-25"></div>
</div>
