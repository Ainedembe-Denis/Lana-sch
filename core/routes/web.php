<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

// Cron Route
Route::get('cron', 'CronController@cron')->name('cron');

// User Support Ticket
Route::controller('TicketController')->prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/', 'supportTicket')->name('index');
    Route::get('new', 'openSupportTicket')->name('open');
    Route::post('create', 'storeSupportTicket')->name('store');
    Route::get('view/{ticket}', 'viewTicket')->name('view');
    Route::post('reply/{ticket}', 'replyTicket')->name('reply');
    Route::post('close/{ticket}', 'closeTicket')->name('close');
    Route::get('download/{ticket}', 'ticketDownload')->name('download');
});

Route::get('app/deposit/confirm/{hash}', 'Gateway\PaymentController@appDepositConfirm')->name('deposit.app.confirm');

Route::controller('SiteController')->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit');
    Route::get('/faq', 'faq')->name('faq');
    Route::get('/online-library', 'onlineLibrary')->name('online.library');
    Route::get('/annual-program', 'annualProgram')->name('annual.program');
    Route::get('/other-languages', 'otherLanguages')->name('other.languages');
    Route::get('/format-duration', 'formatDuration')->name('format.duration');
    Route::get('/courses/{courseSlug}', 'courseDetail')->name('courses.detail');
    Route::get('/courses/german-a1', 'courseGermanA1')->name('courses.german.a1');
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');

    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');

    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');

    Route::get('blog', 'blogs')->name('blog');
    Route::get('blog/{slug}', 'blogDetails')->name('blog.details');

    Route::get('policy/{slug}', 'policyPages')->name('policy.pages');

    Route::post('/subscribe', 'subscribe')->name('subscribe');
    Route::get('placeholder-image/{size}', 'placeholderImage')->name('placeholder.image');
    Route::post('device/token', 'storeDeviceToken')->name('store.device.token');
    Route::get('maintenance-mode','SiteController@maintenance')->withoutMiddleware('maintenance')->name('maintenance');
    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');
});
