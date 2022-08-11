<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="header">
                <!--<span class="pull-left">{{ trans('main.newest_courses') }}</span>-->
                <span class="pull-left"> নতুন কোর্স সমূহ</span>
                <!--<a href="/category?order=new" class="more-link pull-right">{{ trans('main.load_more') }}</a>-->
                <a href="/category?order=new" class="more-link pull-right">আরো দেখুন</a>
            </div>
            
            
            <div class="body body-s-r" dir="ltr">
                <div class="owl-carousel">
                    @foreach($new_content as $new)

                        <?php $meta = arrayToList($new->metas, 'option', 'value'); ?>
                        <div class="owl-car-s" dir="rtl">
                             
                            <!--<span class="offer_badge">Free</span>-->
                            <a href="/product/{{ $new->id }}/{!! \Illuminate\Support\Str::slug($new->title) ?? '' !!}" title="{{ $new->title }}" class="content-box" style="height: 330px">
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
                                
                                <h3>{!! truncate($new->title,50) !!}</h3>
                                <!--<h3>{{\Illuminate\Support\Str::limit($new->title,50)}}      </h3>-->
                               
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
                                     <p class=""><i class="fa fa-user-plus"></i>( {{ $new->view }})</p>
                                    @if(isset($new->user))
                                    <span class="avatar" title="{{ $new->user->name }}" onclick="window.location.href = '/profile/{{ $new->user->id }}'">
                                        <img src="{{ get_user_meta($new->user_id,'avatar',get_option('default_user_avatar','')) }}"/>
                                    </span>
                                    @endif
                                    <label class="pull-right content-clock">{{ $new->district }}</label>
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
            </div>
        </div>
    </div>
</div>
