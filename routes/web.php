<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\DataAnalyticsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\AuditTrailController;
use App\Http\Controllers\HealthEvaluationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Staff\StaffScheduleController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Backend\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffClientController;


use App\Http\Controllers\Backend\PropertyTypeController;


use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

// User Frontend All Route
Route::get('/', [UserController::class, 'Index']);




// Admin Login Route
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);

//Staff Login
Route::get('/staff/login', [StaffController::class, 'StaffLogin'])->name('staff.login')->middleware(RedirectIfAuthenticated::class); 
Route::post('/staff/register', [StaffController::class, 'StaffRegister'])->name('staff.register');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile'); 
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store'); 

    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout'); 

    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password'); 
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');

    Route::get('/user/schedule/request', [UserController::class, 'UserScheduleRequest'])->name('user.schedule.request'); 

    Route::get('/live/chat', [UserController::class, 'LiveChat'])->name('live.chat'); 
});

require __DIR__.'/auth.php';


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
        Route::get('/dashboard2', [AdminController::class, 'AdminDashboard2'])->name('admin.dashboard2');
        Route::get('/dashboard3', [AdminController::class, 'AdminDashboard3'])->name('admin.dashboard3');
        Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', [AdminController::class, 'AdminProfile'])->name('admin.profile');
            Route::post('/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
        });
    
        Route::group(['prefix' => 'change/password'], function () {
            Route::get('/', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
            Route::post('/update', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
        });

        // Admin Routes for ClientController
        Route::get('/add/client', [ClientController::class, 'addClient'])->name('admin.add.client');
        Route::post('/store/client', [ClientController::class, 'storeClient'])->name('admin.store.client');
        Route::get('/client-directory', [ClientController::class, 'viewClientList'])->name('admin.client.directory');;
        Route::get('/filter-clients', [ClientController::class, 'filterClients'])->name('filter-clients');
        Route::get('/client/{id}', [ClientController::class, 'viewClientPersonalInformation'])->name('admin.view.client.personal');

       // Client profile routes
        Route::get('/client/edit/{id}', [ClientController::class, 'editClientProfile'])->name('edit-client');
        Route::put('/update-client/{id}', [ClientController::class, 'updateClientProfile'])->name('update-client-profile');
        Route::get('/client/view/{encrypted_id}', [ClientController::class, 'viewClientProfile'])->name('view-client-profile');

        Route::get('/client/personal-info/{id}', [ClientController::class, 'viewClientPersonalInfo'])->name('view-client-personal-info');
        Route::get('/client/personal-info/edit/{id}', [ClientController::class, 'editClientPersonalInfo'])->name('edit-client-personal-info');
        Route::put('/client/personal-info/update/{id}', [ClientController::class, 'updateClientPersonalInfo'])->name('update-client-personal-info');


        Route::get('/manage-client-directory', [ClientController::class, 'manageClientList'])->name('manage-client-directory');
        Route::get('/delete-client/{encrypted_id}', [ClientController::class, 'deleteClient'])->name('delete-client');
        Route::get('/deleted-clients', [ClientController::class, 'showDeletedClients'])->name('deleted-clients');
        Route::get('/restore-client/{encrypted_id}', [ClientController::class, 'restoreClient'])->name('restore-client');
        Route::get('/filter-deleted-clients', [ClientController::class, 'filterDeletedClients'])->name('filter-deleted-clients');

        // Admin Add Assessment Record Form
        Route::get('/client/add-assessment-record/{id}', [ClientController::class, 'addAssessmentRecord'])->name('add-assessment-record');
        Route::post('/client/store-assessment-record/{id}', [ClientController::class, 'storeAssessmentRecord'])->name('store-assessment-record');
        Route::get('/client/assessment/{id}', [ClientController::class, 'viewIndividualAssessment'])->name('view-individual-assessment');
        Route::get('/assessment-directory', [ClientController::class, 'viewAssessmentRecordList'])->name('assessment-directory');
        Route::get('/filter-assessment-records', [ClientController::class, 'filterAssessmentRecords'])->name('filter-assessment-records');
        Route::get('/deleted-assessments', [ClientController::class, 'showDeletedAssessmentRecords'])->name('deleted-assessments');
        Route::get('/delete-assessment/{id}', [ClientController::class, 'deleteAssessment'])->name('delete-assessment');
        Route::post('/restore-assessment-record/{id}', [ClientController::class, 'restoreAssessmentRecord'])->name('restore-assessment-record');
        Route::get('/manage-assessments', [ClientController::class, 'manageAssessmentList'])->name('manage-assessments');

         // Admin Route for viewing medical records profile
        Route::get('/client/view-assessments/{id}', [ClientController::class, 'viewClientAssessments'])->name('view-client-assessments');
        Route::get('/client/health-evaluation/{id}', [ClientController::class, 'viewHealthEvaluation'])->name('view-health-evaluation');
        Route::get('/client/latest-assessment/{id}', [ClientController::class, 'viewLatestAssessment'])->name('view-latest-assessment');
        Route::get('/client/med-info/{id}', [ClientController::class, 'viewMedInfo'])->name('view-med-info');

        // Data Analytics
        Route::get('/data-analytics', [DataAnalyticsController::class, 'showDataAnalytics'])->name('data-analytics');
    });

    // Permission All Route
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'Storepermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission'); 
    });

    // Roles All Route
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        Route::get('/add/roles', 'AddRoles')->name('add.roles');
        Route::post('/store/roles', 'StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
        Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles'); 

        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');
        Route::get('all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('admin/edit/roles/{id}', 'AdminEditRoles')->name('admin.edit.roles');
        Route::post('admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::get('admin/delete/roles/{id}', 'AdminDeleteRoles')->name('admin.delete.roles');
        
    });

    Route::prefix('inventory')->group(function () {
        // Inventory routes
        Route::get('/manage', [InventoryController::class, 'manageInventory'])->name('admin.inventory.manage');
        Route::get('/add', [InventoryController::class, 'addInventoryItem'])->name('admin.inventory.add');
        Route::post('/store', [InventoryController::class, 'storeInventoryItem'])->name('admin.inventory.store');
        Route::get('/edit/{id}', [InventoryController::class, 'editInventoryItem'])->name('admin.inventory.edit');
        Route::put('/update/{id}', [InventoryController::class, 'updateInventoryItem'])->name('admin.inventory.update');
        Route::get('/view/{id}', [InventoryController::class, 'viewInventoryItem'])->name('admin.inventory.view');
        Route::delete('/delete/{id}', [InventoryController::class, 'deleteInventoryItem'])->name('admin.inventory.delete');
        Route::get('/deleted-items', [InventoryController::class, 'showDeletedItems'])->name('admin.inventory.deleted-items');
        Route::get('/restore/{id}', [InventoryController::class, 'restoreInventoryItem'])->name('admin.inventory.restore');
        Route::get('/force-delete/{id}', [InventoryController::class, 'forceDeleteInventoryItem'])->name('admin.inventory.force-delete');
        
    });

    Route::controller(AdminController::class)->group(function(){
        Route::get('/all/staff', 'AllStaff')->name('all.staff'); 
        Route::get('/add/staff', 'AddStaff')->name('add.staff'); 
        Route::post('/store/staff', 'StoreStaff')->name('store.staff'); 
        Route::get('/edit/staff/{id}', 'EditStaff')->name('edit.staff');
        Route::post('/update/staff', 'UpdateStaff')->name('update.staff');
        Route::get('/delete/staff/{id}', 'DeleteStaff')->name('delete.staff');
        Route::get('/changeStatus', 'changeStatus');

    });

    // Blog Category All Route 
    Route::controller(BlogController::class)->group(function(){

        Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category'); 
        Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');  
        Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category'); 
        Route::get('/blog/category/{id}', 'EditBlogCategory');
        Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');  

    });

    // Blog Post All Route 
    Route::controller(BlogController::class)->group(function(){

        Route::get('/all/post', 'AllPost')->name('all.post'); 
        Route::get('/add/post', 'AddPost')->name('add.post');
        Route::post('/store/post', 'StorePost')->name('store.post'); 
        Route::get('/edit/post/{id}', 'EditPost')->name('edit.post');
        Route::post('/update/post', 'UpdatePost')->name('update.post');
        Route::get('/delete/post/{id}', 'DeletePost')->name('delete.post');  
   
   });

    // SMTP Setting  All Route 
    Route::controller(SettingController::class)->group(function(){

        Route::get('/smtp/setting', 'SmtpSetting')->name('smtp.setting');
        Route::post('/update/smpt/setting', 'UpdateSmtpSetting')->name('update.smpt.setting'); 


    });

     // Site Setting  All Route 
    Route::controller(SettingController::class)->group(function(){

        Route::get('/site/setting', 'SiteSetting')->name('site.setting');
        Route::post('/update/site/setting', 'UpdateSiteSetting')->name('update.site.setting');  

    });



    // Property Type All Route 
    Route::controller(PropertyTypeController::class)->group(function(){

        Route::get('/all/type', 'AllType')->name('all.type'); 
        Route::get('/add/type', 'AddType')->name('add.type');
        Route::post('/store/type', 'StoreType')->name('store.type'); 
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type');
        Route::post('/update/type', 'UpdateType')->name('update.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');  
   
   });



   Route::post('/inventory/upload', [InventoryController::class, 'handleFileUpload'])->name('admin.inventory.upload');
    Route::get('/audit-trail', [AuditTrailController::class, 'viewAuditTrail'])->name('admin.audit-trail.show');
});  // End Group Admin Middleware



