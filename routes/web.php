<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\yearbookController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\StaffManagementController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ColumnController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\DeptMemoriesController;
use App\Http\Controllers\GradShotsController;

Route::get('/', function () {
    return view('yearbook_pages.alumni_pages.alumni_index');
});

Route::middleware(['web'])->group(function () {
    Route::controller(RouteController::class)->group(function () {
        Route::get('/admin-login', 'AdminLogin')->name('admin-login');
        Route::get('/dashboard', 'dashboardBlade')->name('dashboard');
        // Route::get('/alumni', 'alumniBlade')->name('alumni');
        Route::get('/template', 'templateBlade')->name('template');
        Route::get('/reports', 'reportBlade')->name('reports');
        Route::get('/records', 'recordsBlade')->name('records');
        Route::get('/chat', 'chatBlade')->name('chat');
        Route::get('/home', 'staffHomeBlade')->name('staff_home');
        Route::get('/yearbook', 'yearbookBlade')->name('yearbook');
        Route::get('/password', 'passwordBlade')->name('change_pass');
        Route::get('/profile', 'profileBlade')->name('profile');
        // Route::get('/content', 'contentBladeView')->name('contents');
        //  Route::post('/content', 'contentBladeSearch')->name('contents');

        Route::match(['get', 'post'], '/yearbook', 'contentBlade')->name('contents');
        Route::get('/user_profile', 'userProfileBlade')->name('user.profile');
        Route::get('/template/view', 'viewTemplate')->name('template.view');
        Route::get('/batch', 'batchBlade')->name('batch');
        Route::get('/department', 'departmentBlade')->name('department');
        Route::get('/program', 'programBlade')->name('program');
        Route::get('/message', 'messagesBlade')->name('message');
        Route::get('/official', 'officialsBlade')->name('official');
        Route::get('/memories', 'memoriesBlade')->name('memories');
        Route::get('/gradshots', 'gradshotsBlade')->name('gradshots');
        Route::get('/staffprofile', 'staffprofileBlade')->name('staffprofile');
        Route::get('/alumniprofile', 'alumniprofileBlade')->name('alumniprofile');
        Route::get('/changepassword', 'staffchangepassBlade')->name('staffchangepass');
        Route::get('/alumnichangepassword', 'alumnichangepassBlade')->name('alumnichangepass');
        Route::get('/add-content', 'addContent')->name('yearbookcontent');
        Route::get('/alumni_home', 'alumniHomeBlade')->name('alumni_home');
        Route::get('/adminprofile', 'adminprofileBlade')->name('adminpofile');
        Route::get('/staffhome', 'staffhomeBlade')->name('staff_home');

    

     
        
    });
});

Route::resource('staff', StaffController::class)->names([
    'index' => 'staff.index',
    'create' => 'staff.create',
    'store' => 'staff.store',
    'show' => 'admin.staff.show',
    'edit' => 'admin.staff.edit',
    'update' => 'staff.update',
    'destroy' => 'admin.staff.destroy',
]);

Route::resource('alumni', AlumniController::class)->names([
    // 'index' => 'alumni.index',
    'create' => 'alumni.create',
    'store' => 'alumni.store',
    'show' => 'admin.alumni.show',
    'edit' => 'admin.alumni.edit',
    'update' => 'alumni.update',
    'destroy' => 'admin.alumni.destroy',
]);
Route::get('alumni/form/add-attribute', [AlumniController::class, 'index'])->name('alumni.add.form-attribute');
Route::get('alumni/form/add-attribute', [ColumnController::class, 'columnDisplay'])->name('alumni.add.form-attribute');

Route::resource('template', TemplateController::class)->names([
    'index' => 'template.index',
    'create' => 'template.create',
    'store' => 'template.store',
    'show' => 'admin.template.show',
    'edit' => 'admin.template.edit',
    'update' => 'template.update',
    'destroy' => 'admin.template.destroy',
]);

Route::resource('batch', BatchController::class)->names([
    'index' => 'batch.index',
    'create' => 'batch.create',
    'store' => 'batch.store',
    'show' => 'admin.batch.show',
    'edit' => 'admin.batch.edit',
    'update' => 'batch.update',
    'destroy' => 'admin.batch.destroy',
]);

Route::resource('department', DepartmentController::class)->names([
    'index' => 'department.index',
    'create' => 'department.create',
    'store' => 'department.store',
    'show' => 'admin.department.show',
    'edit' => 'admin.department.edit',
    'update' => 'department.update',
    'destroy' => 'admin.department.destroy',
]);

Route::resource('program', ProgramController::class)->names([
    'index' => 'program.index',
    'create' => 'program.create',
    'store' => 'program.store',
    'show' => 'admin.program.show',
    'edit' => 'admin.program.edit',
    'update' => 'program.update',
    'destroy' => 'admin.program.destroy',
]);

