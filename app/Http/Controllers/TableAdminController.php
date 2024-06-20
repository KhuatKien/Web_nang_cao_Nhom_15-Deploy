<?php

namespace App\Http\Controllers;

use App\Models\Tbltable;
use Illuminate\Http\Request;

class TableAdminController extends Controller
{
    public function index()
    {
        $tables = Tbltable::all();
        return view('admin.tableAdmin', ['tables' => $tables]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'TableID' => 'required|string|max:255|unique:tbltable',
            'Occupancy' => 'required|integer',
            'TableStatus' => 'required|string|max:255',
        ]);

        $table = new Tbltable();
        $table->TableID = $request->TableID;
        $table->Occupancy = $request->Occupancy;
        $table->TableStatus = $request->TableStatus;
        $table->save();

        return redirect()->route('admin.tables.index')->with('success', 'Table created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_Occupancy' => 'required|integer',
            'edit_TableStatus' => 'required|string|max:255',
        ]);

        $table = Tbltable::findOrFail($id);
        $table->Occupancy = $request->edit_Occupancy;
        $table->TableStatus = $request->edit_TableStatus;
        $table->save();

        return redirect()->route('admin.tables.index')->with('success', 'Table updated successfully.');
    }

    public function confirm($id)
    {
    $table = Tbltable::findOrFail($id);
    $table->TableStatus = 0;
    $table->save();

    return response()->json(['message' => 'Table status updated successfully.']);
    }

    public function cancel($id)
    {
    $table = Tbltable::find($id);
    if ($table) {
        $table->TableStatus = 1; // Giá trị mà bạn muốn cập nhật
        $table->save();

        return response()->json(['message' => 'Table status has been updated to cancelled.']);
    }

    return response()->json(['message' => 'Table not found.'], 404);
    }

    public function destroy($id)
    {
        $table = Tbltable::findOrFail($id);
        $table->delete();

        return redirect()->route('admin.tables.index')->with('success', 'Table deleted successfully.');
    }
}
