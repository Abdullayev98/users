<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqCategories;

class FaqsController extends Controller
{
        public function index()
        {
            $fc = FaqCategories::all();
            
            return view('faq.faq',['fc'=>$fc]); 

        }

         public function questions()
        {
          
            
            return view('faq.faq-ans'); 

        }
}
