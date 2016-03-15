<?php

namespace App\Http\Controllers;

use App\DoctorType;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DoctorTypesController extends Controller
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
        $doctorTypes = DoctorType::all();
        return view('doctorTypes.index', compact('doctorTypes'));
    }

    public function create()
    {
        return view('doctorTypes.create');
    }

    public function show($id)
    {
        $doctorType = DoctorType::findOrFail($id);
        return view('doctorTypes.show', compact('doctorType'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:200',
        ]);

        $input = $request->all();

        DoctorType::create($input);

        return redirect('doctorTypes');
    }

    public function edit($id)
    {
        $doctorType = DoctorType::findOrFail($id);

        return view('doctorTypes.edit', compact('doctorType'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:200',
        ]);

        $doctorType = DoctorType::findOrFail($id);

        $input = $request->all();

        $doctorType->update($input);

        return redirect('doctorTypes');
    }

    public function destroy($id)
    {
        DoctorType::findOrFail($id)->delete();
        return redirect('doctorTypes');
    }
}
