<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class experienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = history::where('type', 'experience')->orderBy('date_end', 'desc')->get();
        return view('experience.index')->with('data', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('experience.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('info1', $request->info1);
        Session::flash('date_start', $request->date_start);
        Session::flash('date_end', $request->date_end);
        Session::flash('content', $request->content);
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'date_start' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'title required',
                'info1.required' => 'info1 required',
                'date_start.required' => 'date_start required',
                'content.required' => 'content required',
            ]
        );
        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'type' => 'experience',
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'content' => $request->content,
        ];
        history::create($data);
        return redirect()->route('experience.index')->with('success', 'Success adding experience');
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
        $data = history::where('id', $id)->where('type', 'experience')->first();
        return view('experience.edit')->with('data', $data);
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
                'content' => 'required',
            ],
            [
                'title.required' => 'title required',
                'info1.required' => 'company required',
                'date_start.required' => 'start date required',
                'content.required' => 'content required',
            ]
        );

        $data = [
            'title' => $request->title,
            'info1' => $request->info1,
            'type' => 'experience',
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'content' => $request->content
        ];
        history::where('id', $id)->where('type', 'content')->update($data);

        return redirect()->route('experience.index')->with('success', 'edit success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        history::where('id', $id)->where('type', 'experience')->delete();
        return redirect()->route('experience.index')->with('success', 'Success delete experience');
    }
}
