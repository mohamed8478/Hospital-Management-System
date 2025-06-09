<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Patient;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReceptionController extends Controller
{
    public function find(Request $request)
    {
        $query = $request->query('query');

        // Actual search
        $patients = Patient::where('name', 'like', "%{$query}%")->get();

        if ($patients->isEmpty()) {
            $noResults = 'No patients found';
            return view('components.reception-table', compact('noResults'))->render();
        }

        $records = '';
        foreach ($patients as $patient) {
            $records .= view('components.reception-table', compact('patient'))->render();
        }

        return $records;
    }

    public function store(Request $request){
        $data =$request->validate([
            'full_name' => 'required|string|max:50',
            'birth_date' => 'required|date',
            'gender' => 'required|string',
            'national_id' => 'nullable|string|max:255',
            'phone' => 'required|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'blood_type' => 'nullable|string|max:3',
            'chronic_diseases' => 'nullable|string',
            'medications' => 'nullable|string',
        ]);

    Patient::create([
            'maladies' => 'No known conditions',
            'name' => $data['full_name'],
            'gender' => $data['gender'],
            'phone_num' => $data['phone'],
            'email' => $data['email'],
            'address' => $data['address'],
            'chronic_conditions' => $data['chronic_diseases'],
            'recep_id' => auth()->user()->id,
        ]);

        return redirect()->route('reception.home')->with([
            'success' => 'patient add successfully'
        ]);

    }
}
