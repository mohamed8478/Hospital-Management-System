<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Medication;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PharmacyController extends Controller{
    public function find(Request $request)
    {
        $query = $request->query('query');

        // Actual search
        $medicaments = Medication::where('name', 'like', "%{$query}%")->get();

        if ($medicaments->isEmpty()) {
            $noResults = 'No Medicament found';
            return view('components.pharmacy-table', compact('noResults'))->render();
        }

        $records = '';
        foreach ($medicaments as $medicament) {
            $records .= view('components.pharmacy-table', compact('medicament'))->render();
        }

        return $records;
    }

    public function store(Request $request){
        $data =$request->validate([
            'expiry_date' => 'required|date',
            'med_name' => 'required|string',
            'stock_qnt' => 'required|integer'
        ]);
        $data['expiry_date'] = Carbon::createFromFormat('m/d/Y', $data['expiry_date'])->format('Y-m-d');
    Medication::create([
        'expiry_date' => $data['expiry_date'],
            'name' => $data['med_name'],
            'quantity' => $data['stock_qnt'],
            'pharmacists_id' => null,
        ]);

        if($request->input('action') === 'save and redirect')
            return redirect()->route('pharmacy.home');

        return redirect()->back();

    }
}


