<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\StaController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ExportController;

# Redirect to frontend
Route::get('/', function () {
  return redirect()->route('career.index');
});

# Admin login redirect
Route::get('/admin', function () {
  return redirect()->route('login');
});

# Return view 404 and logout
Route::get('404', function () {
  return view('frontend.404');
})->name('404');

# Redirect to dashboard
Route::get('/home', function () {
  return redirect()->route('app.home');
})->name('home');


# User Area but auth not required 
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

# User Area (Kandidat)
Route::get('/career', [CareerController::class, 'index'])->name('career.index');
Route::get('/career/detail/{id}', [CareerController::class, 'detail'])->name('career.detail');
Route::post('/career/search/', [CareerController::class, 'search'])->name('career.search');
Route::get('/career/about/', [CareerController::class, 'about'])->name('career.about');

Route::get('/career/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/career/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/career/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/career/login', [LoginController::class, 'signin'])->name('login.signin');

Route::middleware(['auth', 'user-access:user'])->group(function () {
  Route::get('/career/profil', [ProfileController::class, 'index'])->name('profil.index');
  Route::post('/career/profil', [ProfileController::class, 'update'])->name('profil.update');
  Route::get('/career/change-password', [ProfileController::class, 'changePassword'])->name('changepassword.index');
  Route::post('/career/change-password', [ProfileController::class, 'updatePassword'])->name('changepassword.update');
  Route::post('/career/change-photo', [ProfileController::class, 'updatePhoto'])->name('changephoto.update');
  Route::get('/career/applylist', [CareerController::class, 'applylist'])->name('applylist.index');
  Route::get('/career/applylist/{id}', [CareerController::class, 'applydetail'])->name('applylist.detail');
  Route::get('/career/st/{id}', [CareerController::class, 'seleksitahap'])->name('st.index');
  Route::get('/career/logout', [LoginController::class, 'logout'])->name('logout.flush');

  Route::get('/get_jawaban/{type}/{id}', [CareerController::class, 'getJawaban']);
  Route::post('/upload-file', [ProfileController::class, 'uploadFiles'])->name('upload.file');
});
# End User Area

# Admin Area (Admin atau HR)

Route::group(['prefix' => 'authentication', 'middleware' => 'guest'], function () {
  Route::get('login', App\Http\Livewire\Authentication\Login\SimpleLoginComponent::class)->name('login');
  Route::get('register',  App\Http\Livewire\Authentication\Register\SimpleRegisterComponent::class)->name('register');
});


Route::group(['prefix' => 'authentication', 'as' => 'auth.', 'middleware' => 'web'], function () {
  Route::post('logout', function () {
    Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
  })->name('logout');
});

