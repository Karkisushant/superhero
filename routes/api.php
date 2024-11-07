<?php

use App\Http\Controllers\Api\PageViewController;
use Illuminate\Support\Facades\Route;

Route::post('page-views',[PageViewController::class,'store']);
