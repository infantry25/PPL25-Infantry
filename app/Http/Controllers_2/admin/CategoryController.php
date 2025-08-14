<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $configuration  = Configuration::first();
        $kategori       = Category::all();
        // $testimoni = Testimonial::paginate(9);
        $data = [
            'title'     => 'Kategori',
            'konfig'    => $configuration,
            'kategori'  => $kategori
        ];
        return view('admin.category.index', $data);
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
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $request->validate([
            // 'id_user'           => '1',
            'nama_kategori'     => ['required'],
            'slug_kategori'     => ['nullable'],
            'urutan'            => ['required'],
        ]);

        $slug = Str::slug($request->nama_kategori, '-');
        $data = [
            'nama_kategori'     => $request->nama_kategori,
            'slug_kategori'     => $slug,
            'urutan'            => $request->urutan,
            'id_user'           => Auth::user()->id,
            'hits'              => '0'
        ];

        try {
            Category::create($data);
            // dd($data);
            // dd($validated);
            return redirect()->route('category.index')->with('success_store', 'Data Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', $e->getMessage());
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
    public function update(Request $request, Category $category)
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        $request->validate([
            // 'id_user'           => '1',
            'nama_kategori'     => ['required'],
            'slug_kategori'     => ['nullable'],
            'urutan'            => ['required'],
        ]);

        $slug = Str::slug($request->nama_kategori, '-');
        $data = [
            'nama_kategori'     => $request->nama_kategori,
            'slug_kategori'     => Str::slug($request->nama_kategori, '-'),
            'urutan'            => $request->urutan,
            'id_user'           => Auth::user()->id,
            'hits'              => '0'
        ];

        try {
            $category->update($data);
            // dd($data);
            // dd($validated);
            return redirect()->route('category.index')->with('success_update', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Category $category)
    // {
    //     try {
    //         $category->delete();
    //         return redirect()->route('category.index')->with('success_delete', 'Data Berhasil Dihapus');
    //     } catch (\Exception $e) {
    //         return redirect()->route('category.index')->with('error', $e->getMessage());
    //     }
    // }

    public function destroy($id)
    {
        abort_if(!Gate::allows('list-admin'), 403, 'You are not allowed to view this page!');
        try {
            Category::find($id)->delete();
            // return back();
            return redirect()->route('category.index')->with('success_delete', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', $e->getMessage());
        }
    }
}
