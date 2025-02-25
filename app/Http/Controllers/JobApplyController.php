<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplyRequest;
use App\Mail\JobApplyMail;
use App\Models\Career;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class JobApplyController extends Controller
{
    public function index(Career $career): View
    {
        return view('pages.careers.job-apply', compact('career'));
    }

    public function store(Career $career, JobApplyRequest $request): RedirectResponse
    {
        $cv = $request->file('uploadCv');
        $cvPath = $cv->store('job_applications', ['disk' => 'local']);
        $cvName = $cv->getClientOriginalName();

        Mail::send(new JobApplyMail($request->safe()->toArray(), $cvPath, $cvName));
        Storage::disk('local')->delete($cvPath);

        return redirect(route('careers.index', $career))
            ->with('success', 'Thank you for contacting us, we will get in touch with you shortly!');
    }
}
