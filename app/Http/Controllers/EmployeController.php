<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    // Menampilkan daftar karyawan
    public function index()
    {
        $employees = Employee::all();  // Ganti dengan model Employee
        return view('employees.index', compact('employees'));
    }

    // Menampilkan form untuk membuat karyawan baru
    public function create()
    {
        return view('employees.create');
    }

    // Menyimpan karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees',
            'phone' => 'required|string|max:20',
            'hire_date' => 'required|date',
            'position' => 'required|string|max:255',
        ]);

        Employee::create($request->all());  // Ganti dengan model Employee

        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    // Menampilkan form untuk mengedit karyawan
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);  // Ganti dengan model Employee
        return view('employees.edit', compact('employee'));
    }

    // Menyimpan perubahan karyawan
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:employees,email,' . $id,
            'phone' => 'required|string|max:20',
            'hire_date' => 'required|date',
            'position' => 'required|string|max:255',
        ]);
         $employee = Employee::findOrFail($id);  // Ganti dengan model Employee
        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully.');
    }

    // Menghapus karyawan
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);  // Ganti dengan model Employee
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
