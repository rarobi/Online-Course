<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="header">
                <!--<span class="pull-left">{{ trans('main.newest_courses') }}</span>-->
                <span class="popular pull-left">ভেন্যু ভাড়া </span>
                <!--<a href="/category?order=new" class="more-link pull-right">{{ trans('main.load_more') }}</a>-->
                <a href="/category?order=venu" class="more-link pull-right">আরো দেখুন</a>
            </div>
            
            
            <div class="body body-s-r" dir="ltr">
                <div class="owl-carousel">
                    @foreach($venu_content as $new)
                  
                        <!--<?php $meta = arrayToList($new->metas, 'option', 'value'); ?>-->
                        <div class="owl-car-s" dir="rtl">
                            <a href="/venu/{{ $new->id }}/{!! \Illuminate\Support\Str::slug($new->title) ?? '' !!}" title="{{ $new->title }}" class="content-box">
                                <!--<img src="{{ !empty($meta['thumbnail']) ? $meta['thumbnail'] : '' }}" alt="{!! $new->title ?? '' !!}"/>-->
                                 @if($new->thumbnail_photo)
                                    <img src="/uploads/venu_thumbnails/{{ $new->thumbnail_photo }}" class="img img-responsive img-thumbnail">
                                @else
                                    <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" class="img img-responsive img-thumbnail">
                                @endif
                                @if($new->free_extra_feature)
                                <span class="live_class">Special Offer</span>
                                @endif
                                <h3>{!! truncate($new->title,30) !!}</h3>
                                <div class="footer">
                                    <!--@if(isset($new->user))-->
                                    <!--<span class="avatar" title="{{ $new->user->name }}" onclick="window.location.href = '/profile/{{ $new->user->id }}'">-->
                                    <!--    <img src="{{ get_user_meta($new->user_id,'avatar',get_option('default_user_avatar','')) }}"/>-->
                                    <!--</span>-->
                                    <!--@endif-->
                                    <label class="pull-right content-clock">{!! $new->district !!}</label>
                                    <span class="boxicon mdi mdi-map-marker pull-right"></span>
                                    <!--<span class="boxicon mdi mdi-wallet pull-left"></span>-->

                                    <label class="pull-left">
                                        @if(isset($new->price))
                                            {{currencySign()}}{{ $new->price }} /{{ $new->price_type }}
                                        @else
                                            {{ trans('main.free') }}
                                        @endif
                                    </label>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
