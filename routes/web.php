<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyAccountcontroller;
use App\Http\Controllers\Aboutcontroller;
use App\Http\Controllers\WatchNowcontroller;  
use App\Http\Controllers\Featurescontroller;   
use App\Http\Controllers\Teamcontroller; 
use App\Http\Controllers\Testimonialcontroller;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\Contactcontroller;     
use App\Http\Controllers\ContactUscontroller;   
use App\Http\Controllers\DownloadOurAppController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('login', [AuthController::class, 'login']);
Route::post('login_post', [AuthController::class, 'login_post']);

Route::get('forgot-password', [AuthController::class, 'forgot_password']);

Route::post('forgot_admin', [AuthController::class, 'forgot_admin']);


Route::group(['middleware' => 'admin'], function() {

    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/my_account', [MyAccountcontroller::class, 'my_account']);

    Route::POST('admin/my_account/update', [MyAccountcontroller::class, 'my_account_update']);

    //Home

    Route::get('admin/home', [Homecontroller::class, 'admin_home']);

    Route::post('admin/home/post', [Homecontroller::class, 'admin_home_post']);
    
    // end Home

    // About

    Route::get('admin/about', [Aboutcontroller::class, 'admin_about']);

    Route::post('admin/about/post', [Aboutcontroller::class, 'admin_about_post']);
    
    ////////

    // Video 

    Route::get('admin/watch_now', [WatchNowcontroller::class, 'watch_now']);    

    Route::post('admin/watch_now/post', [WatchNowcontroller::class, 'watch_now_post']);

    ////////


    // Features 

    Route::get('admin/features', [Featurescontroller::class, 'features_list']); 

    Route::post('admin/features/post', [Featurescontroller::class, 'features_post']);

    ////////

    // Our Team

    Route::get('admin/our_team', [Teamcontroller::class, 'our_team_list']);    

    Route::post('admin/our_team/post', [Teamcontroller::class, 'our_team_post']);   

    Route::get('admin/our_team/list/{id}', [Teamcontroller::class, 'our_team_position']);
    
    Route::get('admin/our_team/add/{id}', [Teamcontroller::class, 'our_team_position_add']); 
    
    Route::post('admin/our_team/add/{id}', [Teamcontroller::class, 'our_team_position_add_post']); 
    
    Route::get('admin/our_team/edit/{id}', [Teamcontroller::class, 'our_team_position_edit']); 

    Route::post('admin/our_team/edit/{id}', [Teamcontroller::class, 'our_team_position_edit_update']); 

    Route::get('admin/our_team/delete/{id}', [Teamcontroller::class, 'our_team_position_delete']); 

    ///////////

    // Testimonial 

    Route::get('admin/testimonial', [Testimonialcontroller::class, 'testimonial']);   
   
    Route::post('admin/testimonial/post', [Testimonialcontroller::class, 'testimonial_post']);

    Route::get('admin/testimonial/list', [Testimonialcontroller::class, 'add_testimonial_list']); 
    
    Route::get('admin/testimonial/add', [Testimonialcontroller::class, 'testimonial_add']); 

    Route::post('admin/testimonial/add', [Testimonialcontroller::class, 'testimonial_add_post']);

    Route::get('admin/testimonial/edit/{id}', [Testimonialcontroller::class, 'testimonial_edit']);

    Route::post('admin/testimonial/edit/{id}', [Testimonialcontroller::class, 'testimonial_edit_update']);
    
    Route::get('admin/testimonial/delete/{id}', [Testimonialcontroller::class, 'testimonial_edit_delete']);
   
    //////////////


    /// FAQ
   
    Route::get('admin/faq', [FAQcontroller::class, 'faq']);             

    Route::post('admin/faq/post', [FAQcontroller::class, 'faq_post']); 

    ///////

    /// FAQ Detail

    Route::get('admin/faq/list', [FAQcontroller::class, 'faq_list']); 

    Route::get('admin/faq/add', [FAQcontroller::class, 'faq_add']); 

    Route::post('admin/faq/add', [FAQcontroller::class, 'faq_add_post']); 

    Route::get('admin/faq/edit/{id}', [FAQcontroller::class, 'faq_edit']);

    Route::post('admin/faq/edit/{id}', [FAQcontroller::class, 'faq_edit_update']);
   
    Route::get('admin/faq/delete/{id}', [FAQcontroller::class, 'faq_edit_delete']);

    //////////////
   
    
    // Contact

    Route::get('admin/contact', [Contactcontroller::class, 'contact']); 

    Route::post('admin/contact/post', [Contactcontroller::class, 'contact_post']); 

    //////////

    // Contact Us

    Route::get('admin/contact_us', [Contactcontroller::class, 'contact_us_list']);

    Route::get('admin/contact_us/delete/{id}', [contactcontroller::class, 'contact_us_delete']);

    //////////////

    // Download Our App 

    Route::get('admin/download_our_app', [DownloadOurAppController::class, 'download_our_app']);
    
    Route::post('admin/download_our_app/post', [DownloadOurAppController::class, 'download_our_app_post']);

    ///////////////////

    ///  LOGO

    Route::get('admin/logo', [DashboardController::class, 'admin_logo']);

    Route::post('admin/logo/post', [DashboardController::class, 'admin_logo_post']);

    /////////

    /// SEO
    
    Route::get('admin/seo', [DashboardController::class, 'admin_seo']);     

    Route::post('admin/seo/post', [DashboardController::class, 'admin_seo_post']);
    
});

Route::post('contact/post', [ContactUscontroller::class, 'contact_post_save']); 


Route::get('logout', [AuthController::class, 'logout']);











?>
