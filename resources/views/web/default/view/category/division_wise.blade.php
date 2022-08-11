@extends(getTemplate().'.view.layout.layout')
@section('title')
    {{ get_option('site_title','') }} - Division Wise Content
@endsection
@section('meta_description',get_option('site_meta_description'))
@section('meta_keyword',get_option('site_meta_keyword'))
@section('page')

    <div class="container-fluid">
        <div class="row cat-search-section" style="background: url('');">
            <div class="container">
                <div class="col-md-6 col-sm-6 col-xs-12 tab-con cat-icon-container">
                   
                </div>
                <div class="col-md-2 tab-con">
                    <div class="h-10"></div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="box box-s">
                        <div class="container-2">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row cat-tag-section">
            <div class="container">
               <div class="user-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="active"><a href="#tab1" role="tab" data-toggle="tab"><strong>Courses</strong></a></li>
                            <li><a href="#tab2" role="tab" data-toggle="tab"><strong>Venue</strong></a></li>
                        </ul>
                        <!-- TAB CONTENT -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1">
                                <div class="col-md-12 col-xs-12" style="margin-top:20px">
                                    <div class="newest-container newest-container-s">
                                        <div class="row body body-target body-target-s">
                                           @if(count($contents) > 0) 
                                                @foreach($contents as $content)
                                                  @if($content->type == 'course')
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
                                           @else
                                                <p>No Data Found</p>  
                                          @endif 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab2">
                                <div class="col-md-12 col-xs-12" style="margin-top:20px">
                                    <div class="newest-container newest-container-s">
                                        <div class="row body body-target body-target-s">
                                           @if(count($contents) > 0) 
                                            @foreach($contents as $content)
                                              @if($content->type == 'venue')
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
                                          @else
                                                <p>No Data Found</p>  
                                          @endif  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
@endsection
@section('script')
    <script>
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
