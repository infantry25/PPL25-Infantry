<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Configuration;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $configuration  = Configuration::first();
        // dd($configuration);
        $testimonial    = Testimonial::all();
        $klien          = Client::all();
        $project        = Project::with('project_images')->get();
        $staff          = Staff::where('status_staff', 'AKTIF')->orderBy('urutan', 'ASC')->get();
        $service        = Service::orderBY('id_kategori', 'ASC')->get();
        $gallery        = ProjectImage::all();
        $project_images = $gallery->unique('id_project');
        $data = [
            'title'             => 'Home Page',
            'konfig'            => $configuration,
            'testimoni'         => $testimonial,
            'klien'             => $klien,
            'projects'          => $project,
            'staff'             => $staff,
            'services'          => $service,
            'project_images'    => $project_images
        ];
        return view('home', $data);
    }

    public function contact()
    {
        $configuration = Configuration::first();
        $testimonial   = Testimonial::all();
        $project        = Project::with('project_images')->get();
        $gallery        = ProjectImage::all();
        $project_images = $gallery->unique('id_project');
        $data = [
            'title'     => 'Contact Page',
            'konfig'    => $configuration,
            'testimoni' => $testimonial,
            'projects'      => $project,
            'project_images'    => $project_images
        ];
        return view('contact', $data);
    }
}
