<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index (){
        $companies = Company::all();
        return view('company.index', compact('companies'));
    }

    public function store(Request $request) 
    {
        $company = new Company;
        $company->code = $request->code;
        $company->name = $request->company_name;
        $company->is_active = "1";
        $company->save();

        return redirect()->back()->with('success', 'Company created successfully.');

    }

    public function update(Request $request, $id) 
    {
        $company = Company::findOrFail($id);
        $company->code = $request->code;
        $company->name = $request->company_name;           $company->save();

        return redirect()->back()->with('success', 'Company updated successfully.');

    }

    public function activate($id)
    {
        $company = Company::findOrFail($id);
        $company->is_active = "1";
        $company->save();

        return redirect()->back()->with('success', 'Company activated successfully.');
    }
    public function deactivate($id)
    {
        $company = Company::findOrFail($id);
        $company->is_active = "2";
        $company->save();

        return redirect()->back()->with('success', 'Company deactivated successfully.');
    }
}
