<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $configuration = Configuration::first();
        // $testimoni = Testimonial::paginate(9);
        $data = [
            'title'     => 'Pengaturan User',
            'konfig'    => $configuration,
            'users'     => User::orderBy('status', 'ASC')->paginate(10)
        ];
        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $configuration = Configuration::first();
        $data = [
            'title' => 'Form Tambah User',
            'konfig' => $configuration,
        ];
        return view('admin.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name'      => 'required',
    //         'roles'     => 'required',
    //         'email'     => ['required', 'email', 'unique:users'],
    //         'password'  => ['required', 'min:8', 'confirmed'],
    //         'image'     => ['nullable', 'file', 'image'],
    //         'status'    => 'required'
    //     ]);

    //     try {
    //         // $validated['status'] = 'AKTIF';
    //         $validated['password'] = Hash::make($request->password);

    //         $validated['image'] = $request->file('image')->store('staff-image', 'public');

    //         User::create($validated);
    //         // dd($validated);
    //         return redirect()->route('user.index')->with('success_store', 'Data Berhasil Ditambahkan');
    //     } catch (\Exception $e) {
    //         return redirect()->route('user.index')->with('error', $e->getMessage());
    //     }
    // }

    public function store(Request $request)
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $request->validate([
            'name'      => 'required',
            'roles'     => 'required',
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'min:8', 'confirmed'],
            'image'     => ['nullable', 'file', 'image'],
            'status'    => 'required'
        ]);

        try {
            $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->roles = $request->get('roles');
            $user->status = $request->get('status');
            $photo = $request->file('image');
            if ($photo == null) {
                $user->image = '';
            } else {
                $user->image = $photo->store('staff-image', 'public');
            }
            //     $user->image = $photo->store('staff-image', 'public');
            // }
            // $user->image = $request->file('image')->store('staff-image', 'public');
            $user->password = Hash::make($request->get('password'));
            $user->save();
            return redirect()->route('user.index')->with('success_store', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    public function profile()
    {
        $configuration = Configuration::first();
        $user = Auth::user();

        $data = [
            'title'     => 'Halaman Profil Pengguna',
            'konfig'    => $configuration,
            'users'     => $user
        ];

        return view('admin.profile.index', $data);
    }

    public function edit_profile(User $user)
    {
        $configuration = Configuration::first();
        $data = [
            'title'         => 'Form Ubah Profile',
            'konfig'        => $configuration,
            'users'         => $user
        ];
        return view('admin.profile.edit', $data);
    }

    public function update_profile(Request $request, $id)
    {
        $user = User::findOrFail(Auth::user()->id);
        $request->validate([
            'name'      => 'required',
            'email'     => ['required', 'email', 'unique:users,email,' . $id],
            'image'     => ['nullable', 'file', 'image'],
        ]);

        try {
            // if (!empty($validated['password'])) {
            //     $validated['password'] = Hash::make($validated['password']);
            // }



            // $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');

            if ($request->hasFile('image')) {
                Storage::delete(('public/' . $user->image));
                $user->image = $request->file('image')->store('staff-image', 'public');
            }

            $user->save();
            // dd($user);

            return redirect()->route('user.profile')->with('success_update', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function change_password(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $request->validate([
            'current_password'  => ['required', 'string', 'min:8', 'current_password'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        try {
            $currentPasswordStatus = Hash::check($request->current_password, Auth::user()->password);
            if ($currentPasswordStatus) {

                User::findOrFail(Auth::user()->id)->update([
                    'password' => Hash::make($request->password),
                ]);

                return redirect()->route('user.profile')->with('success_update', 'Password Berhasil Diubah');
            } else {
                return redirect()->route('user.profile')->with('message', 'Password Anda saat ini tidak sesuai dengan password Anda yang lama');
            }
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $configuration = Configuration::first();
        $data = [
            'title'         => 'Form Ubah User',
            'konfig'        => $configuration,
            'users'         => $user
        ];
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $user = User::findOrFail($id);
        $request->validate([
            'name'      => 'required',
            'roles'     => 'required',
            'email'     => ['required', 'email', 'unique:users,email,' . $id],
            'password'  => ['nullable', 'min:8', 'confirmed'],
            'image'     => ['nullable', 'file', 'image'],
            'status'    => 'required'
        ]);

        try {
            // if (!empty($validated['password'])) {
            //     $validated['password'] = Hash::make($validated['password']);
            // }



            // $user = new User();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->roles = $request->get('roles');
            $user->status = $request->get('status');
            $password = $request->get('password');

            if (!empty($password)) {
                $user->password = Hash::make($password);
            }

            if ($request->hasFile('image')) {
                Storage::delete(('public/' . $user->image));
                $user->image = $request->file('image')->store('staff-image', 'public');
            }

            $user->save();
            // dd($user);

            return redirect()->route('user.index')->with('success_update', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            // dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        try {
            $user->delete();
            return redirect()->route('user.index')->with('success_delete', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('error', 'Error Deleting : ', $e->getMessage());
        }
    }
}