Route::get('/client/add-medical-record/{id}', [HealthEvaluationController::class, 'addMedicalRecord'])->name('add-medical-record');
Route::post('/client/store-medical-record/{id}', [HealthEvaluationController::class, 'storeMedicalRecord'])->name('store-medical-record');
Route::get('/client/medical-info/{id}', [HealthEvaluationController::class, 'displayMedicalInfo'])->name('display-medical-info');
Route::get('/client/med-history/{id}', [HealthEvaluationController::class, 'displayMedHistory'])->name('display-med-history');


Route::get('/search', [SearchController::class, 'index'])->name('search.index');

Route::post('/appointment', [AppointmentController::class, 'appointment']);
Route::get('admin/approved/{id}', [AdminController::class, 'approvedAppointments'])->name('appointments.approve');
Route::get('admin/rejected/{id}', [AdminController::class, 'rejectedAppointments'])->name('appointments.reject');
Route::get('appointments/approved/{id}', [AppointmentController::class, 'approvedAppointments'])->name('appointments.approved');


Route::get('admin/showappointment', [AdminController::class, 'showAppointments'])->name('admin.appointments');
Route::get('/admin/appointments/approve/{id}', [AdminController::class, 'approvedAppointments'])->name('admin.appointments.approve');
Route::get('/admin/appointments/approved', [AdminController::class, 'approvedAppointmentsView'])->name('admin.appointments.approved');

