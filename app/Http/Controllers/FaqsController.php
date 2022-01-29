<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategories;
use App\Models\Faqs;

class FaqsController extends Controller
{
    public function index(Request $request)
    {
        $fc = FaqCategories::all();

        if ($request->input('search')) {
            $fc = FaqCategories::where('title','like', '%'.$request->input('search')."%")->get();
        };
        return view('faq.faq', compact('fc'));
    }

    public function questions($id)
    {
        $fq = Faqs::withTranslations(['ru', 'uz'])->where('category_id', $id)->get();
        $fc = FaqCategories::withTranslations(['ru', 'uz'])->where('id', $id)->first();
        return view('faq.faq-ans', compact('fq', 'fc'));
    }
}
