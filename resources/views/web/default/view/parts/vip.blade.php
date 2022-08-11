<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="header">
                <!--<span class="popular pull-left feat-s">{!! trans('main.featured') !!}</span>-->
                <span class="popular pull-left feat-s">ফিচার্ড কোর্স সমূহ</span>
                <!--<a href="/category" class="more-link pull-right">{{ trans('main.load_more') }}</a>-->
                <a href="/category?order=featured" class="more-link pull-right">আরো দেখুন</a>
            </div>
            <div class="body body-s-r">
                <div class="owl-carousel">
                    @foreach($vip_content as $popular)
                        @if($popular->mode == 'publish')
                            <?php $meta = arrayToList($popular->metas, 'option', 'value'); ?>
                            <div class="owl-car-s" dir="rtl">
                                <a href="/product/{{ $popular->id }}/{!! \Illuminate\Support\Str::slug($popular->title) ?? '-' !!}" title="{{ $popular->title }}" class="content-box" style="height: 330px">

                                    <span></span>
                                    <!--<img alt="{{ $popular->title ?? '' }}" src="{{ !empty($meta['thumbnail']) ? $meta['thumbnail'] : '' }}"/>-->
                                    @if($popular->thumbnail_photo)
                                    <img src="/uploads/content_thumbnails/{{ $popular->thumbnail_photo }}" class="img img-responsive img-thumbnail">
                                    @else
                                        <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" class="img img-responsive img-thumbnail">
                                    @endif
                                    @if($popular->free_extra_feature)
                                    <span class="live_class">Special Offer</span>
                                    @endif
                                    @if(!$popular->price)
                                        <span class="live_class" style="margin-left:70px">Free</span>
                                    @endif
                                    <h3>{!! truncate($popular->title,30) !!}</h3>
                                    <div class="footer">
                                        <p class=""><i class="fa fa-university"></i>
                                         <?php
                                            $user =  DB::table('users')->where('id', $popular->user_id)->first();
                                         ?>
                                         @if($user->name)
                                            {{ truncate($user->name, 50) }}
                                         @else
                                            মুক্ত মঞ্চ
                                         @endif
                                         </p>
                                        <p class=""><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($popular->course_start_date)) }}</p>
                                        <p class=""><i class="fa fa-user-plus"></i>({!! $popular->view !!})</p>
                                        <span class="avatar" title="{{ $popular->user->name }}" onclick="window.location.href = '/profile/{{ $popular->user->id }}'"><img src="{{ get_user_meta($popular->user_id,'avatar',get_option('default_user_avatar','')) }}"></span>
                                        <label class="pull-right content-clock">{!! $popular->district !!}</label>
                                        <span class="boxicon mdi mdi-map-marker pull-right"></span>
                                        <span class="boxicon mdi mdi-wallet pull-left"></span>
                                        <label class="pull-left" style="margin-left:0px">
                                            @if(isset($popular->price))
                                             {{currencySign()}} 
                                                 @if(isset($popular->discount_price))
                                                    <span style="text-decoration: line-through;color:red;">{{ $popular->discount_price }} </span>
                                                 @endif
                                             {{ $popular->price }} 
                                            @else
                                                {{ trans('main.free') }}
                                            @endif
                                        </label>
                                        
                                    </div>
                                </a>
                            </div>
                       
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="two-ads-container">
                <div class="h-10 visible-xs"></div>
                <div class="row">
                    @if(isset($feature_course_left_ad))
                       <a href="{{ $feature_course_left_ad->url }}"><img src="{{ $feature_course_left_ad->image }}" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>
                     @else
                       <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>  
                    @endif
                    
                    @if(isset($feature_course_right_ad))
                        <a href="{{ $feature_course_right_ad->url }}"><img src="{{ $feature_course_right_ad->image }}" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>
                     @else
                        <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>  
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
