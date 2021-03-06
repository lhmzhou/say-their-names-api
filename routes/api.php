<?php

use App\Http\Controllers\API\Authentication\LoginController;
use App\Http\Controllers\API\Authentication\RegisterController;
use App\Http\Controllers\API\Donations\GetSingleDonationController;
use App\Http\Controllers\API\Donations\ListDonationsController;
use App\Http\Controllers\API\Donations\ListDonationTypesController;
use App\Http\Controllers\API\JoinMailingListController;
use App\Http\Controllers\API\People\GetSinglePersonController;
use App\Http\Controllers\API\People\ListPeopleController;
use App\Http\Controllers\API\Petitions\GetSinglePetitionController;
use App\Http\Controllers\API\Petitions\ListPetitionsController;
use App\Http\Controllers\API\Petitions\ListPetitionTypesController;
use App\Http\Controllers\API\SearchController;
use App\Http\Controllers\API\User\ApplyBookmarkToProfile;
use App\Http\Controllers\API\User\GetCurrentProfile;
use App\Http\Controllers\API\User\ListProfileBookmarks;
use App\Http\Controllers\API\User\RemoveBookmarkFromProfile;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::post('login', LoginController::class);
    Route::post('register', RegisterController::class);

    Route::get('people', ListPeopleController::class);
    Route::get('people/{slug}', GetSinglePersonController::class);

    Route::get('donation-types', ListDonationTypesController::class);
    Route::get('donations', ListDonationsController::class);
    Route::get('donations/{slug}', GetSingleDonationController::class);

    Route::get('petition-types', ListPetitionTypesController::class);
    Route::get('petitions', ListPetitionsController::class);
    Route::get('petitions/{slug}', GetSinglePetitionController::class);

    Route::post('join/newsletter', JoinMailingListController::class);
    Route::get('search', SearchController::class);
});

Route::middleware('auth:sanctum')->prefix('user')->group(function () {
    Route::get('profile', GetCurrentProfile::class);
    Route::post('apply-bookmark', ApplyBookmarkToProfile::class);
    Route::get('list-bookmarks', ListProfileBookmarks::class);
    Route::post('remove-bookmark/{id}', RemoveBookmarkFromProfile::class);
});
