<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Configuration;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuration  = Configuration::first();
        $kategori       = Category::all();
        $service        = Service::all();
        $project        = Project::all();
        $data = [
            'title'     => 'Project',
            'konfig'    => $configuration,
            'kategori'  => $kategori,
            'services'  => $service,
            'projects'  => $project
        ];
        return view('admin.project.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $configuration  = Configuration::first();
        $kategori       = Category::get();
        $data = [
            'title'     => 'Halaman Tambah Project',
            'konfig'    => $configuration,
            'kategori'  => $kategori
        ];
        return view('admin.project.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'id_user'       => 'required',
    //         'id_kategori'   => 'required',
    //         'deskripsi'     => 'required',
    //         'nama'          => 'required',
    //         'lokasi'        => 'required',
    //     ]);

    //     try {
    //         // $category = Category::findOrFail($request->id_kategori);

    //         Project::create($validated);

    //         // $category->services()->create($validated);

    //         // dd($validated);
    //         return redirect()->route('project.index')->with('success_store', 'Data Berhasil Ditambahkan');
    //     } catch (\Exception $e) {
    //         return redirect()->route('project.index')->with('error', $e->getMessage());
    //     }
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_user'       => 'required',
            'id_kategori'   => 'required',
            'deskripsi'     => 'required',
            'nama'          => 'required',
            'lokasi'        => 'required',
            'photos'        => 'required',
        ]);

        if ($request->hasFile('photos')) {
            $allowedfileExtension = ['jpeg', 'jpg', 'png',];
            $files = $request->file('photos');
            foreach ($files as $file) {
                // $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                //dd($check);
                if ($check) {
                    $projects = Project::create($request->all());
                    foreach ($request->photos as $photo) {
                        $filename = $photo->store('project-image', 'public');
                        ProjectImage::create([
                            'id_project' => $projects->id,
                            'image' => $filename
                        ]);
                    }
                    // dd($request->all());
                    return redirect()->route('project.index')->with('success_store', 'Data Berhasil Ditambahkan');
                    // return redirect()->route('project.index')->with('success_store', 'Data Berhasil Ditambahkan');
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png, jpg, jpeg</div>';
                }
            }
        }
    }

    public function store_image(Request $request, $id)
    {
        $this->validate($request, [
            'photos' => 'required',
        ]);
        if ($request->hasFile('photos')) {
            $allowedfileExtension = ['jpg', 'jpeg', 'png'];
            $files = $request->file('photos');
            foreach ($files as $file) {
                // $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);
                //dd($check);
                if ($check) {
                    foreach ($request->photos as $photo) {
                        $project = Project::findOrFail($id);
                        $filename = $photo->store('project-image', 'public');
                        ProjectImage::create([
                            'id_project'    => $project->id,
                            'image'         => $filename
                        ]);
                    }
                    return redirect()->back()->with('success_store', 'Data Berhasil Ditambahkan');
                    // return redirect()->route('project.index')->with('success_store', 'Data Berhasil Ditambahkan');
                } else {
                    echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png, jpg, jpeg</div>';
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $configuration = Configuration::first();
        $project = Project::where('id', $id)->first();
        $project_images = ProjectImage::where('id_project', $project->id)->get();
        $data = [
            'title'             => 'Halaman Galeri Project',
            'konfig'            => $configuration,
            'projects'          => $project,
            'project_images'    => $project_images
        ];
        return view('admin.project.galeri', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $configuration  = Configuration::first();
        $kategori       = Category::get();
        $data = [
            'title'     => 'Halaman Ubah Project',
            'konfig'    => $configuration,
            'kategori'  => $kategori,
            'projects'  => $project
        ];
        return view('admin.project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'id_user'       => 'required',
            'id_kategori'   => 'required',
            'deskripsi'     => 'required',
            'nama'          => 'required',
            'lokasi'        => 'required',
        ]);

        try {
            // $category = Category::findOrFail($request->id_kategori);

            $validated['id_user'] = Auth::user()->id;

            $project->update($validated);

            // $category->services()->create($validated);

            // dd($validated);
            return redirect()->route('project.index')->with('success_update', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect()->route('project.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        try {
            if ($project->image) {
                Storage::delete('public/' . $project->image);
            }
            $project->project_images()->delete();
            $project->delete();
            return redirect()->route('project.index')->with('success_delete', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('project.index')->with('error', $e->getMessage());
        }
    }

    // public function destroy_image(ProjectImage $projectImage, $id)
    public function destroy_image(ProjectImage $projectImage)
    {
        try {
            // 2. menghapus file cover dari storage
            if ($projectImage->image) {
                Storage::delete('public/' . $projectImage->image);
            }
            // 3.hapus data buku
            $projectImage->delete();
            // dd($projectImage);
            return redirect()->back()->with('success_delete', 'Data Berhasil Dihapus');
            // return redirect()->route('project.index')->with('success_delete', 'Data Berhasil Dihapus');
        } catch (\Exception $e) {
            return redirect()->route('project.index')->with('error', $e->getMessage());
        }
    }
}
