<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\api;


class SupplierController extends Controller
{
    // Store new supplier
    public function store(Request $request)
    {
        $request->validate([
            'supplierName' => 'required|string|max:255',
            'address' => 'required|string',
            'taxNo' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'mobileNo' => 'required|digits:10',
            'email' => 'required|email',
            'status' => 'required|string',
        ]);

        Supplier::create([
            'name' => $request->input('supplierName'),
            'address' => $request->input('address'),
            'tax_no' => $request->input('taxNo'),
            'country' => $request->input('country'),
            'mobile_no' => $request->input('mobileNo'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
        ]);

        return response()->json(['message' => 'Supplier added successfully']);
        
    }

    // Fetch all suppliers
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return response()->json(['message' => 'Supplier deleted successfully']);
    }

}
