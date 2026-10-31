<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{

    public function index(Request $request)
    {
       $type = $request->query('type');

        $query = Medicine::query();

        if ($type) {
            $query = $query->where('type', $type);
        }

        $medicines = $query->get();
         return view('medicines.index', compact('medicines'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

        'name' => 'required|max:100',
        'stock' => 'required|integer|min:1',
        'expiry_date' => 'required',
        'type' => 'required|max:100|in:Capsule,Tablet,Syrup',
        'is_available' => 'required|boolean',
        ]);

        Medicine::create($validated);

        return redirect()->route('medicines.index')
            ->with('success', 'Medicine added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id = 5)
    {
        $medicines = Medicine::findOrFail($id);
        return view('medicines.show', compact('medicines'));    
       

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function filter($type = null)
    {

        $medicines = $this->medicines();
        $result = [];

       foreach ($medicines as $medicine) {
                if ($type == null) {
                    $result[] = $medicine;
                } elseif ($medicine['type'] == $type) {
                    $result[] = $medicine;
                }
            }

            return view('medicines.filter', [
                'medicines' => $result,
                'filter' => $type,
            ]);

    }


}

