<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\StockHistory;

class InventoryController extends Controller
{
    public function manageInventory()
    {
        $inventoryItems = Inventory::all();

        
        return view('admin.inventory.manage-inventory', compact('inventoryItems'));
    }

    public function addInventoryItem()
    {
        return view('admin.inventory.add-item');
    }

    public function storeInventoryItem(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'item_code' => 'required|string',
            'item_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string',
            'stocks' => 'required|integer',
            'description' => 'required|string',
            'availability' => 'required|boolean',
        ]);

        if ($request->hasFile('item_photo')) {
            $file = $request->file('item_photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/inventory_photos'), $filename);
            $validatedData['item_photo'] = $filename;
        }

        // Create a new inventory item
        $createdItem = Inventory::create($validatedData);

        // Log audit trail entry for item creation
        $this->logAudit('create', 'InventoryItem', $createdItem->id, $validatedData);

        // Redirect back or to a specific route after storing the item
        return redirect()->route('admin.inventory.manage')->with('success', 'Inventory item added successfully.');
    }

    public function editInventoryItem($id)
    {
        // Retrieve the inventory item by its ID
        $inventoryItem = Inventory::findOrFail($id);

        // Pass the data to the view
        return view('admin.inventory.edit-item', compact('inventoryItem'));
    }

    public function updateInventoryItem(Request $request, $id)
    {
        $validatedData = $request->validate([
            'item_code' => 'required|string',
            'item_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string',
            'stocks' => 'required|integer',
            'description' => 'required|string',
            'availability' => 'required|boolean',
        ]);

        $inventoryItem = Inventory::findOrFail($id);

        $originalValues = $inventoryItem->toArray();

        if ($request->hasFile('item_photo')) {
            if ($inventoryItem->item_photo) {
                @unlink(public_path('upload/inventory_photos/'.$inventoryItem->item_photo));
            }
        
            $file = $request->file('item_photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/inventory_photos'), $filename);
            $validatedData['item_photo'] = $filename;
        }

        $inventoryItem->update($validatedData);

        $notification = [
            'message' => 'Inventory item updated successfully.',
            'alert-type' => 'success',
        ];

        $this->logAudit('update', 'InventoryItem', $id, $originalValues);

        return redirect()->route('admin.inventory.manage')->with($notification);

    }




    public function viewInventoryItem($id)
    {
        // Retrieve the inventory item by its ID
        $inventoryItem = Inventory::findOrFail($id);

        // Return the view with the inventory item data
        return view('admin.inventory.view-item', compact('inventoryItem'));
    }

    public function deleteInventoryItem($id)
    {
        // Retrieve the inventory item by its ID
        $inventoryItem = Inventory::findOrFail($id);

        // Log audit trail entry for item deletion
        $this->logAudit('delete', 'InventoryItem', $id, $inventoryItem->toArray());

        // Delete the item photo if it exists
        if ($inventoryItem->item_photo) {
            Storage::delete('public/upload/inventory_photos/' . $inventoryItem->item_photo);
        }

        // Delete the inventory item from the database
        $inventoryItem->delete();

        // Redirect back or to a specific route after deleting the item
        return redirect()->route('admin.inventory.manage')->with('success', 'Inventory item deleted successfully.');
    }

    public function showDeletedItems()
    {
        // Retrieve all soft-deleted items
        $deletedItems = Inventory::onlyTrashed()->get();

        // Return the view with the soft-deleted items
        return view('admin.inventory.deleted-items', compact('deletedItems'));
    }

    public function restoreInventoryItem($id)
    {
        // Restore the soft-deleted inventory item
        $restoredItem = Inventory::withTrashed()->find($id);
        $restoredItem->restore();

        // Redirect back or to a specific route after restoring the item
        return redirect()->route('admin.inventory.deleted-items')->with('success', 'Inventory item restored successfully.');
    }

    public function forceDeleteInventoryItem($id)
    {
        // Force delete the soft-deleted inventory item
        $item = Inventory::withTrashed()->find($id);
    
        // Check if the item exists
        if ($item) {
            // Delete the item photo if it exists
            if ($item->item_photo) {
                Storage::delete('public/upload/inventory_photos/' . $item->item_photo);
            }
    
            // Permanently delete the inventory item from the database
            $item->forceDelete();
    
            // Redirect back to a specific route after force deleting the item
            return redirect()->route('admin.inventory.deleted-items')->with('success', 'Inventory item permanently deleted.');
        } else {
            // Handle the case where the item is not found
            return redirect()->route('admin.inventory.deleted-items')->with('error', 'Inventory item not found.');
        }
    }
    


    private function logAudit($action, $model, $modelId, $changes = null)
    {
        $userId = Auth::id();
        $modelName = Auth::user()->name;

        Audit::create([
            'action' => $action,
            'model' => $modelName,
            'model_name' => $modelName,
            'changes' => json_encode($changes),
            'user_id' => $userId,
        ]);
    }

    public function processForm(Request $request)
{
    // Validate the form data
    $request->validate([
        'contraceptive_item' => 'required|exists:inventories,id,availability,true',
        'quantity_used' => 'required|integer|min:1',
    ]);

    $contraceptiveItemId = $request->input('contraceptive_item');
    $quantityUsed = $request->input('quantity_used');

    // Retrieve the selected inventory item
    $inventoryItem = Inventory::find($contraceptiveItemId);

    // Check if the item exists and has enough quantity
    if ($inventoryItem && $inventoryItem->quantity >= $quantityUsed) {
        // Update the inventory quantity
        $inventoryItem->quantity -= $quantityUsed;
        $inventoryItem->save();

        // Process the rest of your form logic...

        // Redirect or return a response
    } else {
        // Add error message and redirect back to the form
        return redirect()->back()->with('error', 'Insufficient quantity or item not found.');
    }
}




}