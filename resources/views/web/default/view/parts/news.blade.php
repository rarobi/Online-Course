<div class="container-fluid">
    <div class="container news-container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-6 news-section">
                <div class="row contents_box">
                    <div class="header">
						<i class="secicon mdi mdi-script-text"></i>
                        <!--<span>{{ trans('main.latest_articles') }}</span>-->
                         <span>সাম্প্রতিক আর্টিকেল</span>
                    </div>
                    <div class="body">
                        <ul>
                            @foreach($article_post as $article)
                                <li>
                                    <a href="/article/item/{{ $article->id }}/{!! \Illuminate\Support\Str::slug($article->title) ?? '' !!}">
                                        <img src="{{ $article->image }}" alt="{{ $article->title ?? '' }}"><span>{{ $article->title }}</span><label for="">{{ date('l d F Y',$article->created_at) }}</label>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="more-link">
						<i class="secicon mdi mdi-dots-horizontal"></i>
                        <!--<a href="/article/list">{{ trans('main.more') }}</a>-->
                        <a href="/article/list">আরো দেখুন</a>
                    </div>
                </div>
                <div class="h-10"></div>
                <div class="row contents_box">
                    <div class="header header-news">
						<i class="secicon mdi mdi-clipboard-text"></i>
                        <!--<span>{{ trans('main.latest_news') }}</span>-->
                        <span>সাম্প্রতিক সংবাদ</span>
                    </div>
                    <div class="body">
                        <ul>
                            @foreach($blog_post as $post)
                                <li><a href="/blog/post/{{ $post->id }}/{!! \Illuminate\Support\Str::slug($post->title) ?? '' !!}"><img src="{{ $post->image }}" alt=""><span>{{ $post->title }}</span><label for="">{{ date('l d F Y',$post->created_at) }}</label></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="more-link">
						<i class="secicon mdi mdi-dots-horizontal"></i>
                        <!--<a href="/blog">{{ trans('main.more') }}</a>-->
                        <a href="/blog">আরো দেখুন</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-6">
                <div class="row-xs">
                    <div class="two-ads-container">
                        <div class="h-10 visible-xs"></div>
                        <div class="row">
                            @if(isset($live_course_left_ad))
                               <a href="{{ $live_course_left_ad->url }}"><img src="{{ $live_course_left_ad->image }}" class="col-md-6 col-sm-6 col-xs-12" height="150"></a>
                             @else
                               <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="150"></a>  
                            @endif
                            
                            @if(isset($live_course_right_ad))
                                <a href="{{ $live_course_right_ad->url }}"><img src="{{ $live_course_right_ad->image }}" class="col-md-6 col-sm-6 col-xs-12" height="150"></a>
                             @else
                                <a href="#"><img src="assets/default/images/dummy-add.jpg" class="col-md-6 col-sm-6 col-xs-12" height="150"></a>  
                            @endif
                        </div>
                    </div>
                </div><br>
                <div class="row-xs contents_box">
                    <div class="top-user-container">
                        <div class="header">
							<i class="secicon mdi mdi-bank"></i>
                            <!--<span class="best-users">{{ trans('main.top_vendors') }}</span>-->
                            <span class="best-users"> সেরা প্রতিষ্ঠান </span>
                        </div>
                        <div class="user-tabs">
                            <!--<ul class="nav nav-tabs nav-justified" role="tablist">-->
                            <!--    <li class="active"><a href="#tab1" role="tab" data-toggle="tab">{{ trans('main.courses_feedback') }}</a></li>-->
                            <!--    <li><a href="#tab2" role="tab" data-toggle="tab">{{ trans('main.courses_count') }}</a></li>-->
                            <!--    <li><a href="#tab3" role="tab" data-toggle="tab">{{ trans('main.sales') }}</a></li>-->
                            <!--</ul>-->
                            <!-- TAB CONTENT -->
                            <div class="tab-content">
                                <div class="active tab-pane fade in" id="tab3">
                                    @if(isset($user_popular))
                                        @foreach($user_popular as $up)
                                            <?php $meta = arrayToList($up->usermetas,'option','value'); ?>
                                            <div class="col-md-3 tab-con">
                                                <a href="/profile/{{ $up->id }}">
                                                    <img alt="{{ $up->username ?? '' }}" src="{{ !empty($meta['avatar']) ? $meta['avatar'] : '/assets/default/images/user.png' }}">
                                                    <span>{{ !empty($up->name) ? $up->name : '' }}</span>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="h-10"></div>
                <div class="row-xs contents_box">
                    <div class="top-user-container">
                        <div class="header">
							<i class="secicon mdi mdi-teach"></i>
                            <!--<span class="best-chanels">{{ trans('main.top_channels') }}</span>-->
                            <span class="best-chanels"> সেরা চ্যানেল</span>
                        </div>
                        <div class="user-tabs">
                            <!--<ul class="nav nav-tabs nav-justified" role="tablist">-->
                            <!--    <li class="active"><a href="#tab4" role="tab" data-toggle="tab">{{ trans('main.newest') }}</a></li>-->
                            <!--    <li><a href="#tab5" role="tab" data-toggle="tab">{{ trans('main.most_viewed') }}</a></li>-->
                            <!--    <li><a href="#tab6" role="tab" data-toggle="tab">{{ trans('main.best_rated') }}</a></li>-->
                            <!--</ul>-->
                            <!-- TAB CONTENT -->
                            <div class="tab-content">
                                <!--<div class="active tab-pane fade in" id="tab4">-->
                                <!--    @if(isset($channels))-->
                                <!--        @foreach($channels['new'] as $ur)-->
                                <!--            <div class="col-md-3 tab-con">-->
                                <!--                <a href="/chanel/{{ $ur->username }}">-->
                                <!--                    <img alt="{{ $ur->title ?? '' }}" src="{{ !empty($ur->avatar) ? $ur->avatar : '/assets/default/images/user.png' }}">-->
                                <!--                    <span>{{ !empty($ur->title) ? $ur->title : '' }}</span>-->
                                <!--                </a>-->
                                <!--            </div>-->
                                <!--        @endforeach-->
                                <!--    @endif-->
                                <!--</div>-->
                                <div class="active tab-pane fade in" id="tab5">
                                    @if(isset($channels))
                                        @foreach($channels['view'] as $ur)
                                            <div class="col-md-3 tab-con">
                                                <a href="/chanel/{{ $ur->username }}">
                                                    <img alt="{{ $ur->title ?? '' }}" src="{{ !empty($ur->avatar) ? $ur->avatar : '/assets/default/images/user.png' }}">
                                                    <span>{{ !empty($ur->title) ? $ur->title : '' }}</span>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                <!--<div class="tab-pane fade" id="tab6">-->
                                <!--    @if(isset($channels))-->
                                <!--        @foreach($channels['popular'] as $ur)-->
                                <!--            <div class="col-md-3 tab-con">-->
                                <!--                <a href="/chanel/{{ $ur->username }}">-->
                                <!--                    <img alt="{{ $ur->title ?? '' }}" src="{{ !empty($ur->avatar) ? $ur->avatar : '/assets/default/images/user.png' }}">-->
                                <!--                    <span>{{ !empty($ur->title) ? $ur->title : '' }}</span>-->
                                <!--                </a>-->
                                <!--            </div>-->
                                <!--        @endforeach-->
                                <!--    @endif-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
