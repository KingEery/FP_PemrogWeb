<?php

namespace App\Http\Controllers;

use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }
        
        // Cari atau buat profile user
        $profile = ProfileUser::where('user_id', $user->id)->first();
        
        if (!$profile) {
            // Buat profile baru jika belum ada
            $profile = ProfileUser::create([
                'user_id' => $user->id,
                'fullname' => $user->name,
                'email' => $user->email,
                'username' => $user->username ?? '', // Pastikan field username ada di tabel users
                'level' => 1,
                'progress' => 0,
                'bio' => '',
                'hobbies' => json_encode([]),
                'dob' => null,
                'avatar' => null
            ]);
        }

        return view('user.profile', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        try {
            Log::info('Profile update request received', [
                'user_id' => Auth::id(),
                'request_data' => $request->all(),
                'has_file' => $request->hasFile('avatar')
            ]);

            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User tidak ditemukan'
                ], 401);
            }
            
            // Cek apakah profile sudah ada
            $existingProfile = ProfileUser::where('user_id', $user->id)->first();
            $profileId = $existingProfile ? $existingProfile->id : null;
            
            $validated = $request->validate([
                'fullname' => 'required|string|max:255',
                'username' => 'nullable|string|max:255|unique:users_profile,username,' . $profileId,
                'dob' => 'nullable|date',
                'email' => 'required|email|unique:users_profile,email,' . $profileId,
                'bio' => 'nullable|string',
                'hobbies' => 'nullable|array',
                'hobbies.*' => 'string|max:255',
                'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            Log::info('Validation passed', ['validated_data' => $validated]);

            // Handle file upload
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $validated['avatar'] = $avatarPath;
                Log::info('Avatar uploaded', ['path' => $avatarPath]);
            }

            // Konversi hobbies ke JSON
            $validated['hobbies'] = json_encode($request->input('hobbies', []));
            $validated['user_id'] = $user->id;

            Log::info('About to update/create profile', ['data' => $validated]);

            // Update atau create profile
            $profile = ProfileUser::updateOrCreate(
                ['user_id' => $user->id],
                $validated
            );

            // Update juga data di tabel users jika diperlukan
            $user->update([
                'name' => $validated['fullname'],
                'email' => $validated['email']
            ]);

            Log::info('Profile updated/created successfully', ['profile_id' => $profile->id]);

            return response()->json([
                'success' => true,
                'message' => 'Profil berhasil diperbarui!',
                'avatar_url' => isset($avatarPath) ? asset('storage/'.$avatarPath) : null
            ]);

        } catch (ValidationException $e) {
            Log::error('Validation error', ['errors' => $e->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
            
        } catch (\Exception $e) {
            Log::error('Profile update error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server: '.$e->getMessage()
            ], 500);
        }
    }
}