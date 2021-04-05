<?php

namespace App\Http\Controllers;

use App\Candidates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
//use App\Http\Controllers\CandidatesController;

class CandidatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['candidate'] = Candidates::paginate(5);

        //************** SE LE DICE AL CONTROLADOR EMPLEADOS LA RUTA QUE VA A MOSTRAR EN LA VISTA iPASANDO LA VARIABLE DATOS*/
        return view('candidate.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidate.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* $campos = [
            'name' => 'required|string|max:100',
            'surename' => 'required|string|max:100',

            'photo' => 'required|max:10000|mimes:jpeg,png,jpg'
        ];
        $Mensaje = ["required" => 'El :attribute es requerido'];
        $this->validate($request, $campos, $Mensaje); */
        // $dataCandidate = request()->all();
        $dataCandidate = request()->except('_token');
        if ($request->hasFile('photo')) {
            $dataCandidate['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        Candidates::insert($dataCandidate);
        // return response()->json($dataCandidate);
        return redirect('candidate')->with('Mensaje', 'Successfully Modified Candidate');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function show(Candidates $candidates)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidates::findOrFail($id);

        return view('candidate.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidates  $candidates
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $dataCandidate = request()->except('_token', '_method');

        if ($request->hasFile('photo')) {
            $candidate = Candidates::findOrFail($id);
            Storage::delete('public/' . $candidate);
            $dataCandidate['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        Candidates::where('id', '=', '$id')->update($dataCandidate);
        $candidate = Candidates::findOrFail($id);
        return view('candidate.edit', compact('candidate'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidates  $candidates
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = candidates::findOrFail($id);
        if (Storage::delete('public/' . $candidate->photo)) {
            candidates::destroy($id);
        }
        //METODO PARA ELIMINAR REGISTRO
        return redirect('candidate')->with('Mensaje', 'Successful Eliminated Candidate');
    }
}
