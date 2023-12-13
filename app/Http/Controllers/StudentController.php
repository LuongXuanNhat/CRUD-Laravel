<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view("students.index", [
            'students' => Student::with('user')->latest()->paginate(2),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255'
        ]);
 
        $request->user()->students()->create($validated);
 
        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student): View
    {
        return view('students.show', [
            'student'=> $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student): View
    {
        $this->authorize('update', $student);
        return view('students.edit', [
            'student'=> $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student): RedirectResponse
    {
        $this->authorize('update', $student);
 
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class' => 'required|string|max:255'
        ]);
 
        $student->update($validated);
 
        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student) : RedirectResponse
    {
        $this->authorize('delete', $student);
        $student->delete();
 
        return redirect(route('students.index'));
    }
}
