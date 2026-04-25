<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('home');
    }

    public function aboutus() {
        return view('aboutus');
    }

    // Admissions methods
    public function intermediate() {
        return view('intermediate');
    }

    public function bachelorofscience() {
        return view('bachelorofscience');
    }

    public function howtoapply() {
        return view('howtoapply');
    }

    // Programs methods
    public function preMedical() {
        return view('profile.pre-medical');
    }

    public function preEngineering() {
        return view('profile.pre-engineering');
    }

    public function arts() {
        return view('profile.arts');
    }

    public function commerce() {
        return view('profile.commerce');
    }

    public function bs() {
        return view('profile.bs');
    }

    public function generalScience() {
        return view('profile.general-science');
    }
}