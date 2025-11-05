<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
     public function index()
    {
        $certificates = Certificate::where('student_id', Auth::id())->latest()->get();
        return view('Dashboard.certificate.index', compact('certificates'));
    }

    public function download($id)
    {
        $certificate = Certificate::where('user_id', Auth::id())->findOrFail($id);
        return Storage::disk('public')->download($certificate->certificate_file);
    }

    public function view($id)
    {
        $certificate = Certificate::where('user_id', Auth::id())->findOrFail($id);
        return response()->file(storage_path('app/public/' . $certificate->certificate_file));
    }
}