# Dengan prefix awal /dashboard
Route::group(['prefix' => 'dashboard', 'as' => 'app.', 'middleware' => ['web', 'auth', 'user-access:admin']], function () {

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



Route::middleware(['web', 'auth', 'user-access:manager'])->group(function () {
  Route::get('/career/logout', [LoginController::class, 'logout'])->name('logout.flush');
});

Route::middleware(['web', 'auth', 'user-access:admin'])->group(function () {

  /** Master Data */
  # Loker
  Route::get('/vacancy', [VacancyController::class, 'index'])->name('vacancy.index');
  Route::get('/vacancy/create', [VacancyController::class, 'create'])->name('vacancy.create');
  Route::post('/vacancy', [VacancyController::class, 'store'])->name('vacancy.store');
  Route::get('/vacancy/{id}/edit', [VacancyController::class, 'edit'])->name('vacancy.edit');
  Route::put('/vacancy/{id}', [VacancyController::class, 'update'])->name('vacancy.update');
  Route::delete('/vacancy/{id}', [VacancyController::class, 'destroy'])->name('vacancy.destroy');

  Route::get('/loker_aktif', [VacancyController::class, 'lokerAktif'])->name('loker_aktif.index');

  # Periode
  Route::get('/periode/history', [PeriodeController::class, 'history'])->name('periode.history');
  Route::post('/periode', [PeriodeController::class, 'store'])->name('periode.store');
  Route::get('/periode/edit/{id}', [PeriodeController::class, 'edit'])->name('periode.edit');
  Route::get('/periode/detail/{id}', [PeriodeController::class, 'detail'])->name('periode.detail');
  Route::put('/periode', [PeriodeController::class, 'update'])->name('periode.update');
  Route::delete('/periode/destroy', [PeriodeController::class, 'destroy'])->name('periode.destroy');

  # Landing Page
  Route::get('/lp/detail/{id}', [LandingpageController::class, 'detail'])->name('lp.detail');
  Route::put('/lp', [LandingpageController::class, 'update'])->name('lp.update');

  /** End Master Data */

  Route::get('/question', [QuestionController::class, 'index'])->name('question.index');
  Route::post('/question', [QuestionController::class, 'store'])->name('question.store');
  Route::put('/question/{id}/{type}', [QuestionController::class, 'update'])->name('question.update');
  Route::delete('/question/{id}/{type}', [QuestionController::class, 'destroy'])->name('question.destroy');

  # Get data from ajax
  Route::get('/ajax/candidate-bybatch/{id}', [AjaxController::class, 'candidateByBatch']);

  # End get data from ajax

  # Selection Section
  Route::get('/candidate', [CandidateController::class, 'index'])->name('candidate.index');
  Route::post('/candidate', [CandidateController::class, 'store'])->name('candidate.store');
  Route::put('/candidate/{id}/{type}', [CandidateController::class, 'update'])->name('candidate.update');
  Route::delete('/candidate/{id}/{type}', [CandidateController::class, 'destroy'])->name('candidate.destroy');

  Route::get('/st1', [SeleksiController::class, 'st1'])->name('st1.index');
  Route::get('/st1/{id}', [SeleksiController::class, 'st1Detail'])->name('st1.detail');
  Route::post('/st1/good', [SeleksiController::class, 'st1Good'])->name('st1.good');
  Route::post('/st1/not_good', [SeleksiController::class, 'st1NotGood'])->name('st1.not_good');


  Route::get('/st2', [SeleksiController::class, 'st2'])->name('st2.index');
  Route::get('/st2/{id}', [SeleksiController::class, 'st2Detail'])->name('st2.detail');
  Route::post('/st2/good', [SeleksiController::class, 'st2Good'])->name('st2.good');
  Route::post('/st2/not_good', [SeleksiController::class, 'st2NotGood'])->name('st2.not_good');

  Route::get('/sta', [SeleksiController::class, 'sta'])->name('sta.index');
  Route::get('/sta/{id}', [SeleksiController::class, 'staDetail'])->name('sta.detail');
  Route::post('/sta/good', [SeleksiController::class, 'staGood'])->name('sta.good');
  Route::post('/sta/not_good', [SeleksiController::class, 'staNotGood'])->name('sta.not_good');

  Route::get('/tugas', [SeleksiController::class, 'tugas'])->name('tugas.index');
  Route::get('/tugas/{id}', [SeleksiController::class, 'tugasDetail'])->name('tugas.detail');
  Route::post('/tugas/good', [SeleksiController::class, 'tugasGood'])->name('tugas.good');
  Route::post('/tugas/not_good', [SeleksiController::class, 'tugasNotGood'])->name('tugas.not_good');

  Route::get('/group_interview', [SeleksiController::class, 'groupInterview'])->name('gi.index');
  Route::get('/gi/{id}', [SeleksiController::class, 'getGI'])->name('gi.get');
  Route::post('/gi/store', [SeleksiController::class, 'storeGI'])->name('gi.store');
  Route::put('/gi/update', [SeleksiController::class, 'updateGI'])->name('gi.update');

  Route::get('/task', [SeleksiController::class, 'task'])->name('task.index');

  # Get data from ajax
  Route::get('/export/kandidat_bybatch/{id}', [ExportController::class, 'kandidat_bybatch'])->name('export.kandidat_bybatch');

  # End get data from ajax

});
