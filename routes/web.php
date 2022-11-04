<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsOverviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dossier', [App\Http\Controllers\DossierController::class, 'index'])->name('dossier');
Route::post('/dossier', [App\Http\Controllers\DossierController::class, 'update'])->name('dossier');
Route::get('/studentenoverzicht', [App\Http\Controllers\StudentsOverviewController::class, 'index'])->name('studentenoverzicht');
Route::get('/studentoverzicht', [App\Http\Controllers\StudentOverviewController::class, 'index'])->name('studentoverzicht');
Route::post('/studentoverzicht', [App\Http\Controllers\StudentOverviewController::class, 'detail'])->name('studentoverzicht');
Route::get('/hour', [App\Http\Controllers\HourController::class, 'index'])->name('hour');
Route::post('/hour', [App\Http\Controllers\HourController::class,'insert'])->name('hour');
Route::get('/companiesoverview', [App\Http\Controllers\CompaniesOverviewController::class, 'index'])->name('companiesoverview');
Route::get('/companiesoverview/{companyid}', [App\Http\Controllers\CompaniesOverviewController::class, 'store'])->name('companiesoverview');
//Route::get('/companyoverview', [App\Http\Controllers\CompanyOverviewController::class, 'index'])->name('companyoverview');
Route::post('/companyoverview', [App\Http\Controllers\CompanyOverviewController::class, 'detail'])->name('companyoverview');
Route::get('/register', [App\Http\Controllers\MainRegisterController::class, 'index'])->name('register');
Route::post('/register', [App\Http\Controllers\MainRegisterController::class, 'store'])->name('register');
Route::get('/docentregister', [App\Http\Controllers\TeacherRegisterController::class, 'index'])->name('docentregister');
Route::post('/docentregister', [App\Http\Controllers\TeacherRegisterController::class, 'store'])->name('docentregister');
Route::get('/companyregister', [App\Http\Controllers\CompanyRegisterController::class, 'index'])->name('companyregister');
Route::post('/companyregister', [App\Http\Controllers\CompanyRegisterController::class, 'store'])->name('companyregister');
Route::get('/coach', [App\Http\Controllers\CoachController::class, 'index'])->name('coach');
Route::post('/coach', [App\Http\Controllers\CoachController::class, 'insert'])->name('coach');
Route::get('/companyprofile', [App\Http\Controllers\CompanyProfileController::class, 'index'])->name('companyprofile');
Route::post('/companyprofile', [App\Http\Controllers\CompanyProfileController::class, 'update'])->name('companyprofile');
Route::get('/design', [App\Http\Controllers\DesignController::class, 'index'])->name('design');
Route::get('/coretask', [App\Http\Controllers\CoreTaskController::class, 'index'])->name('coretask');
Route::post('/coretask', [App\Http\Controllers\CoreTaskController::class, 'store'])->name('coretask');
Route::get('/workproces', [App\Http\Controllers\WorkProcessController::class, 'index'])->name('workproces');
Route::post('/workproces', [App\Http\Controllers\WorkProcessController::class, 'store'])->name('workproces');
Route::get('/competence', [App\Http\Controllers\CompetenceController::class, 'index'])->name('competence');
Route::post('/competence', [App\Http\Controllers\CompetenceController::class, 'store'])->name('competence');
Route::get('/usercoretask', [App\Http\Controllers\UserCoreTaskController::class, 'index'])->name('usercoretask');
Route::post('/usercoretask', [App\Http\Controllers\UserCoreTaskController::class, 'store'])->name('usercoretask');
Route::get('/userworkproces', [App\Http\Controllers\UserWorkProcessController::class, 'index'])->name('userworkproces');
Route::post('/userworkproces', [App\Http\Controllers\UserWorkProcessController::class, 'store'])->name('userworkproces');
Route::get('/usercompetence', [App\Http\Controllers\UserCompetenceController::class, 'index'])->name('usercompetence');
Route::post('/usercompetence', [App\Http\Controllers\UserCompetenceController::class, 'store'])->name('usercompetence');
Route::get('/coreworkprocess', [App\Http\Controllers\CoreWorkProcessController::class, 'index'])->name('coreworkprocess');
Route::post('/coreworkprocess', [App\Http\Controllers\CoreWorkProcessController::class, 'store'])->name('coreworkprocess');
Route::get('/workcompetence', [App\Http\Controllers\WorkCompetenceController::class, 'index'])->name('workcompetence');
Route::post('/workcompetence', [App\Http\Controllers\WorkCompetenceController::class, 'store'])->name('workcompetence');
Route::get('/coretaskoverview', [App\Http\Controllers\CoreTaskOverviewController::class, 'index'])->name('coretaskoverview');
Route::get('/coretaskdone/{id}', [App\Http\Controllers\CoreTaskOverviewController::class, 'done'])->name('coretaskoverview');
Route::get('/coretaskundone/{id}', [App\Http\Controllers\CoreTaskOverviewController::class, 'undone'])->name('coretaskoverview');
Route::get('/workprocessdone/{id}/{pageid}', [App\Http\Controllers\WorkProcessOverviewController::class, 'done'])->name('workprocessoverview');
Route::get('/workprocessundone/{id}/{pageid}', [App\Http\Controllers\WorkProcessOverviewController::class, 'undone'])->name('workprocessoverview');
Route::get('/workprocessoverview/{id}', [App\Http\Controllers\WorkProcessOverviewController::class, 'index'])->name('workprocessoverview');
Route::get('/competencedone/{id}/{pageid}', [App\Http\Controllers\CompetenceOverviewController::class, 'done'])->name('competenceoverview');
Route::get('/competenceundone/{id}/{pageid}', [App\Http\Controllers\CompetenceOverviewController::class, 'undone'])->name('competenceoverview');
Route::get('/competenceoverview/{id}', [App\Http\Controllers\CompetenceOverviewController::class, 'index'])->name('competenceoverview');
Route::get('/studentcoretaskoverview', [App\Http\Controllers\StudentCoreTaskOverviewController::class, 'index'])->name('studentcoretaskoverview');
Route::get('/studentworkprocessoverview/{id}', [App\Http\Controllers\StudentWorkProcessOverviewController::class, 'index'])->name('studentworkprocessoverview');
Route::get('/studentcompetenceoverview/{id}', [App\Http\Controllers\StudentCompetenceOverviewController::class, 'index'])->name('studentcompetenceoverview');
Route::get('/internship', [App\Http\Controllers\InternshipController::class, 'index'])->name('internship');
Route::get('/internship/{id}', [App\Http\Controllers\InternshipController::class, 'store'])->name('internship');
Route::get('/internshipoverview', [App\Http\Controllers\InternshipOverviewController::class, 'index'])->name('internshipoverview');
Route::get('/internshipoverview/{id}', [App\Http\Controllers\InternshipOverviewController::class, 'store'])->name('internshipoverview');
