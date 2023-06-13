<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = history::where('type', 'education')->orderBy('date_end', 'desc')->get();
        return view('education.index')->with('data', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('education.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('info1', $request->info1);
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('date_start', $request->date_start);
        Session::flash('date_end', $request->date_end);
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'date_start' => 'required',
            ],
            [
                'title.required' => 'title required',
                'info1.required' => 'info1 required',
                'date_start.required' => 'date_start required',
            ]
        );
        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'type' => 'education',
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ];
        history::create($data);
        return redirect()->route('education.index')->with('success', 'Success adding education');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = history::where('id', $id)->where('type', 'education')->first();
        return view('education.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'date_start' => 'required',
            ],
            [
                'title.required' => 'title required',
                'info1.required' => 'company required',
                'date_start.required' => 'start date required',
            ]
        );

        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'type' => 'education',
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
        ];
        history::where('id', $id)->where('type', 'education')->update($data);

        return redirect()->route('education.index')->with('success', 'success edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        history::where('id', $id)->where('type', 'education')->delete();
        return redirect()->route('education.index')->with('success', 'Success delete education');
    }
}
