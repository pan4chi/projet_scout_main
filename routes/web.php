<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\RegionController;

Route::get('/', function () {
    return view('welcome');
});



route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
route::post('/login', [LoginController::class, 'login']);
route::post('/logout', [LoginController::class, 'logout'])->name('logout');


use App\Http\Controllers\SuperAdmin;

Route::middleware(['auth'])->group(function () {
    Route::get('/superAdmin', [SuperAdmin::class, 'index'])->name('superAdmin');
});

// project

use App\Http\Controllers\MembreController;

route::get('super_Admin' , function ()  {
    return view('admins.super_admin.index');
});
route::get('super_admin/member' ,[MembreController::class , 'index'])->name('members_super.list');
route::get('super_admin/create' ,[MembreController::class , 'create'])->name('members_super.create');
route::post('super_admin/store' ,[MembreController::class , 'store'])->name('members_super.store');



route::post('super_Admin/AllMember/store' ,[SuperAdmin::class , 'store'])->name('members_super.store');
route::get('super_Admin/AllMember/show/{id}' ,[SuperAdmin::class , 'show'])->name('members_super.show');
route::get('super_Admin/AllMember/edit/{id}' ,[SuperAdmin::class , 'edit'])->name('members_super.edit');
Route::put('super_Admin/AllMember/update/{id}', [SuperAdmin::class , 'update'])->name('members_super.update');
route::delete('super_Admin/AllMember/{id}' ,[SuperAdmin::class , 'destroy'])->name('members_super.destroy');
route::post('super_Admin/delleteAll' ,[SuperAdmin::class , 'destroyAll'])->name('delete_All_member_super');


// Region
route::get('Region' , function ()  {
    return view('admins.Region.index');
});
use App\Http\Controllers\Region;
route::get('Region/AllMember' ,[Region::class , 'index'])->name('Region.list');
route::get('Region/AllMember/create' ,[Region::class , 'create'])->name('Region.create');
route::post('Region/AllMember/store' ,[Region::class , 'store'])->name('Region.store');
route::get('Region/AllMember/show/{id}' ,[Region::class , 'show'])->name('Region.show');
route::get('Region/AllMember/edit/{id}' ,[Region::class , 'edit'])->name('Region.edit');
Route::put('Region/AllMember/update/{id}', [Region::class , 'update'])->name('Region.update');
route::get('Region/AllMember/destroy/{id}' ,[Region::class , 'destroy'])->name('Region.destroy');


