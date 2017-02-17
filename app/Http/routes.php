<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Http\Controllers\Controller;

Route::group(['domain' => '{tenantSubdomain}.bizindex.app', 'middleware' => 'checkValidTenant'], function () {
    Route::get('/', 'HomeController@index');

    Route::get('description', 'HomeController@description');
    Route::get('description/staff', 'HomeController@staff');
    Route::get('description/gallery', 'HomeController@gallery');

    Route::get('offer', 'HomeController@offer');
    Route::get('offer/{categorySlug}', 'HomeController@offercategory');
    Route::get('offer/{categorySlug}/{slug}', 'HomeController@offeritem');

    Route::get('contact', 'HomeController@contact');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'AdminController@index');

    Route::resource('tenants', 'TenantController');

    Route::resource('tenants.descriptions', 'Description\DescriptionController');
    Route::resource('tenants.descriptions.subdescriptions', 'Description\SubdescriptionController');
    Route::resource('tenants.descriptions.staff', 'Description\Staff\StaffController');
    Route::resource('tenants.descriptions.staff.staffmember', 'Description\Staff\StaffMemberController');
    Route::resource('tenants.descriptions.mediagalleries', 'Description\MediaGallery\MediaGalleryController');
    Route::resource('tenants.descriptions.mediagalleries.mediaitems', 'Description\MediaGallery\MediaItemController');

    Route::resource('tenants.offers', 'Offer\OfferController');
    Route::resource('tenants.offers.offercategories', 'Offer\OfferCategory\OfferCategoryController');
    Route::resource('tenants.offers.offercategories.offeritems', 'Offer\OfferCategory\OfferItem\OfferItemController');
    Route::resource('tenants.offers.offerpromotions', 'Offer\OfferPromotion\OfferPromotionController');

    Route::resource('tenants.contacts', 'Contact\ContactController');
    Route::resource('tenants.contacts.timetables', 'Contact\Timetable\TimetableController');
    Route::resource('tenants.contacts.timetables.timetableitems', 'Contact\Timetable\TimetableItemController');
});

Route::get('/', function () {
    return view('welcome');
});