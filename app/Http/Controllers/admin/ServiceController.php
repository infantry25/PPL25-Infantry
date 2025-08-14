<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Configuration;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuration  = Configuration::first();
        $kategori       = Category::all();
        $service        = Service::all();
        $data = [
            'title'     => 'Layanan',
            'konfig'    => $configuration,
            'kategori'  => $kategori,
            'services'  => $service
        ];
        return view('admin.service.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $configuration  = Configuration::first();
        $kategori       = Category::get();
        // $testimoni = Testimonial::paginate(9);
        $data = [
            'title'     => 'Halaman Tambah Layanan',
            'konfig'    => $configuration,
            'kategori'  => $kategori
        ];
        return view('admin.service.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user'       => 'required',
            'id_kategori'   => 'required',
            'deskripsi'     => 'required',
            'ringkasan'     => 'required',
            'icon'          => 'required',
            'tagline'       => 'required',
            'image'         => 'required|mimes:png,jpg,jpeg|max:4096',
        ]);

        try {
            $category = Category::findOrFail($request->id_kategori);

            if ($request->file('image') == null) {
                $validated['image'] = '';
            } else {
                $validated['image'] = $request->file('image')->store('layanan-image', 'public');
            }

            $validated['id_user'] = Auth::user()->id;

            // Service::create($validated);

            $category->services()->create($validated);

            // dd($validated);
            return redirect()->route('service.index')->with('success_store', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('service.index')->with('error', $e->getMessage());
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
    public function edit(Service $service)
    {
        $configuration  = Configuration::first();
        $kategori       = Category::get();
        // $testimoni = Testimonial::paginate(9);
        $data = [
            'title'     => 'Form Ubah Layanan',
            'konfig'    => $configuration,
            'kategori'  => $kategori,
            'services'  => $service
        ];
        return view('admin.service.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'id_user'       => 'required',
            'id_kategori'   => 'required',
            'deskripsi'     => 'required',
            'ringkasan'     => 'required',
            'icon'          => 'required',
            'tagline'       => 'required',
            'image'         => 'nullable|mimes:png,jpg,jpeg|max:4096',
        ]);

        try {
            if ($request->hasFile('image')) {
                Storage::delete(('public/' . $service->image));
                $validated['image'] = $request->file('image')->store('layanan-image', 'public');
            }

            $validated['id_user'] = Auth::user()->id;

            // $service = Category::findOrFail($request->id_kategori)
            // ->services()->where('id', $service)->first();
            $service->update($validated);
            return redirect()->route('service.index')->with('success_update', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->route('service.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
            // 2. menghapus file cover dari storage
            if ($service->image) {
                Storage::delete('public/' . $service->cover);
            }
            // 3.hapus data buku
            $service->delete();
            return redirect()->route('service.index')->with('success_delete', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('service.index')->with('error', $e->getMessage());
        }
    }
}
