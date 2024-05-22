<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ItemsController;

Route::get('/', function () {
    return view('home');
});

// مسارات تسجيل الدخول
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'customLogin'])->name('login.custom');

// مسارات التسجيل والخروج
Route::get('register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('register', [CustomAuthController::class, 'customRegistration'])->name('customRegistration');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


// مسارات الصفحات
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [ItemsController::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('admin/create-employee', [ItemsController::class, 'createEmployee'])->name('admin.createEmployee');
    Route::get('show-employees', [ItemsController::class, 'showEmployees'])->name('showEmployees');
    Route::post('/delete-employee', [ItemsController::class, 'delete'])->name('deleteEmployee');
   // Route::get('admin/dashboard',[CustomAuthController::class, 'afiche'])->name('adminDashboard');
    
   Route::get('/adminDashboard', [ItemsController::class, 'adminDashboard'])->name('adminDashboard');
       Route::post('/importExcel', [ItemsController::class, 'importExcel'])->name('importExcel');
    Route::post('/deleteExcel', [ItemsController::class, 'deleteExcel'])->name('deleteExcel');

    Route::post('/importExcel2', [ItemsController::class, 'importExcel2'])->name('importExcel2');
    Route::post('/deleteExcel2', [ItemsController::class, 'deleteExcel2'])->name('deleteExcel2'); 

    Route::post('/importExcel3', [ItemsController::class, 'importExcel3'])->name('importExcel3');
    Route::post('/deleteExcel3', [ItemsController::class, 'deleteExcel3'])->name('deleteExcel3'); 
  
    Route::post('/importExcel4', [ItemsController::class, 'importExcel4'])->name('importExcel4');
    Route::post('/deleteExcel4', [ItemsController::class, 'deleteExcel4'])->name('deleteExcel4'); 

    Route::post('/importExcel5', [ItemsController::class, 'importExcel5'])->name('importExcel5');
    Route::post('/deleteExcel5', [ItemsController::class, 'deleteExcel5'])->name('deleteExcel5'); 

    
    Route::post('/importExcel6', [ItemsController::class, 'importExcel6'])->name('importExcel6');
    Route::post('/deleteExcel6', [ItemsController::class, 'deleteExcel6'])->name('deleteExcel6');
    
    Route::post('/importExcel7', [ItemsController::class, 'importExcel7'])->name('importExcel7');
    Route::post('/deleteExcel7', [ItemsController::class, 'deleteExcel7'])->name('deleteExcel7');

    Route::post('/importExcel8', [ItemsController::class, 'importExcel8'])->name('importExcel8');
    Route::post('/deleteExcel8', [ItemsController::class, 'deleteExcel8'])->name('deleteExcel8');

    Route::post('/importExcel9', [ItemsController::class, 'importExcel9'])->name('importExcel9');
    Route::post('/deleteExcel9', [ItemsController::class, 'deleteExcel9'])->name('deleteExcel9');

    Route::post('/importExcel10', [ItemsController::class, 'importExcel10'])->name('importExcel10');
    Route::post('/deleteExcel10', [ItemsController::class, 'deleteExcel10'])->name('deleteExcel10');

    Route::post('/importExcel12', [ItemsController::class, 'importExcel12'])->name('importExcel12');
    Route::post('/deleteExcel12', [ItemsController::class, 'deleteExcel12'])->name('deleteExcel12');

    Route::post('/importExcel11', [ItemsController::class, 'importExcel11'])->name('importExcel11');
    Route::post('/deleteExcel11', [ItemsController::class, 'deleteExcel11'])->name('deleteExcel11');

    Route::post('/importExcel13', [ItemsController::class, 'importExcel13'])->name('importExcel13');
    Route::post('/deleteExcel13', [ItemsController::class, 'deleteExcel13'])->name('deleteExcel13');
});

// مسارات للـ employee
Route::middleware(['auth', 'role:employee'])->group(function () {
    Route::get('employee/dashboard', [ItemsController::class, 'employeeDashboard'])->name('employeeDashboard');
   


});
Route::get('/page1', [ItemsController::class, 'showpage1'])->name('page1');
Route::get('/searchp1', [ItemsController::class, 'searchp1'])->name('searchp1');

Route::get('/page2', [ItemsController::class, 'showpage2'])->name('page2');
Route::get('/searchp2', [ItemsController::class, 'searchp2'])->name('searchp2');

Route::get('/page3', [ItemsController::class, 'showpage3'])->name('page3');
Route::get('/searchp3', [ItemsController::class, 'searchp3'])->name('searchp3');

Route::get('/page4', [ItemsController::class, 'showpage4'])->name('page4');
Route::get('/searchp4', [ItemsController::class, 'searchp4'])->name('searchp4');

Route::get('/page5', [ItemsController::class, 'showpage5'])->name('page5');
Route::get('/searchp5', [ItemsController::class, 'searchp5'])->name('searchp5');

Route::get('/page6', [ItemsController::class, 'showpage6'])->name('page6');
Route::get('/searchp6', [ItemsController::class, 'searchp6'])->name('searchp6');

Route::get('/page7', [ItemsController::class, 'showpage7'])->name('page7');
Route::get('/searchp7', [ItemsController::class, 'searchp7'])->name('searchp7');

Route::get('/page8', [ItemsController::class, 'showpage8'])->name('page8');
Route::get('/searchp8', [ItemsController::class, 'searchp8'])->name('searchp8');

Route::get('/page9', [ItemsController::class, 'showpage9'])->name('page9');
Route::get('/searchp9', [ItemsController::class, 'searchp9'])->name('searchp9');

Route::get('/page10', [ItemsController::class, 'showpage10'])->name('page10');
Route::get('/searchp10', [ItemsController::class, 'searchp10'])->name('searchp10');

Route::get('/page11', [ItemsController::class, 'showpage11'])->name('page11');
Route::get('/searchp11', [ItemsController::class, 'searchp11'])->name('searchp11');

Route::get('/page12', [ItemsController::class, 'showpage12'])->name('page12');
Route::get('/searchp12', [ItemsController::class, 'searchp12'])->name('searchp12');

Route::get('/page13', [ItemsController::class, 'showpage13'])->name('page13');
Route::get('/searchp13', [ItemsController::class, 'searchp13'])->name('searchp13');


