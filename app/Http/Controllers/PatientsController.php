<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Place;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PatientsController extends Controller
{
    public function __construct()
    {
        if(!Auth::check() || Auth::user()->IsDoctor())
        {
            abort(404);
        }
    }

    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        $places = Place::lists('name', 'id');
        return view('patients.create', compact('places'));
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        $places = Place::lists('name', 'id');
        return view('patients.show', compact('patient'))->with(compact('places'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'last_name' => 'required|min:3|max:100',
            'umsn' => 'required|min:13|max:13',
            'place_id' => 'required',
        ]);

        $input = $request->all();

        Patient::create($input);

        return redirect('patients');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $places = Place::lists('name', 'id');

        return view('patients.edit', compact('patient'))->with(compact('places'));
    }

    public function update($id, Request $request)
    {
        $patient = Patient::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'umsn' => 'required|max:255',
            'place_id' => 'required',
        ]);

        $input = $request->all();

        $patient->update($input);

        return redirect('patients');
    }

    public function destroy($id)
    {
        Patient::findOrFail($id)->delete();
        return redirect('patients');
    }
}
