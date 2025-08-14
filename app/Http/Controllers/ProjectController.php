<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Configuration;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // public function index () {
    //     $configuration = Configuration::first();
    //     $category       = Category::all();
    //     $testimonial    = Testimonial::all();
    //     $project        = Project::with('project_images')->get();
    //     $gallery        = ProjectImage::all();
    //     $project_images = $gallery->unique('id_project');
    //     $data = [
    //         'title'         => 'Project Page',
    //         'konfig'        => $configuration,
    //         'categories'    => $category,
    //         'projects'      => $project,
    //         'testimoni'     => $testimonial,
    //         'project_images'    => $project_images
    //     ];
    //     return view('project', $data);
    // }


    public function index()
    {
        $configuration = Configuration::first();
        $testimonial = Testimonial::all();

        // Ambil project dengan relasi kategori & gambar
        $projects = Project::with(['categories', 'project_images'])->get();

        // Ambil hanya kategori yang dipakai oleh project (unik)
        // $usedCategories = $projects->pluck('categories')->unique('id');
        $usedCategoryIds = $projects->pluck('categories.id')->unique();
        $usedCategories = Category::whereIn('id', $usedCategoryIds)->orderBy('urutan')->get();


        $data = [
            'title' => 'Project Page',
            'konfig' => $configuration,
            'categories' => $usedCategories, // hanya kategori yang digunakan
            'projects' => $projects,
            'testimoni' => $testimonial
        ];

        return view('project', $data);
    }
    public function show(string $id)
    {
        $configuration  = Configuration::first();
        $project = Project::with('project_images')->findOrFail($id);
        // $project_images = ProjectImage::where('id_project', $id)->get();
        $gallery        = ProjectImage::all();
        $project_images = $gallery->unique('id_project');
        $data = [
            'title'             => 'Gallery Project Page',
            'konfig'            => $configuration,
            'projects'          => $project,
            'project_images'    => $project_images
        ];
        return view('project_gallery', $data);
    }
}
