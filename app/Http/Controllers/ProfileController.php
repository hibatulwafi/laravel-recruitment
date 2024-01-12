<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
  public function index()
  {
    $date_now = Carbon::now();
    $date_now = $date_now->format('Y-m-d');
    $id = Auth::user()->id;

    $collapse  = 'profile';
    $profile  = DB::table('users_profile')
      ->where('user_id', $id)->first();
    return view('frontend.profile', compact('collapse', ['profile']));
  }

  public function update(Request $request)
  {
    $id = Auth::user()->id;
    $user = DB::table('users_profile')->where('user_id', $id)->first();
    if ($user) {
      // Update Table User
      DB::table('users')
        ->where('id', $id)
        ->update([
          'name' => $request->input('nameInput'),
          'email' => $request->input('emailInput'),
          'phone' => $request->input('phoneInput'),
          'updated_at' => now(),
        ]);
      // Update Table Profile
      DB::table('users_profile')
        ->where('user_id', $id)
        ->update([
          'gender' => $request->input('genderInput'),
          'birthdate' => $request->input('dobInput'),
          'education' => $request->input('educationInput'),
          'university' => $request->input('universitasInput'),
          'major' => $request->input('jurusanInput'),
          'graduation_year' => $request->input('tahunlulusInput'),
          'job_status' => $request->input('statuskerjaInput'),
          'updated_at' => now(),
        ]);
    } else {

      DB::table('users')
        ->where('id', $id)
        ->update([
          'name' => $request->input('nameInput'),
          'email' => $request->input('emailInput'),
          'phone' => $request->input('phoneInput'),
          'updated_at' => now(),
        ]);

      DB::table('users_profile')->insert([
        'user_id' => $id,
        'gender' => $request->input('genderInput'),
        'birthdate' => $request->input('dobInput'),
        'education' => $request->input('educationInput'),
        'university' => $request->input('universitasInput'),
        'major' => $request->input('jurusanInput'),
        'graduation_year' => $request->input('tahunlulusInput'),
        'job_status' => $request->input('statuskerjaInput'),
        'created_at' => now(),
        'updated_at' => now(),
      ]);
    }
    return redirect()->route('profil.index')->with('success', 'Profile updated');
  }

  public function uploadFiles(Request $request)
  {
    $id = Auth::user()->id;

    $request->validate([
      'cv_file' => 'nullable|mimes:pdf,doc,docx|max:2048',
      'portfolio_file' => 'nullable|mimes:pdf,doc,docx|max:2048',
    ]);

    // Menangani unggahan CV
    if ($request->hasFile('cv_file')) {
      $cvFile = $request->file('cv_file');
      $cvFileName = time() . '_' . $cvFile->getClientOriginalName();
      $cvFile->storeAs('cv_files', $cvFileName, 'public');
      // Simpan informasi file atau lakukan apa pun yang diperlukan
      DB::table('users_profile')
        ->where('user_id', $id)
        ->update([
          'cv_file' => $cvFileName,
          'updated_at' => now(),
        ]);
    }

    // Menangani unggahan Portfolio
    if ($request->hasFile('portfolio_file')) {
      $portfolioFile = $request->file('portfolio_file');
      $portfolioFileName = time() . '_' . $portfolioFile->getClientOriginalName();
      $portfolioFile->storeAs('portfolio_files', $portfolioFileName, 'public');
      // Simpan informasi file atau lakukan apa pun yang diperlukan
      DB::table('users_profile')
        ->where('user_id', $id)
        ->update([
          'portfolio_file' => $portfolioFileName,
          'updated_at' => now(),
        ]);
    }

    // Setelah menangani pengunggahan, Anda dapat mengarahkan ke halaman yang sesuai
    return redirect()->route('profil.index')->with('success', 'File berhasil diunggah.');
  }

  public function changePassword()
  {
    $id = Auth::user()->id;

    $profile  = DB::table('users_profile')
      ->where('user_id', $id)->first();

    $collapse  = 'change-password';
    return view('frontend.profile', compact('collapse',['profile']));
  }

  public function updatePassword(Request $request)
  {
    $request->validate([
      'current_password' => 'required',
      'new_password' => 'required|min:8|confirmed',
    ]);

    $user = auth()->user();

    if (!Hash::check($request->current_password, $user->password)) {
      return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
    }

    DB::table('users')
      ->where('id', $user->id)
      ->update([
        'password' => Hash::make($request->new_password),
        'updated_at' => now(),
      ]);
    return redirect()->route('changepassword.index')->with('success', 'Password berhasil diperbarui!');
  }

  public function updatePhoto(Request $request)
  {
    $request->validate([
      'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = auth()->user();

    if ($request->hasFile('profile_photo')) {
      // Hapus foto lama (jika ada)
      Storage::delete('public/profile_photos/' . $user->profile_photo);

      // Simpan foto baru
      
      $profilePhotoPath = $request->file('profile_photo')->store('public/profile_photos');
      DB::table('users_profile')
        ->where('user_id', $user->id)
        ->update([
          'photo' => basename($profilePhotoPath),
          'updated_at' => now(),
        ]);
    }

    return redirect()->route('profil.index')->with('success', 'Foto berhasil diperbarui!');
  }
}
