<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        // $this->UserModel = new UserModel();
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $wisatawan = User::latest()->when(
            request()->cari,
            function ($wisatawan) {
                $wisatawan = $wisatawan->where('name', 'like', '%' . request()->cari . '%');
            }
        )->paginate(10);
        $wisatawan = User::where('level', 'wisatawan')->get();
        return view('admin.user', compact('wisatawan'));
    }

    public function delete($id)
    {
        $user = User::find($id);
        if ($user->foto <> "") {
            unlink(public_path('foto_profil') . '/' . $user->foto);
        }
        $user->delete();
        if ($user) {
            return redirect()->route('admin.user')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->route('admin.user')->with(['error' => 'Data Berhasil Dihapus!']);
        }
    }
}
