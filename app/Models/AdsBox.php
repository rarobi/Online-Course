<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdsBox extends Model
{
    protected $table = 'ads_box';
    protected $guarded = ['id'];
    public $timestamps = false;

    // static $positions = [
    //     'main-slider-side' => 'homepage_slider',
    //     'main-article-side' => 'homepage_articles',
    //     'category-side' => 'cat_page_sidebar',
    //     'category-pagination-bottom' => 'cat_page_bottom',
    //     'product-page' => 'product_page',
    // ];
    
    static $positions = [
        'homepage-after-banner-top' => 'Home Page After Banner Top',
        'homepage-after-banner-bottom' => 'Home Page After Banner Bottom',
        'homepage-before-new-course-left' => 'Home Page Before New Course Left',
        'homepage-before-new-course-right' => 'Home Page Before New Course Right',
        'homepage-after-popular-course-left' => 'Home Page After Popular Course Left',
        'homepage-after-popular-course-right' => 'Home Page After Popular Course Right',
        'homepage-after-featured-course-left' => 'Home Page After Featured Course Left',
        'homepage-after-featured-course-right' => 'Home Page After Featured Course Right',
        'homepage after-live-course-left' => 'Home page After Live Course Left',
        'homepage after-live-course-right' => 'Home page After Live Course Right',
        'categorypage-left-top-sidebar' => 'Category Page Left Top Sidebar',
        'categorypage-left-bottom-sidebar' => 'Category Page Left Bottom Sidebar',
        'categorypage-after-pagination-left' => 'Category Page After Pagination left',
        'categorypage-after-pagination-right' => 'Category Page After Pagination Right',
        'productpage-before-course-slider' => 'Product Page Before Course Slider',
        'productpage-right-side-top' => 'Product Page Right Side Top',
        'productpage-right-side-mid' => 'Product Page Right Side Mid',
        'productpage-right-side-bottom' => 'Product Page Right Side Bottom',
        'profilepage-before-footer' => 'Profile Page Before Footer',
        'profilepage-right-side-top' => 'Profile Page Right Side Top',
        'profilepage-right-side-bottom' => 'Profile Page Right Side Bottom',
        'channelpage-before-footer' => 'Channel Page Before Footer',
        'channelpage-right-side-top' => 'Channel Page Right Side Top',
        'channelpage-right-side-bottom' => 'Channel Page Right Side Bottom',
        
    ];

    static $sizes = [
        'Original' => 'col-md-12 col-sm-12 col-xs-12',
        '1/2' => 'col-md-6 col-sm-6 col-xs-12',
        '1/3' => 'col-md-4 col-sm-6 col-xs-12',
        '1/4' => 'col-md-3 col-sm-6 col-xs-12',
    ];
}
