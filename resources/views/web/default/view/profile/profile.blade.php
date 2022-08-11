@extends(getTemplate().'.view.layout.layout')
@section('title')
    {!! $setting['site']['site_title'].'Profile-'.$profile->name !!}
@endsection
@section('meta_description',get_option('site_meta_description'))
@section('meta_keyword',get_option('site_meta_keyword'))
@section('page')
    <div class="container-fluid profile-top-background" style="background: url('{{ !empty($meta['profile_image']) ? $meta['profile_image'] : get_option('default_user_cover','') }}');">
        <div class="col-md-3 col-xs-12">

        </div>
        <div class="col-md-9 col-xs-12 bottom-section">
            <span>
                <label class="profile-name">{{ $profile->name }}</label>
                <!--@if($follow == 0)-->
                <!--    <a class="btn btn-red btn-hover-animate" href="/follow/{{ $profile->id }}"><span class="homeicon mdi mdi-plus"></span>&nbsp;&nbsp;{{ trans('main.follow') }}</a>-->
                <!--@else-->
                <!--    <a class="btn btn-red btn-hover-animate" href="/unfollow/{{ $profile->id }}"><span class="homeicon mdi mdi-close"></span>&nbsp;&nbsp;{{ trans('main.unfollow') }}</a>-->
                <!--@endif-->
                <!--<label class="buttons"><span class="homeicon mdi mdi-account-heart"></span><p>{{ $follow_count }}&nbsp;{{ trans('main.followers') }}</p></label>-->
                <!--<label class="buttons"><span class="homeicon mdi mdi-library-video"></span><p>{!! count($videos) !!} {{ trans('main.courses') }}</p></label>-->
                <!--<label class="buttons"><span class="homeicon mdi mdi-clock"></span><p class="duration-f">{{ $duration }}&nbsp;{{ trans('main.minutes_stat') }}</p></label>-->
            </span>    
        </div>
    </div>
    <div class="container-fluid profile-middle-background">
        <div class="container">
            <div class="col-md-2 col-xs-12 profile-avatar-container tab-con">
                <img class="sbox3" src="{{ !empty($meta['avatar']) ? $meta['avatar'] : get_option('default_user_avatar','') }}"/>
                <div class="rate-section raty" score="{!! profileRate($profile->id) ?? 0 !!}"></div>
            </div>
            <div class="col-md-3 col-xs-12 text-center">
                <ul class="profile_social">
                    @if(!empty($socials))
                        @foreach($socials as $social)
                            <li class="profile_social_list">
                                <a href="{{ $social->link }}" target="_blank" title="{{ $social->title }}">
                                    <img src="{{ $social->icon }}" alt="{{ $social->title }}" style="height:30px;width:40px;margin: 100px 3px 0px 0px;"/>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="location-section col-md-7 col-xs-12">
                <div class="profile_name_item"><b>{{ $profile->name }}</b></div>
                <div class="profile_register_date_item"><b>{{ trans('main.registration_date') }}: {{ date('d F Y',$profile->created_at) }}</b></div>
            </div>
            
        </div>
    </div>
    <div class="h-10"></div>
    <div class="container-fluid bg-gray-s">
        <div class="row ucp-menu-item">
            <div class="container">
                <div class="seven-cols">
                    <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                        <a href="javascript:void(0)" tab-id="t-biography" class="item-box sbox3 arrow_box">
                            <span class="micon mdi mdi-account-tie"></span>
                            <span>{{ trans('main.profile') }}</span>
                        </a>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                        <a href="javascript:void(0)" tab-id="t-videos" class="item-box sbox3">
                            <span class="micon mdi mdi-library-video"></span>
                            <!--<span>{{ trans('main.courses') }}</span>-->
                            <span> Course Post</span>
                        </a>
                    </div>
                    <div class="h-10 visible-xs"></div>
                    <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                        <a href="javascript:void(0)" tab-id="t-article" class="item-box sbox3">
                            <span class="micon mdi mdi-chair-school"></span>
                            <!--<span>{{ trans('main.articles') }}</span>-->
                            <span> Venu Post</span>
                        </a>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-6 tab-con">
                        <a href="javascript:void(0)" tab-id="t-channels" class="item-box sbox3">
                            <span class="micon mdi mdi-bullhorn"></span>
                            <span>{{ trans('main.channels') }}</span>
                        </a>
                    </div>
                    <!--<div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
                    <!--    <a href="javascript:void(0)" tab-id="t-medals" class="item-box sbox3">-->
                    <!--        <span class="micon mdi mdi-medal"></span>-->
                    <!--        <span>{{ trans('main.badges') }}</span>-->
                    <!--    </a>-->
                    <!--</div>-->
                    <!--<div class="h-10 visible-xs"></div>-->
                    <!--<div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
                    <!--    <a href="javascript:void(0)" tab-id="t-record" class="item-box sbox3">-->
                    <!--        <span class="micon mdi mdi-video"></span>-->
                    <!--        <span>{{ trans('main.future_courses') }}</span>-->
                    <!--    </a>-->
                    <!--</div>-->
                    
                    <div class="h-10 visible-xs"></div>
                    <div class="col-md-1 col-sm-6 col-xs-12 tab-con">
                        <a href="javascript:void(0)" tab-id="t-request" class="item-box sbox3">
                            <span class="micon mdi mdi-camera-enhance"></span>
                            <!--<span>{{ trans('main.request_course') }}</span>-->
                            <span> Gallery</span>
                        </a>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-12 tab-con">
                        <a href="javascript:void(0)" tab-id="t-instructor" class="item-box sbox3">
                            <span class="micon mdi mdi-account-tie"></span>
                            <!--<span>{{ trans('main.request_course') }}</span>-->
                            <span> Instructor</span>
                        </a>
                    </div>
                    <div class="col-md-1 col-sm-6 col-xs-12 tab-con">
                        <a href="javascript:void(0)" tab-id="t-contact" class="item-box sbox3">
                            <span class="micon mdi mdi-map-marker"></span>
                            <!--<span>{{ trans('main.request_course') }}</span>-->
                            <span> Contact</span>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-gray-s">
        <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!--@if(isset($ads))-->
                <!--@foreach($ads as $ad)-->
                <!--    @if($ad->position == 'main-slider-side')-->
                <!--        <a href="{{ $ad->url }}"><img src="{{ $ad->image }}" class="{{ $ad->size }}"></a>-->
                <!--    @endif-->
                <!--@endforeach-->
                <!--@endif-->
                <div class="row">
                    @if(isset($sidebar_top_ad))
                    <a href="{{ $sidebar_top_ad->url }}"><img src="{{ $sidebar_top_ad->image }}" class="{{ $sidebar_top_ad->size }}"></a>
                @else
                    <a href="#"><img src="{{ asset('assets/default/images/dummy-add.jpg') }}" class="col-md-12 col-sm-12 col-xs-12"></a>    
                @endif
                </div>
                <br>
                <div class="row">
                    @if(isset($sidebar_bottom_ad))
                    <a href="{{ $sidebar_bottom_ad->url }}"><img src="{{ $sidebar_bottom_ad->image }}" class="{{ $sidebar_bottom_ad->size }}"></a>
                @else
                    <a href="#"><img src="{{ asset('assets/default/images/dummy-add.jpg') }}" class="col-md-12 col-sm-12 col-xs-12"></a>    
                @endif
                </div>
            </div>
            <div class="col-md-8 remove-padding-xs">
                
                <div id="t-contact" class="profile-section-fade newest-container newest-container-p">
                   <div class="body body-target-s" style="margin-left:10px">
                     <h3>Company Address: </h3>

                    <p class="mdi mdi-map-marker"> {{ isset($meta['address']) ? $meta['address'] : 'N/A' }} </p>
                    <p class="mdi mdi-phone"> {{ isset($meta['phone']) ? $meta['phone'] : 'N/A' }}</p>
                    </div>
                </div>
                
                <div id="t-biography" class="profile-section-fade profile-section sbox3 doview">
                    <!--<div class="row">-->
                    <!--    <div class="col-md-3 col-xs-12 col-sm-6 text-center">-->
                    <!--        <h4>{{ trans('main.courses_feedback') }}</h4>-->
                    <!--        <div class="h-5"></div>-->
                    <!--        <span class="dis-block">({{ $video_rate }})</span>-->
                    <!--        <div class="h-10"></div>-->
                    <!--        <div class="progress" dir="ltr">-->
                    <!--            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="3.4"-->
                    <!--                 aria-valuemin="1" aria-valuemax="5" style="width:{{ ($video_rate/5)*100 }}%">-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-md-3 col-xs-12 col-sm-6 text-center">-->
                    <!--        <h4>{{ trans('main.support_feedback') }}</h4>-->
                    <!--        <div class="h-5"></div>-->
                    <!--        <span class="dis-block">({{ $support_rate }})</span>-->
                    <!--        <div class="h-10"></div>-->
                    <!--        <div class="progress" dir="ltr">-->
                    <!--            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ $support_rate }}"-->
                    <!--                 aria-valuemin="1" aria-valuemax="5" style="width:{{ ($support_rate / 5) * 100 }}%">-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-md-3 col-xs-12 col-sm-6 text-center">-->
                    <!--        <h4>{{ trans('main.postal_feedback') }}</h4>-->
                    <!--        <div class="h-5"></div>-->
                    <!--        <span class="dis-block">({{ $sell_rate }})</span>-->
                    <!--        <div class="h-10"></div>-->
                    <!--        <div class="progress" dir="ltr">-->
                    <!--            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ $sell_rate }}"-->
                    <!--                 aria-valuemin="1" aria-valuemax="5" style="width:{{ ($sell_rate / 5) * 100 }}%">-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--    <div class="col-md-3 col-xs-12 col-sm-6 text-center">-->
                    <!--        <h4>{{ trans('main.articles_feedback') }}</h4>-->
                    <!--        <div class="h-5"></div>-->
                    <!--        <span class="dis-block">({{ $article_rate }})</span>-->
                    <!--        <div class="h-10"></div>-->
                    <!--        <div class="progress" dir="ltr">-->
                    <!--            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $article_rate }}"-->
                    <!--                 aria-valuemin="1" aria-valuemax="5" style="width:{{ ($article_rate / 5) * 100 }}%">-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="h-20"></div>
                    @if(!isset($meta['biography']))
                        <div class="text-center">
                            <img src="/assets/default/images/empty/biography.png">
                            <div class="h-20"></div>
                            <span class="empty-first-line">{{ trans('main.no_biography') }}</span>
                            <div class="h-20"></div>
                        </div>
                    @else
                        {{ $meta['biography'] }}
                    @endif
                </div>

                <div id="t-videos" class="profile-section-fade newest-container newest-container-p">
                    <div class="body body-target-s">
                        <div class="row">
                            @foreach($courses as $vid)
                                <!--<?php $meta = arrayToList($vid->metas, 'option', 'value'); ?>-->
                                <div class="col-md-3 col-sm-6 col-xs-12 tab-con">
                                    <a href="/product/{{ $vid->id }}" title="{{ $vid->title }}" class="content-box" style="height:325px">
                                        <!--<img alt="{{ $vid->title ?? '' }}" src="{{ !empty($meta['thumbnail']) ? $meta['thumbnail'] : '' }}"/>-->
                                        @if($vid->thumbnail_photo)
                                     
                                        <img src="/uploads/content_thumbnails/{{ $vid->thumbnail_photo }}" id="profilePhotoViewer" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @else
                                            <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer1" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @endif
                                        <h3>{!! truncate($vid->title,35) !!}</h3>
                                        <div class="footer">
                                            <!--<label class="pull-right">{!! contentDuration($vid->id) ?? '' !!}</label>-->
                                            <!--<span class="boxicon mdi mdi-clock pull-right"></span>-->
                                            <!--<span class="boxicon mdi mdi-wallet pull-left"></span>-->
                                            <!--<label class="pull-left">{{ currencySign() }}{{ $meta['price'] ?? 0 }}</label>-->
                                           
                                            <p class=""><i class="fa fa-university"></i>  
                                                @if($vid->category)
                                                    {{ $vid->category->title }}
                                                @else
                                                    মুক্ত মঞ্চ
                                                @endif
                                            </p>
                                            <p class=""><i class="fa fa-clock-o"></i> {{ date('d F Y',$vid->created_at) }}</p>
                                            <p class=""><i class="fa fa-user-plus"></i> ( 2k)</p>
                                            <p class="pull-left"> {{ currencySign() }}{{ $vid->price ?? 0 }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            @if(count($courses) == 0)
                                <div class="text-center">
                                    <img src="/assets/default/images/empty/Videos.png">
                                    <div class="h-20"></div>
                                    <span class="empty-first-line">{{ trans('main.no_course_profile') }}</span>
                                    <div class="h-20"></div>
                                </div>
                            @endif
                        </div>
                        {{ $courses->links()  }}
                    </div>
                </div>

                <div id="t-channels" class="profile-section-fade newest-container newest-container-p">
                    <div class="body body-target-s">
                        <div class="row">
                    
                            <div>
                                <h3 class="text-center"> বাংলা স্টুডেন্ট.কম ভিডিও চ্যানেল এ আপনাকে স্বাগতম </h3>
                            </div> <br>
                            @foreach($channels as $channel)
                                <div class="col-md-3 col-sm-6 col-xs-12 tab-con">
                                    <a href="/chanel/{{ $channel->username }}" title="{{ $channel->title }}" class="content-box">
                                        @if($channel->avatar)
                                        <img src="{{ $channel->avatar }}" id="profilePhotoViewer" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @else
                                            <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer1" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @endif
                                        <h3>{!! truncate($channel->title,35) !!}</h3>
                                    </a>
                                </div>
                                <!--<div class="col-md-3 tab-con">-->
                                <!--    <a href="/chanel/{{ $channel->username }}" title="{{ $channel->title }}">-->
                                <!--        <img alt="{{ $channel->title ?? '' }}" src="{{ !empty($channel->avatar) ? $channel->avatar : '/assets/default/images/user.png' }}">-->
                                <!--        <span>{{ !empty($channel->title) ? $channel->title : '' }}</span>-->
                                <!--    </a>-->
                                <!--</div>-->
                            @endforeach
                            @if(count($channels) == 0)
                                <div class="text-center">
                                    <img src="/assets/default/images/empty/channel.png">
                                    <div class="h-20"></div>
                                    <span class="empty-first-line">{{ trans('main.no_channel_profile') }}</span>
                                    <div class="h-20"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div id="t-medals" class="profile-section-fade newest-container newest-container-e">
                    <div class="row">
                        @foreach($rates as $rate)
                            <div class="col-md-3 col-xs-12 tab-con">
                                <div class="product-card">
                                    <h2>{{ $rate['description'] }}</h2>
                                    <h4>
                                        <?php $middle = explode(',', $rate['value']); ?>
                                        {{ trans('main.From') }}
                                        {{ $middle[0] }}
                                        {{ trans('main.to') }}
                                        {{ $middle[1] }}
                                        @if($rate['mode'] == 'videocount')
                                            {{ 'Courses' }}
                                        @elseif($rate['mode'] == 'day')
                                            {{ 'Reg. Days' }}
                                        @elseif($rate['mode'] == 'buycount')
                                            {{ 'Purchases' }}
                                        @elseif($rate['mode'] == 'sellcount')
                                            {{ 'Sales' }}
                                        @else
                                            {{ 'Rates' }}
                                        @endif
                                    </h4>
                                    <figure>
                                        <img src="{{ $rate['image'] }}" alt="{{ $rate['description'] }}"/>
                                    </figure>
                                </div>
                            </div>
                        @endforeach
                        @if(count($rates) == 0)
                            <div class="text-center">
                                <img src="/assets/default/images/empty/discount.png">
                                <div class="h-20"></div>
                                <span class="empty-first-line">{{ trans('main.no_badge') }}</span>
                                <div class="h-20"></div>
                            </div>
                        @endif
                    </div>
                </div>

                <div id="t-article" class="profile-section-fade newest-container newest-container-p">
                    <div class="body body-target-s body-target-s">
                        <div class="row">
                            @foreach($venus as $vid)
                                <!--<?php $meta = arrayToList($vid->metas, 'option', 'value'); ?>-->
                                <div class="col-md-3 col-sm-6 col-xs-12 tab-con">
                                    <a href="/product/{{ $vid->id }}" title="{{ $vid->title }}" class="content-box" style="height:260px">
                                        @if($vid->thumbnail_photo)
                                     
                                        <img src="/uploads/content_thumbnails/{{ $vid->thumbnail_photo }}" id="profilePhotoViewer" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @else
                                            <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer1" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @endif
                                        <h3>{!! truncate($vid->title,35) !!}</h3>
                                        <div class="footer">
                                            <p class="pull-left"> {{ currencySign() }}{{ $vid->price ?? 0 }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                            @if(count($venus) == 0)
                                <div class="text-center">
                                    <img src="/assets/default/images/empty/Videos.png">
                                    <div class="h-20"></div>
                                    <span class="empty-first-line">{{ trans('main.no_course_profile') }}</span>
                                    <div class="h-20"></div>
                                </div>
                            @endif
                        </div>
                        {{ $venus->links()  }}
                    </div>
                </div>

                <div id="t-request" class="profile-section-fade newest-container newest-container-e">
                    <div class="body body-target-s">
                         <div class="row">
                            @foreach($galleries as $vid)
                                <!--<?php $meta = arrayToList($vid->metas, 'option', 'value'); ?>-->
                                <div class="col-md-3 col-sm-6 col-xs-12 tab-con">
                                    <a href="#" title="{{ $vid->title }}" class="content-box" >
                                        @if($vid->photo)
                                        <img src="/uploads/gallery/{{ $vid->photo }}" id="profilePhotoViewer" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @else
                                            <img src="{{ url('/assets/default/images/profile_big_icon.png') }}" id="profilePhotoViewer1" width="300" style="height:150px" class="img img-responsive img-thumbnail" style="border-radius: 10px;">
                                        @endif
                                       <h3>{{ $vid->title }}</h3>
                                    </a>
                                </div>
                            @endforeach
                            @if(count($galleries) == 0)
                                <div class="text-center">
                                    <img src="/assets/default/images/empty/Videos.png">
                                    <div class="h-20"></div>
                                    <span class="empty-first-line"> No Gallery Found</span>
                                    <div class="h-20"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div id="t-instructor" class="profile-section-fade newest-container newest-container-p">
                    <div class="body body-target-s" style="margin-left:10px">
                        <h3>Instructors details:</h3>
                        @foreach($instructors as $vid)
                        <div class="row">
                            <?php
                                $instructor = DB::table('instructor_info')->where('id', $vid->instructor_id)->first();
                                ?>
                            <div class="col-md-10">
                                <h4>{{ isset($instructor->name) ? $instructor->name : 'N/A' }} ({{ isset($instructor->gender) ? $instructor->gender : 'N/A' }})</h4>
                            </div>
                            <div class="col-md-2">
                                @if($instructor->image)
                                <img src="/uploads/instructor_images/{{ $instructor->image }}"  style="height:60px;width:80px">
                                @else
                                    <img src="/assets/default/images/empty/biography.png" style="height:60px;width:80px">
                                @endif
                            </div>
                        </div><br>
                       @endforeach
                       @if(count($instructors) == 0)
                            <div class="text-center">
                                <img src="/assets/default/images/empty/recording.png">
                                <div class="h-20"></div>
                                <span class="empty-first-line"> No Instructor Found</span>
                                <div class="h-20"></div>
                            </div>
                        @endif
                   </div> 
                </div>

                <!--<div id="t-record" class="profile-section-fade newest-container newest-container-p">-->
                <!--    <div class="body bodt-target-s">-->
                <!--        <div class="row">-->
                <!--            @foreach($record as $vid)-->
                <!--                <?php $meta = arrayToList($vid->metas, 'option', 'value'); ?>-->
                <!--                <div class="col-md-3 col-sm-6 col-xs-12 tab-con">-->
                <!--                    <a href="/product/{{ $vid->id }}" title="{{ $vid->title }}" class="content-box">-->
                <!--                        <img alt="{{ $vid->title ?? '' }}" src="{{ $vid->image }}"/>-->
                <!--                        <h3>{!! truncate($vid->title,35) !!}</h3>-->
                <!--                        <div class="footer">-->
                <!--                            <label class="pull-left">{{ $vid->category->title ?? '' }}</label>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </div>-->
                <!--            @endforeach-->
                <!--            @if(count($record) == 0)-->
                <!--                <div class="text-center">-->
                <!--                    <img src="/assets/default/images/empty/recording.png">-->
                <!--                    <div class="h-20"></div>-->
                <!--                    <span class="empty-first-line">{{ trans('main.no_future_profile') }}</span>-->
                <!--                    <div class="h-20"></div>-->
                <!--                </div>-->
                <!--            @endif-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        
        </div>
        <div class="h-10"></div>
     
        <div class="row">
            <!--@if(isset($ads))-->
            <!--    @foreach($ads as $ad)-->
            <!--        @if($ad->position == 'product-page')-->
            <!--            <a href="{{ $ad->url }}"><img src="{{ $ad->image }}" class="col-md-12" style="height:200px"></a>-->
            <!--        @endif-->
            <!--    @endforeach-->
            <!--@endif-->
            
            @if(isset($footer_ad))
                <a href="{{ $footer_ad->url }}"><img src="{{ $footer_ad->image }}" class="col-md-12" style="height:200px"></a>
            @else
                <a href="#"><img src="{{ asset('assets/default/images/dummy-add.jpg') }}" class="col-md-12" style="height:200px"></a>    
            @endif
            
        </div>
         <div class="h-10"></div>
        </div>
    </div>
    <div class="h-10"></div>
    <div class="h-10"></div>
@stop
@section('script')
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
@endsection
