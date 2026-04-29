<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('home');
    }
<<<<<<< HEAD
public function about()
{
    return view('aboutus');
}
=======

    public function aboutus() {
    return view('aboutus');
}

>>>>>>> 8ad216a225dce3c77928aaa18704db34d68968b6
    // Admissions methods
    public function intermediate() {
        return view('admissions.intermediate');
    }

    public function bachelorofscience() {
        return view('admissions.bachelorofscience');
    }

    public function howtoapply() {
        return view('admissions.howtoapply');
    }

    // Programs methods
    public function preMedical() {
        return view('profile.premedical');
    }

    public function preEngineering() {
        return view('profile.preengineering');
    }

    public function arts() {
        return view('profile.arts');
    }

    public function commerce() {
        return view('profile.commerce');
    }
public function bs() {
    return view('profile.bsprograms');
}

    public function generalScience() {
        return view('profile.general-science');
    }
}