Route::get('/appointments/rejected', [AdminController::class, 'rejectedAppointments'])->name('appointments.rejected');


Route::get('emailview/{id}', [AdminController::class, 'emailView']);
Route::post('/sendemail/{id}', [AdminController::class, 'sendemail']);


 /// Staff Group Middleware 
Route::middleware(['auth','role:staff'])->group(function(){

    Route::get('/staff/dashboard', [StaffController::class, 'StaffDashboard'])->name('staff.dashboard');
    Route::get('/staff/logout', [StaffController::class, 'StaffLogout'])->name('staff.logout');
    Route::get('/staff/profile', [StaffController::class, 'StaffProfile'])->name('staff.profile');
    Route::post('/staff/profile/store', [StaffController::class, 'StaffProfileStore'])->name('staff.profile.store');

    Route::get('/staff/change/password', [StaffController::class, 'StaffChangePassword'])->name('staff.change.password');
    Route::post('/staff/update/password', [StaffController::class, 'StaffUpdatePassword'])->name('staff.update.password');

          // Staff All Property  
    Route::controller(StaffScheduleController::class)->group(function(){

        // Schedule Request Route 
        Route::get('/staff/schedule/request/', 'StaffScheduleRequest')->name('staff.schedule.request');
        Route::get('/staff/details/schedule/{id}', 'StaffDetailsSchedule')->name('staff.details.schedule');
        Route::post('/staff/update/schedule/', 'StaffUpdateSchedule')->name('staff.update.schedule');

 
    });

           // Routes for ClientController
           Route::get('/add/client', [StaffClientController::class, 'addClient'])->name('staff.add.client');
           Route::post('/store/client', [StaffClientController::class, 'storeClient'])->name('staff.store.client');
           Route::get('/client-directory', [StaffClientController::class, 'viewClientList'])->name('staff.client.directory');;
           Route::get('/filter-clients', [StaffClientController::class, 'filterClientsStaff'])->name('filter-clients-staff');
           Route::get('/client/{id}', [StaffClientController::class, 'viewClientPersonalInfo'])->name('staff.view.client.personal');
   
          // Client profile routes
           Route::get('/client/edit/{id}', [StaffClientController::class, 'editClientProfile'])->name('staff-edit-client');
           Route::put('/update-client/{id}', [StaffClientController::class, 'updateClientProfile'])->name('staff-update-client-profile');
           Route::get('/client/view/{encrypted_id}', [StaffClientController::class, 'viewClientProfile'])->name('staff-view-client-profile');
   
           Route::get('/client/personal-info/{id}', [StaffClientController::class, 'viewClientPersonalInfo'])->name('staff-view-client-personal-info');
           Route::get('/client/personal-info/edit/{id}', [StaffClientController::class, 'editClientPersonalInfo'])->name('staff-edit-client-personal-info');
            Route::put('/client/personal-info/update/{id}', [StaffClientController::class, 'updateClientPersonalInfo'])->name('staff-update-client-personal-info');
   
   
           Route::get('staff/manage-client-directory', [StaffClientController::class, 'manageClientList'])->name('staff-manage-client-directory');
           Route::get('/delete-client/{encrypted_id}', [StaffClientController::class, 'deleteClient'])->name('staff-delete-client');
           Route::get('staff/deleted-clients', [StaffClientController::class, 'showDeletedClients'])->name('staff-deleted-clients');
           Route::get('/restore-client/{encrypted_id}', [StaffClientController::class, 'restoreClient'])->name('staff-restore-client');
           Route::get('/filter-deleted-clients', [StaffClientController::class, 'filterDeletedClients'])->name('staff-filter-deleted-clients');
   
           // Staff Add Assessment Record Form
           Route::get('/client/add-assessment-record/{id}', [StaffClientController::class, 'addAssessmentRecord'])->name('staff-add-assessment-record');
           Route::post('/client/store-assessment-record/{id}', [StaffClientController::class, 'storeAssessmentRecord'])->name('staff-store-assessment-record');
           Route::get('/client/assessment/{id}', [StaffClientController::class, 'viewIndividualAssessment'])->name('staff-view-individual-assessment');
           Route::get('staff/assessment-directory', [StaffClientController::class, 'viewAssessmentRecordList'])->name('staff-assessment-directory');
           Route::get('/filter-assessment-records', [StaffClientController::class, 'filterAssessmentRecords'])->name('staff-filter-assessment-records');
           Route::get('staff/deleted-assessments', [StaffClientController::class, 'showDeletedAssessmentRecords'])->name('staff-deleted-assessments');
           Route::get('/delete-assessment/{id}', [StaffClientController::class, 'deleteAssessment'])->name('staff-delete-assessment');
           Route::post('/restore-assessment-record/{id}', [StaffClientController::class, 'restoreAssessmentRecord'])->name('staff-restore-assessment-record');
           Route::get('staff/manage-assessments', [StaffClientController::class, 'manageAssessmentList'])->name('staff-manage-assessments');
   
            // Route for viewing medical records profile
           Route::get('/client/view-assessments/{id}', [StaffClientController::class, 'viewClientAssessments'])->name('staff-view-client-assessments');
           Route::get('/client/health-evaluation/{id}', [StaffClientController::class, 'viewHealthEvaluation'])->name('staff-view-health-evaluation');
           Route::get('/client/latest-assessment/{id}', [StaffClientController::class, 'viewLatestAssessment'])->name('staff-view-latest-assessment');
           Route::get('/client/med-info/{id}', [StaffClientController::class, 'viewMedInfo'])->name('staff-view-med-info');



}); // End Group Staff Middleware



    //FRONT-END ROUTES
 // Blog Details Route 
