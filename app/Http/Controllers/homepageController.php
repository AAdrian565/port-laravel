<?php

namespace App\Http\Controllers;

use App\Models\pages;
use App\Models\history;
use Illuminate\Http\Request;

class homepageController extends Controller
{
    //
    public function index()
    {
     $about_id = get_meta_value('_page_about');
        $about_data = pages::where('id', $about_id)->first();

        $interest_id = get_meta_value('_page_interest');
        $interest_data = pages::where('id', $interest_id)->first();

        $award_id = get_meta_value('_page_award');
        $award_data = pages::where('id', $award_id)->first();

        $experience_data = history::where('type', 'experience')->get();
        $education_data = history::where('type', 'education')->get();

        return view('index')->with([
            'about' => $about_data,
            'interest' => $interest_data,
            'award' => $award_data,
            'experience' => $experience_data,
            'education' => $education_data
        ]);
    }
}
