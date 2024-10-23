<?php

use App\Http\Controllers\BalanceTransfer\BalanceTransferController;
use App\Http\Controllers\BasicParameter\CountryController;
use App\Http\Controllers\BasicParameter\DistrictController;
use App\Http\Controllers\BasicParameter\DivisionController;
use App\Http\Controllers\BasicParameter\ThanaController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\FrontEnd\FrontendController;
use App\Http\Controllers\FrontEnd\HomepageController;
use App\Http\Controllers\MainFeatures\CourseController;
use App\Http\Controllers\MainFeatures\TeacherMeetingLinkController;
use App\Http\Controllers\Passboook\PassbookController;
use App\Http\Controllers\UserManagement\NewUserController;
use App\Http\Controllers\UserManagement\UserRoleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {

});

