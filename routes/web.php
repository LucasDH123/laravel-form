<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;

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

Route::get('/', [ViewController::class, 'mainView'])->name('main');
Route::get('/login', [ViewController::class, 'loginView'])->name('login')->middleware('guest');
Route::get('/register', [ViewController::class, 'registerView'])->name('register');
Route::get('/posts', [PostController::class, 'showAllPosts'])->name('posts');
Route::get('/create_post', [ViewController::class, "createPostView"])->name('createPost')->middleware('auth');
Route::get('/post_detail/{post}', [PostController::class, "showDetail"])->name('detail');
Route::get('/update_post/{id}', [ViewController::class, "updatePostView"])->name('updatepost')->middleware('auth');
Route::get('/confirm_deletion', [PostController::class, "deletionView"])->name('deleteview')->middleware('auth');
Route::get('/user_messages/{box}', [MessageController::class, "messageView"])->name('msgview')->middleware('auth');
Route::get('/message_form', [MessageController::class, "messageFormView"])->name('messageform')->middleware('auth');
Route::get('/user', [UserController::class, "view"])->name('usermenu')->middleware('auth');
Route::get('/user_details', [UserController::class, "dataview"])->name('userDetailView')->middleware('auth');
Route::get('/confirm_deletion/{id}', [UserController::class, "confirmDeletionView"])->name('confirmdelete')->middleware('auth'); 
Route::get('/admin_edit_form/{id}', [UserController::class, 'editUserInfoAdminView'])->name('admineditview')->middleware('auth');     
Route::get('/delete_user/{id}', [UserController::class, "deleteUser"])->name('deleteuser')->middleware('auth'); 


Route::post('/register_user', [AuthenticationController::class, "registerUser"])->name('regiUser');
Route::post('/login_user', [AuthenticationController::class, "userLogin"])->name('loggingIn');
Route::get('/logout', [AuthenticationController::class, "logout"])->name('logout')->middleware('auth');
Route::post('/store_post', [PostController::class, "store"])->name('storepost')->middleware('auth');
Route::post('/post_comment', [CommentController::class, "store"])->name('postComment')->middleware('auth');
Route::post('/edit_post', [PostController::class, "editPost"])->name('editpost')->middleware('auth');
Route::get('/delete_post', [Postcontroller::class, "deletepost"])->name('deletepost')->middleware('auth');
Route::post('/send_message', [MessageController::class, "DirectMessageStore"])->name('sendMessage')->middleware('auth');
Route::post('/edit_user', [UserController::class, "editUserInfo"])->name('editUser')->middleware('auth');
Route::post('/change_password', [UserController::class, 'editPassword'])->name('editPassword')->middleware("auth");
Route::post('/admin_edit_user', [UserController::class, 'editUserInfoAdminMenu'])->name('adminedit')->middleware('auth');
Route::post('/admin_delete_user/{id}', [UserController::class, 'AdminDeleteUser'])->name('admindelete')->middleware('auth'); 

Route::get('/token', [APIController::class, 'getKeyView'])->name('keyview')->middleware('auth');
Route::get('/token/create', [APIController::class, 'newKey'])->name('newkey')->middleware('auth'); 
Route::get('/token/invalidate', [APIController::class, 'invalidateKey'])->name('invalidatekey')->middleware('auth'); 