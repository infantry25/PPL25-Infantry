<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuration = Configuration::first();
        $staff          = Staff::orderBy('urutan', 'ASC')->paginate(2);
        // $staff          = $staff->sortBy('urutan');
        $data = [
            'title'     => 'Team kami',
            'konfig'    => $configuration,
            'staff'     => $staff
        ];
        return view('admin.staff.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $configuration = Configuration::first();
        $staff          = Staff::orderBy('urutan', 'ASC')->paginate(3);
        $data = [
            'title' => 'Form Tambah Team',
            'konfig' => $configuration,

        ];
        return view('admin.staff.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'          => 'required',
            'jabatan'       => 'required',
            'email'         => ['required', 'email', 'unique:staff'],
            'instagram'     => 'required',
            'telepon'       => ['required', 'min:11'],
            // 'status_staff'  => 'required',
            'urutan'        => 'required',
            'image'         => ['nullable', 'file', 'image'],
            'id_user'       => ['required']
        ]);

        try {
            if ($request->file('image') == null) {
                $validated['image'] = '';
            } else {
                $validated['image'] = $request->file('image')->store('staff-image', 'public');
            }
            // $validated['status_staff'] = 'Aktif';
            $validated['id_user'] = Auth::user()->id;

            Staff::create($validated);
            return redirect()->route('staff.index')->with('success_store', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('staff.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        $configuration = Configuration::first();
        $data = [
            'title'         => 'Form Ubah Team',
            'konfig'        => $configuration,
            'staff'         => $staff
        ];
        return view('admin.staff.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'nama'          => 'required',
            'jabatan'       => 'required',
            'email'         => ['required', 'email', 'unique:staff,email,' . $staff->id],
            'instagram'     => 'required',
            'telepon'       => ['required', 'min:11'],
            'status_staff'  => 'required',
            'urutan'        => 'required',
            'image'         => ['nullable', 'file', 'image'],
            'id_user'       => ['required']
        ]);

        try {
            if($request->hasFile('image')){
                Storage::delete(('public/' .$staff->image));
                $validated['image'] = $request->file('image')->store('staff-image', 'public');
            }
            $validated['id_user'] = Auth::user()->id;
            
            $staff->update($validated);
            return redirect()->route('staff.index')->with('success_update', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->route('staff.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        try {
            // 2. menghapus file cover dari storage
            if ($staff->image) {
                Storage::delete('public/' .$staff->image);
            }
            // 3.hapus data buku
            $staff->delete();
            return redirect()->route('staff.index')->with('success_delete', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('staff.index')->with('error', 'Error Deleting : ', $e->getMessage());
        }
    }
}
