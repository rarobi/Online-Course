@extends(getTemplate().'.view.layout.layout')
@section('title')
    {!! $setting['site']['site_title'].'Channel- '.$chanel->title !!}
@endsection
@section('meta_description',get_option('site_meta_description'))
@section('meta_keyword',get_option('site_meta_keyword'))
@section('page')
    <div class="container-fluid profile-top-background" style="background: url('{{ $chanel->image ?? '' }}');">
        <div class="col-md-3 col-xs-12">

        </div>
        <div class="col-md-9 col-xs-12 bottom-section">
            <span>
                <label class="profile-name">{{ $chanel->title }}</label>
                <!--@if($follow == 0)-->
                <!--    <a class="btn btn-red btn-hover-animate" href="/chanel/follow/{{ $chanel->user_id }}"><span class="homeicon mdi mdi-plus"></span> {{ trans('main.follow') }}</a>-->
                <!--@else-->
                <!--    <a class="btn btn-red btn-hover-animate" href="/chanel/unfollow/{{ $chanel->user_id }}"><span class="homeicon mdi mdi-close"></span>{{ trans('main.unfollow') }}</a>-->
                <!--@endif-->
                <!--<label class="buttons"><span class="homeicon mdi mdi-account-heart"></span><p>{{ !empty($follow) ? $follow : '0' }} {{ trans('main.followers') }}</p></label>-->
                <!--<label class="buttons"><span class="homeicon mdi mdi-library-video"></span><p>{{ !empty($chanel->contents_count) ? $chanel->contents_count : 0 }} {{ trans('main.courses') }}</p></label>-->
                <!--<label class="buttons"><span class="homeicon mdi mdi-clock"></span><p class="duration-f">{{ !empty($duration) ? $duration : '0' }}&nbsp;{{ trans('main.minutes_stat') }}</p></label>-->
        </div>
    </div>

    <div class="container-fluid profile-middle-background">
        <div class="container">
            <div class="col-md-2 col-xs-12 tab-con">
                @if($chanel->formal == 'ok')
                    <label title="Formal" class="formal-chanel"><i class="mdi mdi-check-circle"></i></label>
                @endif
                <img class="sbox3" src="{{ $chanel->avatar }}"/>
                <div class="rate-section raty" score="{!! channelRate($chanel->id) ?? 0 !!}"></div>
            </div>
            <div class="location-section col-md-10 col-xs-12">
                <div><b>{!! $chanel->description !!}</b></div>
                <div><b><a href="<?=url('/') . '/' . Request::path();?>" class="uname-f">{{ $chanel->username }}</a></b></div>
            </div>
        </div>
    </div>

    <div class="h-10"></div>

    <!--<div class="container-fluid cont-box-bg">-->

    <!--    <div class="container remove-padding-xs">-->

    <!--        <div class="col-xs-12">-->

    <!--            <div class="h-20"></div>-->
    <!--            <div class="h-10"></div>-->

    <!--            <div class="profile-section-fade newest-container remove-padding-xs remove-bg-xs newest-container-r">-->
    <!--                <div class="body body-target-s">-->
    <!--                    <div class="row">-->
    <!--                        @foreach($chanel->contents as $vid)-->
    <!--                            @if($vid->content != null)-->
    <!--                                @php $meta = arrayToList($vid->content->metas,'option','value'); @endphp-->
    <!--                                <div class="col-md-3 col-sm-6 col-xs-6 tab-con">-->
    <!--                                    <a href="/product/{{ $vid->content->id }}" title="{{ $vid->content->title }}" class="content-box">-->
    <!--                                        <img alt="{{ $vid->content->title ?? '' }}" src="{{ !empty($meta['thumbnail']) ? $meta['thumbnail'] : '' }}"/>-->
    <!--                                        <h3>{!! truncate($vid->content->title,35) !!}</h3>-->
    <!--                                        <div class="footer">-->
    <!--                                            <label class="pull-right">{{ !empty($meta['duration']) ? $meta['duration'] : '' }} {{ trans('main.min') }}</label>-->
    <!--                                            <span class="boxicon mdi mdi-clock pull-right"></span>-->
    <!--                                            <span class="boxicon mdi mdi-wallet pull-left"></span>-->
    <!--                                            <label class="pull-left">{{ currencySign() }}{{ !empty($meta['price']) ? $meta['price'] : '0' }}</label>-->
    <!--                                        </div>-->
    <!--                                    </a>-->
    <!--                                </div>-->
    <!--                            @endif-->
    <!--                        @endforeach-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->


    <!--        </div>-->

    <!--    </div>-->
    <!--</div>-->
    <!--<div class="container-fluid bg-gray-s">-->
    <!--    <div class="row ucp-menu-item">-->
    <!--        <div class="container">-->
    <!--            <div class="seven-cols">-->
    <!--                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
    <!--                    <a href="javascript:void(0)" tab-id="t-biography" class="item-box sbox3 arrow_box">-->
    <!--                        <span class="micon mdi mdi-account-tie"></span>-->
    <!--                        <span>{{ trans('main.profile') }}</span>-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
    <!--                    <a href="javascript:void(0)" tab-id="t-videos" class="item-box sbox3">-->
    <!--                        <span class="micon mdi mdi-library-video"></span>-->
                            <!--<span>{{ trans('main.courses') }}</span>-->
    <!--                        <span> Total Post</span>-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--                <div class="h-10 visible-xs"></div>-->
    <!--                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
    <!--                    <a href="javascript:void(0)" tab-id="t-channels" class="item-box sbox3">-->
    <!--                        <span class="micon mdi mdi-bullhorn"></span>-->
    <!--                        <span>{{ trans('main.channels') }}</span>-->
    <!--                    </a>-->
    <!--                </div>-->
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
    <!--                <div class="col-md-1 col-sm-6 col-xs-6 tab-con">-->
    <!--                    <a href="javascript:void(0)" tab-id="t-article" class="item-box sbox3">-->
    <!--                        <span class="micon mdi mdi-notebook"></span>-->
                            <!--<span>{{ trans('main.articles') }}</span>-->
    <!--                        <span> Others</span>-->
    <!--                    </a>-->
    <!--                </div>-->
    <!--                <div class="h-10 visible-xs"></div>-->
    <!--                <div class="col-md-1 col-sm-6 col-xs-12 tab-con">-->
    <!--                    <a href="javascript:void(0)" tab-id="t-request" class="item-box sbox3">-->
    <!--                        <span class="micon mdi mdi-camera-enhance"></span>-->
                            <!--<span>{{ trans('main.request_course') }}</span>-->
    <!--                        <span> Gallery</span>-->
    <!--                    </a>-->
    <!--                </div>-->
                    
    <!--                <div class="col-md-3 col-xs-12 text-center">-->
    <!--                    <ul class="profile_social">-->
    <!--                        @if(!empty($socials))-->
    <!--                            @foreach($socials as $social)-->
    <!--                                <li class="profile_social_list">-->
    <!--                                    <a href="{{ $social->link }}" target="_blank" title="{{ $social->title }}">-->
    <!--                                        <img src="{{ $social->icon }}" alt="{{ $social->title }}"/>-->
    <!--                                    </a>-->
    <!--                                </li>-->
    <!--                            @endforeach-->
    <!--                        @endif-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="container-fluid bg-gray-s " style="margin-top:10px">
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
                <div id="t-biography" class="profile-section-fade profile-section sbox3 doview">
                    <div class="h-20"></div>
                    @if(!isset($chanel->contents))
                        <div class="text-center">
                            <img src="/assets/default/images/empty/biography.png">
                            <div class="h-20"></div>
                            <span class="empty-first-line"> No channel video found</span>
                            <div class="h-20"></div>
                        </div>
                    @else
                        Channel's video list
                        
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col">Link</th>>
                            </tr>
                          </thead>
                          <tbody>
                             
                            @foreach($chanel->contents as $c)
                                @if($c->content)
                                <tr>
                                  <td>{{ $c->content->title }}</td>
                                  <td>Not Found</td>
                            
                                </tr>
                                @endif
                            @endforeach
                          </tbody>
                        </table>
                    @endif
                </div>
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
                <a href="{{ $footer_ad->url }}"><img src="{{ $footer_ad->image }}" class="class="col-md-12" style="height:200px"></a>
            @else
                <a href="#"><img src="{{ asset('assets/default/images/dummy-add.jpg') }}" class="col-md-12 col-sm-12 col-xs-12" style="height:200px"></a>    
            @endif
            
        </div>
         <div class="h-10"></div>
        </div>
    </div>

@endsection
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
