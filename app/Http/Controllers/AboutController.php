<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Staff;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $configuration  = Configuration::first();
        $staff          = Staff::where('status_staff', 'AKTIF')->orderBy('urutan', 'ASC')->get();
        $testimonial    = Testimonial::all();
        $project        = Project::with('project_images')->get();
        $gallery        = ProjectImage::all();
        $project_images = $gallery->unique('id_project');
        $data = [
            'title'             => 'About Page',
            'konfig'            => $configuration,
            'staff'             => $staff,
            'testimoni'         => $testimonial,
            'projects'          => $project,
            'project_images'    => $project_images
        ];
        return view('about', $data);
    }
}
