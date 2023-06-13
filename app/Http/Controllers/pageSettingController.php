<?php

namespace App\Http\Controllers;

use App\Models\pages;
use App\Models\metadata;
use Illuminate\Http\Request;

class pageSettingController extends Controller
{
    function index()
    {
        $pagedata = pages::orderBy('title', 'asc')->get();
        return view("pagesetting.index")->with('pagedata', $pagedata);
    }
    function update(Request $request)
    {
        metadata::updateOrCreate(['meta_key' => '_page_about'], ['meta_value' => $request->_page_about]);
        metadata::updateOrCreate(['meta_key' => '_page_interest'], ['meta_value' => $request->_page_interest]);
        metadata::updateOrCreate(['meta_key' => '_page_award'], ['meta_value' => $request->_page_award]);

        return redirect()->route('pagesetting.index')->with('success', 'update success');
    }
}