Route::resource('message', MessageController::class)->names([
    'index' => 'message.index',
    'create' => 'message.create',
    'store' => 'message.store',
    'show' => 'admin.message.show',
    'edit' => 'admin.message.edit',
    'update' => 'message.update',
    'destroy' => 'admin.message.destroy',
]);

Route::resource('official', OfficialController::class)->names([
    'index' => 'official.index',
    'create' => 'official.create',
    'store' => 'official.store',
    'show' => 'admin.official.show',
    'edit' => 'admin.official.edit',
    'update' => 'official.update',
    'destroy' => 'admin.official.destroy',
]);

Route::resource('deptMemories', DeptMemoriesController::class)->names([
    'index' => 'deptMemories.index',
    'create' => 'deptMemories.create',
    'store' => 'deptMemories.store',
    'show' => 'admin.deptMemories.show',
    'edit' => 'admin.deptMemories.edit',
    'update' => 'deptMemories.update',
    'destroy' => 'admin.deptMemories.destroy',
]);

Route::resource('yearbookcontent', ContentController::class)->names([
    'index' => 'yearbookcontent.index',
    'create' => 'yearbookcontent.create',
    'store' => 'yearbookcontent.store',
    'show' => 'admin.yearbookcontent.show',
    'edit' => 'admin.yearbookcontent.edit',
    'update' => 'yearbookcontent.update',
    'destroy' => 'admin.yearbookcontent.destroy',
]);

Route::resource('gradshots', GradShotsController::class)->names([
    'index' => 'gradshots.index',
    'create' => 'gradshots.create',
    'store' => 'gradshots.store',
    'show' => 'admin.gradshots.show',
    'edit' => 'admin.gradshots.edit',
    'update' => 'gradshots.update',
    'destroy' => 'admin.gradshots.destroy',
]);
Route::get('fetchStaff', [StaffController::class, 'fetchStaff'])->name('staff.fetch_staff');

Route::get('fetchAlumni', [AlumniController::class, 'fetchAlumni'])->name('alumni.fetch_alumni');

Route::get('getAlumniLastID', [AlumniController::class, 'getLastAlumniId'])->name('alumni.getLastID');

Route::get('fetch-template', [TemplateController::class, 'fetchTemplate'])->name('template.fetch_template');

Route::get('fetch-templates', [TemplateController::class, 'viewEditTemplates']);

Route::get('fetchBatch', [BatchController::class, 'fetchBatch'])->name('batch.fetch_batch');

Route::get('fetchContent', [ContentController::class, 'fetchContent'])->name('content.fetch_content');

Route::get('fetchDepartment', [DepartmentController::class, 'fetchDepartment'])->name('department.fetch_department');

Route::get('fetchProgram', [ProgramController::class, 'fetchProgram'])->name('program.fetch_program');

Route::get('fetchMessage', [MessageController::class, 'fetchMessage'])->name('message.fetch_message');

Route::get('fetchOfficial', [OfficialController::class, 'fetchOfficial'])->name('official.fetch_official');

Route::get('fetchDeptMemories', [DeptMemoriesController::class, 'fetchDeptMemories'])->name('deptMemories.fetch_deptMemories');

Route::get('fetchGradShots', [GradShotsController::class, 'fetchGradShots'])->name('gradshots.fetch_gradshots');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/fetch-last-dept-id', [DepartmentController::class, 'fetchDept1'])->name('fetchLastDeptId');

Route::get('/fetch-last-mess-id', [MessageController::class, 'fetchMess1'])->name('fetchLastMessId');

Route::get('/fetch-last-off-id', [OfficialController::class, 'fetchOff1'])->name('fetchLastOffId');

Route::get('/fetch-last-prog-id', [ProgramController::class, 'fetchProg1'])->name('fetchLastProgId');

Route::get('/fetch-last-batch-id', [BatchController::class, 'fetchBatch1'])->name('fetchLastBatchId');

Route::get('/fetch-last-staff-id', [StaffController::class, 'fetchStaff1'])->name('fetchLastStaffId');

Route::get('/fetch-last-alumni-id', [AlumniController::class, 'getLastAlumniId'])->name('alumni.getLastID');

Route::get('/fetch-last-deptmemo-id', [DeptMemoriesController::class, 'fetchDeptMemo1'])->name('fetchLastDeptMemoId');

Route::get('/fetch-last-gradshot-id', [GradShotsController::class, 'fetchGradShot1'])->name('fetchLastGradShotId');

Route::get('/fetch-data/{id}', [ContentController::class, 'fetchDataContent']);
Route::get('/fetch-data-department/{department_id}', [ContentController::class, 'fetchDataContent_department']);



Route::get('/assets/upload_image/{filename}', [StaffController::class, 'UserImage'])->name('get.user.image');



Route::get('/add-column', [ColumnController::class, 'columnDisplay']);
Route::post('/add-column', [ColumnController::class, 'addColumn'])->name('add-column-users');
