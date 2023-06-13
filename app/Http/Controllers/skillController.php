<?php

namespace App\Http\Controllers;

use App\Models\metadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class skillController extends Controller
{
    public function index()
    {
        return view('skill.index');
    }
    public function update(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                '_language' => 'required',
                '_workflow' => 'required',
            ], [
                '_language.required' => 'language required',
                '_workflow.required' => 'workflow required',

            ]);
        }
        metadata::updateOrCreate(['meta_key' => '_language'], ['meta_value'=> $request->_language]);
        metadata::updateOrCreate(['meta_key' => '_workflow'], ['meta_value'=> $request->_workflow]);
        return redirect()->route('skill.index')->with('success', 'Success');
    }
}
