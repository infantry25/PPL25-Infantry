<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuration  = Configuration::first();
        $klien          = Client::all();
        // $testimoni = Testimonial::paginate(9);
        $data = [
            'title'     => 'Klien',
            'konfig'    => $configuration,
            'klien'     => $klien
        ];
        return view('admin.client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'id_user'   => '1',
            'nama'      => ['required'],
            'image'     => ['required', 'file', 'image'],
        ]);



        try {
            // $validated['image'] = $request->file('image')->store('client-image', 'public');
            $data = [
                'nama'     => $request->nama,
                'image'    => $request->file('image')->store('client-image', 'public'),
                'id_user'  => Auth::user()->id,
            ];
            // dd($data);

            Client::create($data);
            return redirect()->route('client.index')->with('success_store', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('client.index')->with('error', $e->getMessage());
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            // 'id_user'   => '1',
            'nama'      => ['required'],
            'image'     => ['nullable', 'file', 'image'],
        ]);

        try {
            // $validated['image'] = $request->file('image')->store('client-image', 'public');
            $data = [
                'nama'     => $request->nama,
                // 'image'    => $request->file('image')->store('client-image', 'public'),
                'id_user'  => Auth::user()->id,
            ];
            // dd($data);
            if($request->hasFile('image')){
                Storage::delete(('public/' .$client->image));
                $data['image'] = $request->file('image')->store('client-image', 'public');
            }

            $client->update($data);
            return redirect()->route('client.index')->with('success_update', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->route('client.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            Client::find($id)->delete();
            // return back();
            return redirect()->route('client.index')->with('success_delete', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('client.index')->with('error', $e->getMessage());
        }
    }
}
