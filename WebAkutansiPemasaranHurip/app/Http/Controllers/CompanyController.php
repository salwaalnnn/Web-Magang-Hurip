<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::first();
        if (!$company) {
            $company = Company::create([
                'namaperusahaan' => '',
                'alamat' => '',
                'notelp' => '',
                'fax' => '',
                'logo' => '',
            ]);
        }

        return view('company.index', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $data = $request->all();

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoPath = $logo->store('logos', 'public');
            $data['logo'] = $logoPath;

            if ($company->logo) {
                Storage::disk('public')->delete($company->logo);
            }
        }

        $company->update($data);

        return redirect()->route('company.index')->with('success', 'Company details updated successfully');
    }
}