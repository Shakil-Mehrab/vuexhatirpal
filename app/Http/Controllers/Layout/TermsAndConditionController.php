<?php

namespace App\Http\Controllers\Layout;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TermsAndConditionController extends Controller
{

        public function policy()
    {
        return view('layout.pages.privacy.policy');
    }
     public function paymentcondition()
    {
        return view('layout.pages.privacy.payment-condition');
    }


}
