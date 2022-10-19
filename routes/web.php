<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnterWebController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\SettingDataController;
use App\Http\Controllers\ViewJournalController;
use App\Http\Controllers\SelfController;


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
// Route Testing View
Route::get('/test', function () {
    return view('settingjournal\mainsetting\admin\adminpage');
});

// Route Interaction for Views
Route::get('/', [EnterWebController::class, 'log']);
Route::post('/login', [EnterWebController::class, 'login']);
Route::get('/{accountid}/journal', [EnterWebController::class, 'journalpage']);
Route::get('/{accountid}/journal/{path}', [EnterWebController::class, 'enterjournal']);
Route::get('/{accountid}/about/{path}/page/', [JournalController::class, 'aboutpage']);
Route::get('/{accountid}/journal/{path}/announcement', [JournalController::class, 'announcementpage']);
Route::get('/{accountid}/journal/{path}/announcement/{id}', [JournalController::class, 'announcementselfpage']);
Route::get('/{accountid}/journal/{path}/issue/archive', [JournalController::class, 'archivepage']);
Route::get('/{accountid}/journal/{path}/issue/{id}', [JournalController::class, 'archivepageself']);
Route::get('/{accountid}/journal/{path}/article/{id}', [JournalController::class, 'articleself']);
Route::get('/{accountid}/journal/{path_jr}/editors', [JournalController::class, 'editorspage']);
Route::get('/{accountid}/journal/{path_jr}/download', [JournalController::class, 'downloadpage']);
Route::get('/{accountid}/journal/{path_jr}/download/{filepath}', [JournalController::class, 'downloadfile']);
Route::get('/{accountid}/journal/{path_jr}/download/article/{filepath}', [JournalController::class, 'downloadfilearticle']);



Route::post('/journal/register/', [EnterWebController::class, 'registeraccount']);
Route::get('/home', [EnterWebController::class, 'gohome']);
Route::post('/homepage', [EnterWebController::class, 'loginaccount'])->name('home');
Route::get('/{id}/profile', [JournalController::class, 'profile']);
Route::get('/{accountid}/dashboard/empetyjournal', [JournalController::class, 'empetydashboard']);
Route::get('/{idaccount}/dashboard/{idjr}', [JournalController::class, 'settingweb']);
Route::get('/{accountid}/requestjournal', [EnterWebController::class, 'requestpage']);
Route::post('/{accountid}/send/requestjournal', [EnterWebController::class, 'sendrequest']);
Route::get('/view/explore/journal', [EnterWebController::class, 'explorejournal']);

//Viewers Interaction to Website
Route::get('/journal/{path}', [ViewJournalController::class, 'enterjournal']);
Route::get('/about/{path}/page/', [ViewJournalController::class, 'aboutpage']);
Route::get('/journal/{path}/announcement', [ViewJournalController::class, 'announcementpage']);
Route::get('/journal/{path}/announcement/{id}', [ViewJournalController::class, 'announcementselfpage']);
Route::get('/journal/{path}/issue/archive', [ViewJournalController::class, 'archivepage']);
Route::get('/journal/{path}/issue/{id}', [ViewJournalController::class, 'archivepageself']);
Route::get('/journal/{path}/article/{id}', [ViewJournalController::class, 'articleself']);
Route::get('/journal/{path_jr}/editors', [ViewJournalController::class, 'editorspage']);
Route::get('/journal/{path_jr}/download', [ViewJournalController::class, 'downloadpage']);
Route::get('/journal/{path_jr}/download/{filepath}', [ViewJournalController::class, 'downloadfile']);
Route::get('/journal/{path_jr}/download/article/{filepath}', [ViewJournalController::class, 'downloadfilearticle']);

Route::get('/view/journal/category/ekonomi', [ViewJournalController::class, 'ekonomicategory']);
Route::get('/view/journal/category/politik', [ViewJournalController::class, 'politikcategory']);
Route::get('/view/journal/category/computer', [ViewJournalController::class, 'computercategory']);
Route::get('/view/journal/category/sport', [ViewJournalController::class, 'sportcategory']);



// --------------------------------------------------------------------------------------------------------------------------

//Delete Journal him self for Member
Route::get('/{idaccount}/dashboard/delete/journal/{idjr}', [SettingDataController::class, 'memberdeletejournal']);



// Routing for Setting---------------------------------------------------------- 

// Route Interaction for Setting Journal
Route::get('/{idaccount}/dashboard/{idjr}/aboutjournal', [SettingController::class, 'settingabout']);


