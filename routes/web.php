<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {

    Route::get('/request/mageko', function () {
        return view('request.index');
    })->name('requestnow');

    route::post('/request', function (Request $request) {
        $data = $request->validate([
            'request_type' => 'required',
            'description' => 'required',
            'document' => 'required|image',

        ]);

        // dd($data);

        //    store this photo in images/request folder
        // Handle file upload
        if ($request->hasFile('document')) {
            $photo = $request->file('document');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/document/'), $photoname);
            $data['document'] = $photoname;
        }

        RequestModel::create($data);
        Request::create($data);
        return redirect()->route('welcome');
    })->name('request.store');
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
