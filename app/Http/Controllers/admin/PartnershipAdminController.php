<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Partnership;
use Illuminate\Http\Request;
use App\Mail\PartnershipStatusMail;
use Illuminate\Support\Facades\Mail;

class PartnershipAdminController extends Controller
{
    public function index()
    {
        $konfig = Configuration::first(); // Buat title, favicon, dll
        $title = 'Data Partnership'; // Untuk judul halaman
        $partnerships = Partnership::latest()->get();

        return view('admin.partnership.index', compact('partnerships', 'konfig', 'title'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,Disetujui,Ditolak'
        ]);

        $partnership = Partnership::findOrFail($id);
        $partnership->status = $request->status;
        $partnership->save();

        // Kirim Email Notifikasi
        Mail::to($partnership->email)->send(new PartnershipStatusMail($partnership));

        return redirect()->back()->with('success', 'Status berhasil diperbarui dan email notifikasi telah dikirim.');
    }
}
