<?php

namespace App\Http\Controllers;

use App\Place;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PlacesController extends Controller
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
        $places = Place::orderby('name', 'asc')->get();
        return view('places.index', compact('places'));
    }

    public function create()
    {
        return view('places.create');
    }

    public function show($id)
    {
        $place = Place::findOrFail($id);
        return view('places.show', compact('place'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:200',
        ]);

        $input = $request->all();

        Place::create($input);

        return redirect('places');
    }

    public function edit($id)
    {
        $place = Place::findOrFail($id);

        return view('places.edit', compact('place'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:200',
        ]);

        $place = Place::findOrFail($id);

        $input = $request->all();

        $place->update($input);

        return redirect('places');
    }

    public function destroy($id)
    {
        Place::findOrFail($id)->delete();
        return redirect('places');
    }
}
