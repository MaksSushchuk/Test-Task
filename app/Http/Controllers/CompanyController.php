<?php

namespace App\Http\Controllers;

use App\Events\CompanyCreated as EventsCompanyCreated;
use App\Http\Requests\CompanyRequest;
use App\Jobs\SendCompanyCreatedMailJob;
use App\Mail\CompanyCreated;
use App\Mail\CompanyCreatedMail;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.home',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $validated = $request->validated();
        $company = Company::create($validated);
        Storage::disk('public')->put('logo', $request->file);

        $email = Auth::user()->email;

        SendCompanyCreatedMailJob::dispatch($company,$email);
        return redirect()->route('admin.home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        return view('company.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {
        $validated = $request->validated();
        $company = Company::find($id);

        $company->update($validated);
        return redirect()->route('admin.home');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('admin.home');

    }
}
