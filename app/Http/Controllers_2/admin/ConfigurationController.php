<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $configuration = Configuration::first();
        $data = [
            'title' => 'Data Konfigurasi',
            'konfig' => $configuration,
        ];
        return view('admin.konfigurasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $configuration = Configuration::first();
        $data = [
            'title' => 'Data Konfigurasi',
            'konfig' => $configuration,
        ];
        return view('admin.konfigurasi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $validated = $request->validate([
            // 'id_user'           => '1',
            'nama_web'          => ['required'],
            'nama_singkat'      => ['required'],
            'tagline'           => ['required'],
            'tagline_2'         => ['required'],
            'tentang'           => ['required'],
            'deskripsi'         => ['required'],
            'website'           => ['nullable'],
            'email'             => ['required', 'email'],
            'alamat'            => ['required'],
            'google_map'        => ['required'],
            'telepon'           => ['required', 'numeric', 'min:11'],
            'hp'                => ['required', 'numeric', 'min:11'],
            'keywords'          => ['required'],
            'meta_text'         => ['required'],
            'facebook'          => ['nullable'],
            'twitter'           => ['nullable'],
            'instagram'         => ['required'],
            'nama_facebook'     => ['nullable'],
            'nama_twitter'      => ['nullable'],
            'nama_instagram'    => ['required']
        ]);

        try {
            // Configuration::create($validated);
            $validated['id_user'] = Auth::user()->id;
            DB::table('configurations')->where('id', $request->id)->update($validated);
            // dd($validated);
            // Configuration::create($validated);
            // Configuration::where('id', $validated->id)->update($validated);
            // dd($request);
            return redirect()->route('configuration.index')->with('success_store', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('configuration.index')->with('error', $e->getMessage());
        }
    }

    // public function store(Request $request)
    // {
    //     request()->validate([
    //         'id_user'           => ['required'],
    //         'nama_web'          => ['required'],
    //         'nama_singkat'      => ['required'],
    //         'tagline'           => ['required'],
    //         'tagline_2'         => ['required'],
    //         'tentang'           => ['required'],
    //         'deskripsi'         => ['required'],
    //         'website'           => ['nullable'],
    //         'email'             => ['required', 'email'],
    //         'alamat'            => ['required'],
    //         'google_map'        => ['required'],
    //         'telepon'           => ['required', 'numeric', 'min:11'],
    //         'hp'                => ['required', 'numeric', 'min:11'],
    //         'keywords'          => ['required'],
    //         'meta_text'         => ['required'],
    //         'facebook'          => ['nullable'],
    //         'twitter'           => ['nullable'],
    //         'instagram'         => ['required'],
    //         'nama_facebook'     => ['nullable'],
    //         'nama_twitter'      => ['nullable'],
    //         'nama_instagram'    => ['required']
    //     ]);

    //     try {
    //         DB::table('configurations')->where('id', $request->id)->update([
    //             // 'id_user'           => $request->id_user,
    //             'tentang'           => $request->tentang,
    //             'deskripsi'         => $request->deskripsi,
    //             'nama_web'          => $request->nama_web,
    //             'nama_singkat'      => $request->nama_singkat,
    //             'tagline'           => $request->tagline,
    //             'tagline_2'         => $request->tagline_2,
    //             // 'website'           => $request->website,
    //             'email'             => $request->email,
    //             'alamat'            => $request->alamat,
    //             'google_map'        => $request->google_map,
    //             'telepon'           => $request->telepon,
    //             'hp'                => $request->hp,
    //             'keywords'          => $request->keywords,
    //             'meta_text'         => $request->meta_text,
    //             'facebook'          => $request->facebook,
    //             'twitter'           => $request->twitter,
    //             'instagram'         => $request->instagram,
    //             'nama_facebook'     => $request->nama_facebook,
    //             'nama_twitter'      => $request->nama_twitter,
    //             'nama_instagram'    => $request->nama_instagram
    //         ]);
    //         // Configuration::create($validated);
    //         // Configuration::where('id', $validated->id)->update($validated);
    //         // dd($request);
    //         return redirect()->route('admin-dashboard')->with('success_store', 'Data Berhasil Ditambahkan');
    //     } catch (\Exception $e) {
    //         return redirect()->route('configuration.index')->with('error', $e->getMessage());
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Configuration $configuration)
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $validated = $request->validate([
            'id_user'           => ['required'],
            'nama_web'          => ['required'],
            'nama_singkat'      => ['required'],
            'tagline'           => ['required'],
            'tagline_2'         => ['required'],
            'tentang'           => ['required'],
            'deskripsi'         => ['required'],
            'website'           => ['nullable'],
            'email'             => ['required', 'email'],
            'alamat'            => ['required'],
            'google_map'        => ['required'],
            'telepon'           => ['required', 'numeric', 'min:11'],
            'hp'                => ['required', 'numeric', 'min:11'],
            'keywords'          => ['required'],
            'meta_text'         => ['required'],
            'facebook'          => ['nullable'],
            'twitter'           => ['nullable'],
            'instagram'         => ['required'],
            'nama_facebook'     => ['nullable'],
            'nama_twitter'      => ['nullable'],
            'nama_instagram'    => ['required']
        ]);

        try {
            // $configuration->update($validated);
            dd($validated);
            return redirect()->route('configuration.index')->with('success_store', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('configuration.index')->with('error', $e->getMessage());
        }
    }

    public function create_logo()
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $configuration = Configuration::first();
        $data = [
            'title' => 'Konfigurasi Logo',
            'konfig' => $configuration,
        ];
        return view('admin.konfigurasi.logo', $data);
    }

    public function proses_logo(Request $request)
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $validated = $request->validate([
            'logo'     => ['nullable', 'file', 'image']
        ]);

        $configuration = Configuration::first();

        try {
            if($request->hasFile('logo')){
                Storage::delete(('public/' .$configuration->logo));
                $validated['logo'] = $request->file('logo')->store('konfigurasi-image', 'public');
            }
            DB::table('configurations')->where('id', $request->id)->update([
                'id_user'   => Auth::user()->id,
                'logo'      => $validated['logo']
            ]);
            // $configuration->update($validated);
            // dd($validated);
            return redirect()->route('konfigurasi-logo')->with('success_store', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('konfigurasi-logo')->with('error', $e->getMessage());
        }
    }

    public function create_icon()
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $configuration = Configuration::first();
        $data = [
            'title' => 'Konfigurasi Icon',
            'konfig' => $configuration,
        ];
        return view('admin.konfigurasi.icon', $data);
    }

    public function proses_icon(Request $request)
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $validated = $request->validate([
            'icon'     => ['nullable', 'file', 'image']
        ]);

        $configuration = Configuration::first();

        try {
            if($request->hasFile('icon')){
                Storage::delete(('public/' .$configuration->icon));
                $validated['icon'] = $request->file('icon')->store('konfigurasi-image', 'public');
            }
            DB::table('configurations')->where('id', $request->id)->update([
                'id_user'   => Auth::user()->id,
                'icon'      => $validated['icon']
            ]);
            // $configuration->update($validated);
            // dd($validated);
            return redirect()->route('konfigurasi-icon')->with('success_store', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('konfigurasi-icon')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
