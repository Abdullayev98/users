<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategories;
use App\Models\Faqs;

class FaqsController extends Controller
{
        public function index()
        {
            $fc = FaqCategories::withTranslations(['ru', 'uz'])->get();

            return view('faq.faq',compact('fc'));
        }

         public function questions($id)
        {

          $fq = Faqs::where('category_id',$id)->get();
          $fc = FaqCategories::where('id',$id)->first();
            return view('faq.faq-ans', compact('fq','fc'));

        }
}
