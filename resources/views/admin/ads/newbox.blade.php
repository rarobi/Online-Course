@extends('admin.newlayout.layout',['breadcom'=>['Advertising','New Banner']])
@section('title')
    New Addvertisement
@endsection
@section('page')
    <section class="card">
        <div class="card-body">

            <form action="/admin/ads/box/store" class="form-horizontal form-bordered" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-md-1 control-label" for="inputDefault">{{ trans('admin.th_title') }}</label>
                    <div class="col-md-5">
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="h-20"></div>
                    <label class="col-md-1 control-label" for="inputDefault">{{ trans('admin.position') }}</label>
                    <div class="col-md-5">
                        <select name="position" class="form-control">
                            <option value="homepage-after-banner-top">Home Page After Banner Top</option>
                            <option value="homepage-after-banner-bottom">Home Page After Banner Bottom</option>
                            <option value="homepage-before-new-course-left">Home Page Before New Course Left</option>
                            <option value="homepage-before-new-course-right">Home Page Before New Course Right</option>
                            <option value="homepage-after-popular-course-left">Home Page After Popular Course Left</option>
                            <option value="homepage-after-popular-course-right">Home Page After Popular Course Right</option>
                            <option value="homepage-after-featured-course-left">Home Page After Featured Course Left</option>
                            <option value="homepage-after-featured-course-right">Home Page After Featured Course Right</option>
                            <option value="homepage after-live-course-left">Home page After Live Course Left</option>
                            <option value="homepage after-live-course-right">Home page After Live Course Right</option>
                            <option value="categorypage-left-top-sidebar">Category Page Left Top Sidebar</option>
                            <option value="categorypage-left-bottom-sidebar">Category Page Left Bottom Sidebar</option>
                            <option value="categorypage-after-pagination-left">Category Page After Pagination left</option>
                            <option value="categorypage-after-pagination-right">Category Page After Pagination Right</option>
                            <option value="productpage-before-course-slider">Product Page Before Course Slider</option>
                            <option value="productpage-right-side-top">Product Page Right Side Top</option>
                            <option value="productpage-right-side-mid">Product Page Right Side Mid</option>
                            <option value="productpage-right-side-bottom">Product Page Right Side Bottom</option>
                            <option value="profilepage-before-footer">Profile Page Before Footer</option>
                            <option value="profilepage-right-side-top">Profile Page Right Side Top</option>
                            <option value="profilepage-right-side-bottom">Profile Page Right Side Bottom</option>
                            <option value="channelpage-before-footer">Channel Page Before Footer</option>
                            <option value="channelpage-right-side-top">Channel Page Right Side Top</option>
                            <option value="channelpage-right-side-bottom">Channel Page Right Side Bottom</option>
                            <!--<option value="main-slider-side">{{ trans('admin.homepage_slider') }}</option>-->
                            <!--<option value="main-article-side">{{ trans('admin.homepage_articles') }}</option>-->
                            <!--<option value="category-side">{{ trans('admin.cat_page_sidebar') }}</option>-->
                            <!--<option value="category-pagination-bottom">{{ trans('admin.cat_page_bottom') }}</option>-->
                            <!--<option value="product-page">{{ trans('admin.product_page') }}</option>-->
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 control-label" for="inputDefault">{{ trans('admin.image') }}</label>
                    <div class="col-md-5">
                        <div class="input-group" style="display: flex">
                            <button type="button" data-input="image" data-preview="holder" class="lfm_image btn btn-primary">
                                Choose
                            </button>
                            <input id="image" class="form-control" type="text" name="image" dir="ltr" required>
                            <div class="input-group-prepend view-selected cu-p" data-toggle="modal" data-target="#ImageModal" data-whatever="image">
                                <span class="input-group-text">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="h-20"></div>
                    <label class="col-md-1 control-label" for="inputDefault">{{ trans('admin.banner_size') }}</label>
                    <div class="col-md-5">
                        <select name="size" class="form-control">
                            @foreach (\App\Models\AdsBox::$sizes as $index => $size)
                                <option value="{{ $size }}">{{ $index }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 control-label" for="inputDefault">{{ trans('admin.link_address') }}</label>
                    <div class="col-md-5">
                        <input type="text" name="url" dir="ltr" class="form-control text-left" required>
                    </div>
                    <div class="h-20"></div>
                    <!--<label class="col-md-1 control-label" for="inputDefault">{{ trans('admin.sort') }}</label>-->
                    <!--<div class="col-md-5">-->
                    <!--    <input type="number" min="0" max="99" name="sort" dir="ltr" class="form-control text-center">-->
                    <!--</div>-->
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="custom-switches-stacked">
                            <label class="custom-switch">
                                <input type="hidden" name="mode" value="draft">
                                <input type="checkbox" name="mode" value="publish" class="custom-switch-input"/>
                                <span class="custom-switch-indicator"></span>
                                <label class="custom-switch-description" for="inputDefault">{{ trans('admin.publish_item') }}</label>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary pull-left" type="submit">{{ trans('admin.save_changes') }}</button>
                    </div>
                </div>

            </form>
        </div>
    </section>

@endsection

