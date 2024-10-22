<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Supplier;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders (optional, if you want to list all orders).
     */
    public function index()
    {
        // You can return all orders if needed, or show them in a view
        $orders = Order::with('supplier')->get(); // Include supplier info

        return response()->json($orders);
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'order_date' => 'required|date',
            'supplier_id' => 'required|exists:suppliers,id', // Supplier must exist in the suppliers table
            'item_total' => 'required|numeric',
            'discount' => 'required|numeric',
            'net_amount' => 'required|numeric',
        ]);

        // Create a new Order
        try {
            $order = new Order();
            $order->order_date = $validatedData['order_date'];
            $order->supplier_id = $validatedData['supplier_id'];
            $order->item_total = $validatedData['item_total'];
            $order->discount = $validatedData['discount'];
            $order->net_amount = $validatedData['net_amount'];
            $order->save();

            return response()->json([
                'message' => 'Order saved successfully',
                'order' => $order
            ], 200);

        } catch (\Exception $e) {
            // Return error if something goes wrong
            return response()->json([
                'message' => 'Failed to save order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy($id)
    {
        // Find the order by ID
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'message' => 'Order not found'
            ], 404);
        }

        // Attempt to delete the order
        try {
            $order->delete();

            return response()->json([
                'message' => 'Order deleted successfully'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to delete order',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function getActiveSuppliers()
    {
        try {
            $suppliers = Supplier::where('status', 'Active')->get();
            return response()->json($suppliers);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch suppliers'], 500);
        }
    }
    
}