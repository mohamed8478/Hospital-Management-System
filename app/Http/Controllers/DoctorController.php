<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Doctor;
use App\Models\Medication;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class DoctorController extends Controller
{
    public function find(Request $request)
    {
        $query = $request->query('query');

        // Actual search
        if(!empty($query)){
            $patients = Patient::where('name', 'like', "%{$query}%")->get();
        }

        if ($patients->isEmpty()) {
            $noResults = 'No patients found';
            return view('components.doctor-table', compact('noResults'))->render();
        }

        $records = '';
        foreach ($patients as $patient) {
            $records .= view('components.doctor-table', compact('patient'))->render();
        }

        return $records;
    }

    public function findMedicament (Request $request){
        $query = $request->query('query');

        // Actual search
        if(!empty($query)){
            $medications = Medication::where('name', 'like', "%{$query}%")->get();
        }
        if ($medications->isEmpty()) {
            $noResults = 'No medications found';
            return view('components.medication-list', compact('noResults'))->render();
        }


        $records = '';
        foreach ($medications as $medication) {
            $records .= view('components.medication-list', compact('medication'))->render();
        }

        return $records;

    }



    public function showHistory(Patient $patient)
    {
        $patientData = $patient->load([
            'prescriptions' => function ($query) {
                $query->orderBy('created_at', 'desc'); // Sort prescriptions from newest to oldest
            },
            'prescriptions.doctor:id,name,specialization',
            'prescriptions.medications:id,name'
        ]);

        $doctorVisits = []; // Track visit count per doctor (sorted)
        $prescriptionVisits = []; // Store prescriptions with their visit count

        // Step 1: Count how many times the patient visited each doctor
        foreach ($patientData->prescriptions as $prescription) {
            $doctorId = $prescription->doctor->id;

            if (!isset($doctorVisits[$doctorId])) {
                $doctorVisits[$doctorId] = 0;
            }
            $doctorVisits[$doctorId]++;
        }

        // Step 2: Assign visit numbers in DESCENDING order
        $doctorCurrentVisit = []; // Track descending visit numbers per doctor

        foreach ($patientData->prescriptions as $prescription) {
            $doctorId = $prescription->doctor->id;

            if (!isset($doctorCurrentVisit[$doctorId])) {
                $doctorCurrentVisit[$doctorId] = $doctorVisits[$doctorId]; // Start from the highest number
            }

            $prescriptionVisits[] = [
                'id' => $prescription->id,
                'doctor' => $prescription->doctor,
                'visit_number' => $doctorCurrentVisit[$doctorId], // Assign the highest visit number first
                'date' => $prescription->created_at,
                'medications' => $prescription->medications
            ];

            $doctorCurrentVisit[$doctorId]--; // Decrease the visit number for this doctor
        }

        return view('doctor.patient-history', compact('patient', 'prescriptionVisits'));
    }




    public function store(Request $request, $id)
    {
        $data = $request->validate([
            'selectedMedications.*.name' => 'required|string',
            'selectedMedications.*.quantity' => 'required|integer|min:1|max:10',
            'selectedMedications.*.frequence' => 'nullable|string|max:255',
            'doctor_notes' => 'nullable|string',
            'instruction' => 'nullable|string',
            'date' => 'nullable|date',
            'duree' => 'required|string',
        ]);

        // Find the patient by ID
        $patient = Patient::find($id);

        // Get the authenticated user and find the corresponding doctor
        $doctor = Doctor::find(Auth::user()->id);  // Use user ID here

        // Fetch the data from validated input
        $selectedMedications = $data['selectedMedications'] ?? null;
        $doctorNotes = $data['doctor_notes'];
        $instruction = $data['instruction'];
        $nextDate = $data['date'];
        $date = date('Y-m-d');
        $duree = $data['duree'];
        $followupDate = isset($data['date']) ? Carbon::createFromFormat('d/m/Y', $data['date'])->format('Y-m-d') : null;
        $prescription = Prescription::create([
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'Duree_du_trait' => $data['duree'],
            'followup_date' => $followupDate,
            'doctor_notes' => $data['doctor_notes'] ?? null,
            'additional_instructions' => $data['instruction'] ?? null,
        ]);


        foreach ($selectedMedications as $medData) {
            $medication = Medication::where('name', $medData['name'])->first();
            if(!$medication)
                return response()->json(["error" => "Medication Not available"]);
            $prescription->medications()->attach($medication->id, [
                'quantity' => $medData['quantity']
            ]);
            $medication->decrement('quantity', $medData['quantity']);
        }

        // Generate the PDF view with compacted data
        $pdf = Pdf::loadView('doctor.priscription-pdf', compact('doctorNotes', 'selectedMedications', 'instruction', 'duree', 'nextDate', 'patient', 'doctor'));



        return $pdf->stream();
    }

















    // public function store(Request $request){
    //     $data =$request->validate([
    //         'full_name' => 'required|string|max:50',
    //         'birth_date' => 'required|date',
    //         'gender' => 'required|string',
    //         'national_id' => 'nullable|string|max:255',
    //         'phone' => 'required|max:255',
    //         'email' => 'nullable|email|max:255',
    //         'address' => 'nullable|string',
    //         'blood_type' => 'nullable|string|max:3',
    //         'chronic_diseases' => 'nullable|string',
    //         'medications' => 'nullable|string',
    //     ]);

    // Patient::create([
    //         'maladies' => 'No known conditions',
    //         'name' => $data['full_name'],
    //         'gender' => $data['gender'],
    //         'phone_num' => $data['phone'],
    //         'email' => $data['email'],
    //         'address' => $data['address'],
    //         'chronic_conditions' => $data['chronic_diseases'],
    //         'recep_id' => auth()->user()->id,
    //     ]);

    //     return redirect()->route('reception.home')->with([
    //         'success' => 'patient add successfully'
    //     ]);

    // }
}
