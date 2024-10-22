<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SupplierController;
use App\Models\Supplier;
use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(Request $request)
    {
        // Check if files are being uploaded
        if (!$request->hasFile('images')) {
            return response()->json(['error' => 'No files uploaded'], 400);
        }
    
        $request->validate([
            'name' => 'required|string|max:255',
            'inventory_location' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'supplier_id' => 'required|exists:suppliers,id',
            'stock_unit' => 'required|string',
            'unit_price' => 'required|numeric',
            'images' => 'nullable|array',
            'status' => 'required|string',
        ]);
    
        $images = $request->file('images');
        $imagePaths = [];
    
        // Check if files are valid and store them
        if ($images) {
            foreach ($images as $image) {
                if ($image->isValid()) {
                    $imagePaths[] = $image->store('item_images', 'public');
                }
            }
        }
    
        // Store item data in the database
        $item = Item::create([
            'name' => $request->input('name'),
            'inventory_location' => $request->input('inventory_location'),
            'brand' => $request->input('brand'),
            'category' => $request->input('category'),
            'supplier_id' => $request->input('supplier_id'),
            'stock_unit' => $request->input('stock_unit'),
            'unit_price' => $request->input('unit_price'),
            'images' => implode(',', $imagePaths), // Store the image paths
            'status' => $request->input('status'),
        ]);
    
        return response()->json(['message' => 'Item added successfully', 'item' => $item]);
    }
        public function index()
    {
        $items = Item::with('supplier')->get();
        return response()->json($items);
    }
    
 // In SupplierController.php

 public function getActiveSuppliers()
 {
     try {
         $suppliers = Supplier::where('status', 'Active')->get();
        
         return response()->json($suppliers);
     } catch (\Exception $e) {
         return response()->json(['error' => 'Unable to fetch suppliers'], 500);
     }
 }
 
 public function destroy($id)
{
    $item = Item::find($id);
    if (!$item) {
        return response()->json(['message' => 'Item not found'], 404);
    }

    try {
        $item->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Failed to delete item', 'error' => $e->getMessage()], 500);
    }
}

}