<?php

namespace App\Http\Controllers;

Use App\Models\AccForm;

use Illuminate\Http\Request;

class AccFormController extends Controller
{
public function index()
    {
        $acc_forms = AccForm::paginate(6);
        return view('admin.accform.index', compact('acc_forms'));
    }

    public function create()
    {
        return view('accform.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'form_name' => 'required',
            'avail_forms' => 'required',
            'avail_serialno_from' => 'required',
            'avail_serialno_to' => 'required',
        ]);

        AccForm::create($request->all());

        return redirect()->route('accform.index')->with('success', 'Accountable Forms added successfully.');
    }

    public function show(AccForm $accform)
    {
        return view('accform.show', compact('acc_form'));
    }

    public function edit(AccForm $accform)
    {
        return view('accform.edit',compact('accform'));
    }

    public function update(Request $request, AccForm $accform)
    {
        $request->validate([
            'form_name' => 'required',
            'avail_forms' => 'required',
            'avail_serialno_from' => 'required',
            'avail_serialno_to' => 'required',
        ]);

        $accform->update($request->all());


        return redirect()->route('accform.index')->with('success','AccForm updated successfully');
    }

    public function destroy(AccForm $accform)
    {
        $accform->delete();

        return redirect()->route('accform.index')->with('success','AccForm deleted successfully');
    }
}
