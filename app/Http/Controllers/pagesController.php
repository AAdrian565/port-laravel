<?php

namespace App\Http\Controllers;

use App\Models\pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class pagesController extends Controller
{
    public function index()
    {
        $data = pages::orderBy('title', 'asc')->get();
        return view('pages.index')->with('data', $data);
    }

    public function create()
    {
        return view('pages/create');
    }

    public function store(Request $request)
    {
        Session::flash('title', $request->title);
        Session::flash('content', $request->content);
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'title required',
                'content.required' => 'content required',
            ]
        );
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];
        pages::create($data);
        return redirect()->route('pages.index')->with('success', 'Success adding page');
    }

    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
        $data = pages::where('id', $id)->first();
        return view('pages.edit')->with('data', $data);
    }

    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'title required',
                'content.required' => 'content required',
            ]
        );
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];
        pages::where('id', $id)->update($data);
        /* pages::update($data); */
        return redirect()->route('pages.index')->with('success', 'Success edit page');
    }

    public function destroy(string $id)
    {
        pages::where('id', $id)->delete();
        return redirect()->route('pages.index')->with('success', 'Success delete page');
    }
}