Route::fallback(function() {
    return view('404'); 
 });


 use App\Http\Controllers\ActivityController;

 Route::prefix('admins')->group(function () {
     Route::prefix('activite')->group(function () {
        
         Route::get('/index', [ActivityController::class, 'index'])->name('activities.index');
         // Route pour afficher le formulaire d'ajout d'une activité
         Route::get('/create', [ActivityController::class, 'create'])->name('activities.create');
 
         // Route pour enregistrer une nouvelle activité
         Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
 
         // Route pour afficher le formulaire de modification d'une activité
         Route::get('/{activity}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
 
         // Route pour mettre à jour une activité existante
         Route::put('/{activity}', [ActivityController::class, 'update'])->name('activities.update');

         Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');


         Route::delete('/activities/{activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');
         
     });
 });
 
Route::get('filiere/{filiere}/membres', 'FiliereController@members')->name('filiere.membres');
Route::get('filiere/{filiere}/membres', [FiliereController::class, 'members'])->name('filiere.membres');
route::get('filiere/store', [App\Http\Controllers\FiliereController::class, 'store'])->name('filiere.store');
route::post('filiere/store', [App\Http\Controllers\FiliereController::class, 'store'])->name('filiere.store');
route::get('filiere/create', [App\Http\Controllers\FiliereController::class, 'createFiliere'])->name('filiere.createFiliere');
Route::get('admins/Region/index', [RegionController::class, 'index'])->name('Region.index');
Route::get('/region/{region_id}', [RegionController::class, 'show'])->name('region.show');

// Route pour afficher un membre spécifique
Route::get('/members/{member}', [MembreController::class, 'show'])->name('members.show');

// Route pour afficher le formulaire de modification d'un membre
Route::get('/members/{member}/edit', [MembreController::class, 'edit'])->name('members.edit');

// Route pour supprimer un membre
Route::delete('/members/{member}', [MembreController::class, 'destroy'])->name('members.destroy');

use App\Http\Controllers\StatisticsController ;
Route::get('/admins/statistics/index', [StatisticsController::class, 'index'])->name('statistics.index');

// routes/web.php

use App\Http\Controllers\AdminRegionController;

route::get('/Region/indexfiliere', [AdminRegionController::class, 'index'])->name('adminregion.indexfiliere');
route::get('Region/indexfiliere', [AdminRegionController::class, 'index'])->name('adminregion.membre');




Route::group(['middleware' => 'auth'], function () {
    Route::get('/Region/indexfiliere', [AdminRegionController::class, 'index'])->name('region.index');
    Route::post('/Region/addfiliere', [AdminRegionController::class, 'addFiliere'])->name('region.addfiliere');
    Route::get('/Region/members', [AdminRegionController::class, 'showMembers'])->name('region.members');
    Route::post('/Region/addmember', [AdminRegionController::class, 'addMember'])->name('region.addmember');
    Route::get('/Region/statistics', [AdminRegionController::class, 'showStatistics'])->name('region.statistics');
    Route::get('/Region/addmember', [AdminRegionController::class, 'createMemberForm'])->name('create_member_form');
    Route::get('/Region/addfiliere', [AdminRegionController::class, 'createFiliereForm'])->name('create_filiere_form');
});


Route::get('/member/{id}/edit', [AdminRegionController::class, 'showEditMemberForm'])->name('member.editForm');
Route::match(['put', 'post'], '/member/{id}/edit', [AdminRegionController::class, 'editMember'])->name('member.edit');
Route::post('/member/{id}/delete', [AdminRegionController::class, 'deleteMember'])->name('member.delete');
Route::get('/member/{id}', [AdminRegionController::class, 'showMember'])->name('member.show');
Route::get('/statistics', [AdminRegionController::class, 'showStatistics'])->name('statistics');
Route::get('/membre/create', [MembreController::class, 'store'])->name('membre.create');
Route::post('/super_admin/member', [MembreController::class, 'store'])->name('super_admin.member');
Route::get('/membre/{membre}/edit', [MembreController::class, 'edit'])->name('membre.edit');
Route::get('/membre', [MembreController::class, 'index'])->name('membre.index');
Route::match(['put', 'post'], '/membre/{membre}/update', [MembreController::class, 'update'])->name('membre.update');


use App\Http\Controllers\AdminFiliereController;
Route::group(['middleware' => 'auth'], function () {
    Route::get('/AdminFiliere/index', [AdminFiliereController::class, 'index'])->name('filiere.index');

    Route::get('/AdminFiliere/addmember', [AdminFiliereController::class, 'addMemberForm'])->name('filiere.member.addform');
    Route::post('/AdminFiliere/addmember', [AdminFiliereController::class, 'addMember'])->name('filiere.member.add');

    Route::get('/AdminFiliere/{id}/editmember', [AdminFiliereController::class, 'editMemberForm'])->name('filiere.member.editform');

    Route::put('/AdminFiliere/editmember/{member}/edit', [AdminFiliereController::class, 'editMember'])->name('filiere.member.edit');

    Route::get('/AdminFiliere/showmember/{member}', [AdminFiliereController::class, 'showMember'])->name('filiere.member.show');
    Route::get('/AdminFiliere/listmembers', [AdminFiliereController::class, 'listMembers'])->name('filiere.member.list');
    Route::delete('/AdminFiliere/delete/member/{member}', [AdminFiliereController::class, 'deleteMember'])->name('filiere.member.delete');

    Route::get('/AdminFiliere/addactivity', [AdminFiliereController::class, 'addActivityForm'])->name('filiere.activity.addform');
    Route::post('/AdminFiliere/addactivity', [AdminFiliereController::class, 'addActivity'])->name('filiere.activity.add');

    Route::get('/AdminFiliere/editactivity/{id}/edit', [AdminFiliereController::class, 'editActivityForm'])->name('filiere.activity.editform');
    Route::put('/AdminFiliere/editactivity/{id}/edit', [AdminFiliereController::class, 'editActivity'])->name('filiere.activity.edit');

    Route::get('/AdminFiliere/showactivity/{id}', [AdminFiliereController::class, 'showActivity'])->name('filiere.activity.show');
    Route::get('/AdminFiliere/listactivities', [AdminFiliereController::class, 'listActivities'])->name('filiere.activity.list');
    Route::delete('/AdminFiliere/delete/activity/{id}', [AdminFiliereController::class, 'deleteActivity'])->name('filiere.activity.delete');
    Route::get('/AdminFiliere/statistics', [AdminFiliereController::class, 'statistics'])->name('filiere.statistics');

});
