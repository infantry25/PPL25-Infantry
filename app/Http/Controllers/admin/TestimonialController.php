<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuration = Configuration::first();
        // $testimoni = Testimonial::paginate(9);
        $data = [
            'title'     => 'Testimoni Client',
            'konfig'    => $configuration,
            'testimoni' => Testimonial::paginate(3)
        ];
        return view('admin.testimoni.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $configuration = Configuration::first();
        $data = [
            'title' => 'Form Tambah Testimoni Client',
            'konfig' => $configuration,
        ];
        return view('admin.testimoni.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required',
            'pekerjaan' => 'required',
            'komentar'  => 'required',
            'image'     => ['nullable', 'file', 'image'],
            'id_user'   => ['required']
        ]);

        try {

            if ($request->file('image') == null) {
                $validated['image'] = '';
            } else {
                $validated['image'] = $request->file('image')->store('testimonial-image', 'public');
            }

            $validated['id_user'] = Auth::user()->id;

            Testimonial::create($validated);
            return redirect()->route('testimonial.index')->with('success_store', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('testimonial.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        $configuration = Configuration::first();
        $data = [
            'title'         => 'Form Ubah Testimoni Client',
            'konfig'        => $configuration,
            'testimonial'   => $testimonial
        ];
        return view('admin.testimoni.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'nama'      => 'required',
            'pekerjaan' => 'required',
            'komentar'  => 'required',
            'image'     => ['nullable', 'file', 'image']
            // ,'id_user'   => 'required'
        ]);

        try {
            if ($request->hasFile('image')) {
                Storage::delete(('public/' . $testimonial->image));
                $validated['image'] = $request->file('image')->store('testimonial-image', 'public');
            }
            $validated['id_user'] = Auth::user()->id;

            $testimonial->update($validated);

            return redirect()->route('testimonial.index')->with('success_update', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        try {
            // 2. menghapus file cover dari storage
            if ($testimonial->image) {
                Storage::delete('public/' . $testimonial->image);
            }
            // 3.hapus data buku
            $testimonial->delete();
            return redirect()->route('testimonial.index')->with('success_delete', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('testimonial.index')->with('error', 'Error Deleting : ', $e->getMessage());
        }
    }
}
