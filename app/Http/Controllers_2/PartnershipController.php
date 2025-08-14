<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\Staff;
use App\Models\Testimonial;
use App\Models\Partnership;
use Illuminate\Http\Request;
use App\Mail\PartnershipTicketMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class PartnershipController extends Controller
{
    // Tampilkan form pengajuan partnership
    public function create()
    {
        $konfig = Configuration::first();
        return view('partnership.create', compact('konfig'));
    }

    // Simpan pengajuan partnership
    public function store(Request $request)
    {
        $konfig = Configuration::first();

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'perihal' => 'required|string|max:255',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $kodeTiket = strtoupper(Str::random(8));

        $filePath = $request->file('file') ? $request->file('file')->store('partnership-files', 'public') : null;

        $partnership = Partnership::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'perihal' => $request->perihal,
            'file' => $filePath,
            'kode_tiket' => $kodeTiket,
            'status' => 'Pending',
        ]);

        // Kirim email kode tiket ke user
        Mail::to($request->email)->send(new PartnershipTicketMail($partnership));

        return redirect()->back()->with('success', 'Pengajuan berhasil! Kode Tiket Anda: ' . $kodeTiket);
    }

    // Tampilkan form tracking
    public function tracking()
    {
        $konfig = Configuration::first();
        return view('partnership.tracking', compact('konfig'));
    }

    // Cek status partnership berdasarkan kode tiket
    public function checkStatus(Request $request)
    {
        $konfig = Configuration::first();

        $request->validate([
            'kode_tiket' => 'required|string',
        ]);

        $partnership = Partnership::where('kode_tiket', $request->kode_tiket)->first();

        return view('partnership.result', compact('partnership', 'konfig'));
    }
}