// Route Interaction for Setting Issue
Route::get('/{idaccount}/dashboard/{idjr}/issue', [SettingController::class, 'settingissue']);
Route::get('/{idaccount}/dashboard/{idjr}/issue/create', [SettingController::class, 'createissue']);
Route::get('/{idaccount}/dashboard/{idjr}/issue/edit/{idissue}', [SettingController::class, 'editissue']);


// Route Interaction for Setting Article
Route::get('/{idaccount}/dashboard/{idjr}/Article', [SettingController::class, 'settingarticle']);
Route::get('/{idaccount}/dashboard/{idjr}/article/create', [SettingController::class, 'createarticle']);
Route::get('/{idaccount}/dashboard/{idjr}/article/edit/{idarticle}', [SettingController::class, 'editarticle']);

// Route Interaction for Setting Announcement
Route::get('/{idaccount}/dashboard/{idjr}/Announcement', [SettingController::class, 'settingannouncement']);
Route::get('/{idaccount}/dashboard/{idjr}/announcement/create', [SettingController::class, 'createannouncement']);
Route::get('/{idaccount}/dashboard/{idjr}/announcement/edit/{idannouncement}', [SettingController::class, 'editannouncement']);

// Route Interaction for Setting Editorial Team
Route::get('/{idaccount}/dashboard/{idjr}/editorialteam', [SettingController::class, 'settingeditorialteam']);
Route::get('/{idaccount}/dashboard/{idjr}/editorialteam/create', [SettingController::class, 'createeditorialteam']);
Route::get('/{idaccount}/dashboard/{idjr}/editorialteam/edit/{ideditorialteam}', [SettingController::class, 'editeditorialteam']);

// --------------------------------------------------------------------------------------------------------------------------



// Routing for Setting Interaction to Database---------------------------------------------------------- 

// Route Interaction to Database for Setting Journal
Route::post('/{idaccount}/dashboard/{idjr}/journal/save', [SettingDataController::class, 'settingsavejournal']);
Route::get('/{idaccount}/journal/{idjr}/publish', [SettingDataController::class, 'publishjournal']);
Route::get('/{idaccount}/journal/{idjr}/unpublish', [SettingDataController::class, 'unpublishjournal']);


// Route Interaction to Database for Setting About Journal
Route::post('/{idaccount}/dashboard/{idjr}/aboutjournal/save/{idabout}', [SettingDataController::class, 'settingsaveaboutjournal']);

// Route Interaction to Database for Setting Issue
Route::post('/{idaccount}/dashboard/{idjr}/issue/save/newissue', [SettingDataController::class, 'settingcreateissue']);
Route::post('/{idaccount}/dashboard/{idjr}/issue/save/{idissue}', [SettingDataController::class, 'settingupdateissue']);
Route::post('/{idaccount}/dashboard/{idjr}/issue/delete/{idissue}', [SettingDataController::class, 'settingdeleteissue']);

// Route Interaction to Database for Setting Article
Route::post('/{idaccount}/dashboard/{idjr}/article/save/newarticle', [SettingDataController::class, 'settingcreatearticle']);
Route::post('/{idaccount}/dashboard/{idjr}/article/save/{idarticle}', [SettingDataController::class, 'settingupdatearticle']);
Route::post('/{idaccount}/dashboard/{idjr}/article/delete/{idarticle}', [SettingDataController::class, 'settingdeletearticle']);


// Route Interaction to Database for Setting Announcement
Route::post('/{idaccount}/dashboard/{idjr}/announcement/save/newannouncement', [SettingDataController::class, 'settingcreateannouncement']);
Route::post('/{idaccount}/dashboard/{idjr}/announcement/save/{idannouncement}', [SettingDataController::class, 'settingupdateannouncement']);
Route::post('/{idaccount}/dashboard/{idjr}/announcement/delete/{idannouncement}', [SettingDataController::class, 'settingdeleteannouncement']);



// Route Interaction to Database for Setting Article
Route::post('/{idaccount}/dashboard/{idjr}/editorialteam/save/neweditorialteam', [SettingDataController::class, 'settingcreateeditorialteam']);
Route::post('/{idaccount}/dashboard/{idjr}/editorialteam/save/{ideditorialteam}', [SettingDataController::class, 'settingupdateeditorialteam']);
Route::post('/{idaccount}/dashboard/{idjr}/editorialteam/delete/{ideditorialteam}', [SettingDataController::class, 'settingdeleteeditorialteam']);


// Route for Admin---------------------------------------------------------- 

// Route Interaction for Setting Admin for Journal
Route::get('/{idaccount}/dashboard/admin/journal/edit/{idjournal}', [SettingController::class, 'admineditjournal']);

