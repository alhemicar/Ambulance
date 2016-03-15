<?php

namespace App\Http\Controllers;

use App\MedicalExam;
use App\Patient;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class MedicalsController extends Controller
{
    public function index()
    {
        return view('medicals.index');
    }

    public function getData($type)
    {
        $user = Auth::user();
        if(Auth::check() && $user->IsDoctor())
            return MedicalExam::where('doctor_id', $user->id)->with('patient')->with('doctor')->where('finished', $type)->get();
        else return MedicalExam::with('patient')->with('doctor')->where('finished', $type)->get();
    }

    public function create()
    {
        $patients = Patient::orderBy('last_name', 'asc')->orderBy('name', 'asc')->lists('name', 'id');
        $doctors = User::where('user_role_id', 2)->orderBy('last_name', 'asc')->orderBy('name', 'asc')->lists('name', 'id');
        return view('medicals.create', compact('patients'))->with(compact('doctors'));
    }

    public function show($id)
    {
        $medical = MedicalExam::findOrFail($id);
        $patients = Patient::orderBy('last_name', 'asc')->orderBy('name', 'asc')->lists('name', 'id');
        $doctors = User::where('user_role_id', 2)->orderBy('last_name', 'asc')->orderBy('name', 'asc')->lists('name', 'id');
        return view('medicals.show', compact('medical'))->with(compact('patients'))->with(compact('doctors'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'patient_id' => 'required',
            'date' => 'required',
            'doctor_id' => 'required',
        ]);

        $input = $request->all();

        $input['date'] = Carbon::parse($request->input('date'))->toDateTimeString();

        MedicalExam::create($input);

        return redirect('medicals');
    }

    public function edit($id)
    {
        $medical = MedicalExam::findOrFail($id);

        $patients = Patient::orderBy('last_name', 'asc')->orderBy('name', 'asc')->lists('name', 'id');
        $doctors = User::where('user_role_id', 2)->orderBy('last_name', 'asc')->orderBy('name', 'asc')->lists('name', 'id');

        return view('medicals.edit', compact('medical'))->with(compact('patients'))->with(compact('doctors'));
    }

    public function update($id, Request $request)
    {
        $medicalExam = MedicalExam::findOrFail($id);

        if(Auth::check() && Auth::user()->user_role_id !== 2)
        {
            $this->validate($request, [
                'patient_id' => 'required',
                'date' => 'required',
                'doctor_id' => 'required',
            ]);
        }

        $input = $request->all();

        if(!empty($input->date))
            $input['date'] = Carbon::parse($request->input('date'))->toDateTimeString();

        $medicalExam->update($input);

        return redirect('medicals');
    }

    public function destroy($id)
    {
        MedicalExam::findOrFail($id)->delete();
        return redirect('medicals');
    }
}
