<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Configuration;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $configuration = Configuration::first();
        $testimonial    = Testimonial::all();
        $klien          = Client::all();
        $project        = Project::with('project_images')->get();
        $staff          = Staff::orderBy('urutan', 'ASC')->get();
        $service        = Service::orderBY('id_kategori', 'ASC')->get();
        $project_images = ProjectImage::select('image')->distinct()->get();
        $data = [
            'title'             => 'Dashboard Admin',
            'konfig'            => $configuration,
            'testimoni'         => $testimonial,
            'klien'             => $klien,
            'projects'          => $project,
            'staff'             => $staff,
            'services'          => $service,
            'project_images'    => $project_images
        ];
        return view('admin.dashboard.index', $data);
    }
}