// Route Interaction to Database for Setting Journal
Route::get('/{idaccount}/dashboard/admin/journal/createnew', [SettingDataController::class, 'adminnewjournal']);
Route::post('/{idaccount}/dashboard/admin/journal/save/{idjournal}', [SettingDataController::class, 'adminupdatejournal']);
Route::post('/{idaccount}/dashboard/admin/journal/delete/{idjournal}', [SettingDataController::class, 'admindeletejournal']);


// Route Interaction for Setting Admin for Account
Route::get('/{idaccount}/dashboard/admin/account', [SettingController::class, 'adminaccount']);
Route::get('/{idaccount}/dashboard/admin/account/edit/{account_id}', [SettingController::class, 'admineditaccount']);
Route::get('/{idaccount}/dashboard/admin/account/createnew', [SettingController::class, 'admincreateaccount']);

// Route Interaction to Database for Setting Account
Route::post('/{idaccount}/dashboard/admin/account/newaccount', [SettingDataController::class, 'adminnewaccount']);
Route::post('/{idaccount}/dashboard/admin/account/save/{account_id}', [SettingDataController::class, 'adminupdateaccount']);
Route::post('/{idaccount}/dashboard/admin/account/delete/{account_id}', [SettingDataController::class, 'admindeleteaccount']);
// Route Interaction for Setting Admin for Request
Route::get('/{idaccount}/dashboard/admin/request', [SettingController::class, 'adminrequest']);
// Route Interaction to Database for Setting Request
Route::post('/{idaccount}/dashboard/admin/request/delete/{idrequest}', [SettingDataController::class, 'admindeleterequest']);


// 4 Category Setting________________________________________________________________________________________________________________
Route::get('/{idaccount}/dashboard/setting/category2', [JournalController::class, 'category2']);
//Interact to View
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}', [SelfController::class, 'admineditjournal']);
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/aboutjournal', [SelfController::class, 'settingabout']);
//Issue---
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/issue', [SelfController::class, 'settingissue']);
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/issue/create', [SelfController::class, 'createissue']);
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/issue/edit/{idissue}', [SelfController::class, 'editissue']);
//Article---
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/article', [SelfController::class, 'settingarticle']);
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/article/create', [SelfController::class, 'createarticle']);
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/article/edit/{idarticle}', [SelfController::class, 'editarticle']);
//Announcement---
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/announcement', [SelfController::class, 'settingannouncement']);
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/announcement/create', [SelfController::class, 'createannouncement']);
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/announcement/edit/{idannouncement}', [SelfController::class, 'editannouncement']);
//EditorialTeam---
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/editorialteam', [SelfController::class, 'settingeditorialteam']);
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/editorialteam/create', [SelfController::class, 'createeditorialteam']);
Route::get('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/editorialteam/edit/{ideditorialteam}', [SelfController::class, 'editeditorialteam']);

//Interact to database
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/aboutjournal/save/{idabout}', [SelfController::class, 'settingsaveaboutjournal']);
Route::get('/{idaccount}/dashboard/newjournal/category/{journalcategory}', [SelfController::class, 'adminnewjournal']);
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/save', [SelfController::class, 'settingsavejournal']);
Route::post('/{idaccount}/dashboard/delete/{idjr}/category/{journalcategory}', [SelfController::class, 'deletejournaladmin']);
//Issue---
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/issue/save/newissue', [SelfController::class, 'settingcreateissue']);
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/issue/save/{idissue}', [SelfController::class, 'settingupdateissue']);
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/issue/delete/{idissue}', [SelfController::class, 'settingdeleteissue']);
//Article---
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/article/save/newarticle', [SelfController::class, 'settingcreatearticle']);
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/article/save/{idarticle}', [SelfController::class, 'settingupdatearticle']);
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/article/delete/{idarticle}', [SelfController::class, 'settingdeletearticle']);
//Announcement---
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/announcement/save/newannouncement', [SelfController::class, 'settingcreateannouncement']);
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/announcement/save/{idannouncement}', [SelfController::class, 'settingupdateannouncement']);
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/announcement/delete/{idannouncement}', [SelfController::class, 'settingdeleteannouncement']);
//EditorialTeam---
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/editorialteam/save/neweditorialteam', [SelfController::class, 'settingcreateeditorialteam']);
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/editorialteam/save/{ideditorialteam}', [SelfController::class, 'settingupdateeditorialteam']);
Route::post('/{idaccount}/dashboard/edit/{idjr}/category/{journalcategory}/editorialteam/delete/{ideditorialteam}', [SelfController::class, 'settingdeleteeditorialteam']);