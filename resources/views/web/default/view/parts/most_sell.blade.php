<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="two-ads-container">
                <div class="h-10 visible-xs"></div>
                <div class="row">
                    @if(isset($popular_course_left_ad))
                       <a href="{{ $popular_course_left_ad->url }}"><img src="{{ $popular_course_left_ad->image }}" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>
                     @else
                       <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>  
                    @endif
                    
                    @if(isset($popular_course_right_ad))
                        <a href="{{ $popular_course_right_ad->url }}"><img src="{{ $popular_course_right_ad->image }}" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>
                     @else
                        <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="200"></a>  
                    @endif
                </div>
            </div>
        </div><br><br>
        
        <div class="row">
            <div class="header">
                <!--<span class="pull-left">{{ trans('main.most_sold_products') }}</span>-->
                 <span class="pull-left"> সর্বোচ্চ দেখা কোর্স সমূহ</span>
                <!--<a href="/category?order=sell" class="more-link pull-right">{{ trans('main.load_more') }}</a>-->
                <a href="/category?order=most_view" class="more-link pull-right">আরো দেখুন</a>
            </div>
            <div class="body body-s-r" dir="ltr">
                <span class="nav-right"></span>
                <div class="owl-carousel">
                    @foreach($sell_content as $new)
                        <?php $meta = arrayToList($new->metas, 'option', 'value'); ?>
                        <div class="owl-car-s" dir="rtl">
                            <a href="/product/{{ $new->id }}/{!! \Illuminate\Support\Str::slug($new->title) ?? '-' !!}" title="{{ $new->title }}" class="content-box" style="height: 330px">
                                <!--<img src="{{ !empty($meta['thumbnail']) ? $meta['thumbnail'] : '' }}" alt="{!! $new->title ?? '' !!}"/>-->
                                @if($new->thumbnail_photo)
                                    <img src="/uploads/content_thumbnails/{{ $new->thumbnail_photo }}" class="img img-responsive img-thumbnail">
                                @else
                                    <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" class="img img-responsive img-thumbnail">
                                @endif
                                @if($new->free_extra_feature)
                                    <span class="live_class">Special Offer</span>
                                @endif
                                @if(!$new->price)
                                    <span class="live_class" style="margin-left:70px">Free</span>
                                @endif
                                
                                <h3>{!! truncate($new->title,30) !!}</h3>
                                <div class="footer">
                                    <p class=""><i class="fa fa-university"></i>
                                     <?php
                                        $user =  DB::table('users')->where('id', $new->user_id)->first();
                                     ?>
                                     @if($user->name)
                                        {{ truncate($user->name, 50) }}
                                    @else
                                        মুক্ত মঞ্চ
                                    @endif
                                     </p>
                                     <p class=""><i class="fa fa-clock-o"></i> {{ date('d F, Y', strtotime($new->course_start_date)) }}</p>
                                     <p class=""><i class="fa fa-user-plus"></i>({!! $new->view !!})</p>
                                    @if(isset($new->user))
                                        <span class="avatar" title="{{ $new->user->name }}" onclick="window.location.href = '/profile/{{ $new->user->id }}'">
                                            <img src="{{ get_user_meta($new->user_id,'avatar',get_option('default_user_avatar','')) }}">
                                        </span>
                                    @endif
                                    <label class="pull-right">{!! $new->district !!}</label>
                                    <span class="boxicon mdi mdi-map-marker pull-right"></span>
                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                    <label class="pull-left" style="margin-left:0px">
                                        @if(isset($new->price))
                                         {{currencySign()}} 
                                             @if(isset($new->discount_price))
                                                <span style="text-decoration: line-through;color:red;">{{ $new->discount_price }} </span>
                                             @endif
                                         {{ $new->price }} 
                                        @else
                                            {{ trans('main.free') }}
                                        @endif
                                    </label>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <span class="nav-left pull-right"></span>
            </div>
        </div>
    </div>
</div>