Route::get('/blog/details/{slug}', [BlogController::class, 'BlogDetails']);
Route::get('/blog/cat/list/{id}', [BlogController::class, 'BlogCatList']);
Route::get('/blog', [BlogController::class, 'BlogList'])->name('blog.list');
Route::post('/store/comment', [BlogController::class, 'StoreComment'])->name('store.comment');
Route::get('/admin/blog/comment', [BlogController::class, 'AdminBlogComment'])->name('admin.blog.comment');

Route::get('/admin/comment/reply/{id}', [BlogController::class, 'AdminCommentReply'])->name('admin.comment.reply');
Route::post('/reply/message', [BlogController::class, 'ReplyMessage'])->name('reply.message');



// Staff Details Page in Frontend 
Route::get('/staff/details/{id}', [IndexController::class, 'StaffDetails'])->name('staff.details');

// Schedule Message Request Route 
Route::get('/schedule', [IndexController::class, 'Schedule'])->name('schedule');
Route::post('/store/schedule', [IndexController::class, 'StoreSchedule'])->name('store.schedule');


// Chat Post Request Route 
Route::post('/send-message', [ChatController::class, 'SendMsg'])->name('send.msg');
Route::get('/user-all', [ChatController::class, 'GetAllUsers']);

Route::get('/user-message/{id}', [ChatController::class, 'UserMsgById']);
Route::get('/staff/live/chat', [ChatController::class, 'StaffLiveChat'])->name('staff.live.chat');

Route::get('/about', [HomeController::class, 'about']);