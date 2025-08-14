<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index () {
        $configuration  = Configuration::first();
        $service        = Service::all();
        $testimonial    = Testimonial::all();
        $project        = Project::with('project_images')->get();
        $gallery        = ProjectImage::all();
        $project_images = $gallery->unique('id_project');
        $data = [
            'title'     => 'Service Page',
            'konfig'    => $configuration,
            'services'  => $service,
            'testimoni' => $testimonial,
            'projects'      => $project,
            'project_images'    => $project_images
        ];
        return view('service', $data);
    }

    public function show($id, $slug)
    {
        $configuration = Configuration::first();
        $service = Service::where('id',$id)->first();
        $data = [
            'title'     => 'Service Detail Page',
            'konfig'    => $configuration,
            'service'   => $service
        ];
        return view('service_detail', $data);
    }
}
