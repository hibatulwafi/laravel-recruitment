<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\StaController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\LandingpageController;

Route::get('/', function () {
  return redirect()->route('app.home');
});

Route::get('/home', function () {
  return redirect()->route('app.home');
})->name('home');


Route::group(['prefix' => 'dashboard', 'as' => 'app.', 'middleware' => ['web', 'auth']], function () {

  Route::get('home', function () {
    return view('pages.dashboard');
  })->name('home');

  Route::get('user', function () {
    return view('pages.user');
  })->name('user');

  Route::group(
    ['prefix' => 'settings', 'as' => 'setting.'],
    function () {


      Route::get(
        'my-profile',
        function () {
          return view('pages.profile');
        }
      )->name('my-profile');

      Route::get(
        'change-password',
        function () {
          return view('pages.change-password');
        }
      )->name('change-password');
    }
  );
});

Route::group(['prefix' => 'authentication', 'as' => 'auth.', 'middleware' => 'web'], function () {
  Route::post('logout', function () {
    Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
  })->name('logout');
});

Route::group(['prefix' => 'authentication', 'middleware' => 'guest'], function () {
  Route::get('login', App\Http\Livewire\Authentication\Login\SimpleLoginComponent::class)->name('login');
  Route::get('register',  App\Http\Livewire\Authentication\Register\SimpleRegisterComponent::class)->name('register');
});
Route::middleware(['web', 'auth'])->group(function () {
  /** Master Data */

  // Loker
  Route::get('/vacancy', [VacancyController::class, 'index'])->name('vacancy.index');
  Route::get('/vacancy/create', [VacancyController::class, 'create'])->name('vacancy.create');
  Route::post('/vacancy', [VacancyController::class, 'store'])->name('vacancy.store');
  Route::get('/vacancy/{id}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');
  Route::put('/vacancy/{id}', [VacancyController::class, 'update'])->name('vacancy.update');
  Route::delete('/vacancy/{id}', [VacancyController::class, 'destroy'])->name('vacancy.destroy');

  // Periode
  Route::get('/periode/history', [PeriodeController::class, 'history'])->name('periode.history');
  Route::post('/periode', [PeriodeController::class, 'store'])->name('periode.store');
  Route::get('/periode/edit/{id}', [PeriodeController::class, 'edit'])->name('periode.edit');
  Route::get('/periode/detail/{id}', [PeriodeController::class, 'detail'])->name('periode.detail');
  Route::put('/periode', [PeriodeController::class, 'update'])->name('periode.update');
  Route::delete('/periode/destroy', [PeriodeController::class, 'destroy'])->name('periode.destroy');

  // Landing Page
  Route::get('/lp/detail/{id}', [LandingpageController::class, 'detail'])->name('lp.detail');
  Route::put('/lp', [LandingpageController::class, 'update'])->name('lp.update');

  /** End Master Data */

  Route::get('/question', [QuestionController::class, 'index'])->name('question.index');
  Route::post('/question', [QuestionController::class, 'store'])->name('question.store');
  Route::put('/question/{id}/{type}', [QuestionController::class, 'update'])->name('question.update');
  Route::delete('/question/{id}/{type}', [QuestionController::class, 'destroy'])->name('question.destroy');

  // Selection
  Route::get('/candidate', [CandidateController::class, 'index'])->name('candidate.index');
  Route::post('/candidate', [CandidateController::class, 'store'])->name('candidate.store');
  Route::put('/candidate/{id}/{type}', [CandidateController::class, 'update'])->name('candidate.update');
  Route::delete('/candidate/{id}/{type}', [CandidateController::class, 'destroy'])->name('candidate.destroy');

  Route::get('/st1', [SeleksiController::class, 'st1'])->name('st1.index');
  Route::get('/st2', [SeleksiController::class, 'st2'])->name('st2.index');
  Route::get('/task', [SeleksiController::class, 'task'])->name('task.index');

  Route::get('/sta', [StaController::class, 'index'])->name('sta.index');
});

Route::get('/loker/{id}', [GuestController::class, 'index'])->name('loker.index');
Route::get('/loker/seleksi-tahap-1/{id}', [GuestController::class, 'st1'])->name('loker.st1');
Route::get('/loker/seleksi-tahap-2/{id}', [GuestController::class, 'st2'])->name('loker.st2');
Route::get('/loker/task/{id}', [GuestController::class, 'task'])->name('loker.task');
Route::get('/loker/seleksi-tahap-akhir/{id}', [GuestController::class, 'sta'])->name('loker.sta');

Route::post('/loker/seleksi-tahap-1/', [GuestController::class, 'storeSt1'])->name('store.st1');
Route::post('/loker/seleksi-tahap-2/', [GuestController::class, 'storeSt2'])->name('store.st2');
Route::post('/loker/task/', [GuestController::class, 'storeTask'])->name('store.task');
Route::post('/loker/seleksi-tahap-akhir/', [GuestController::class, 'storeSta'])->name('store.sta');

Route::get('/loker/thankyou/page', [GuestController::class, 'thankyou'])->name('loker.thankyou');
