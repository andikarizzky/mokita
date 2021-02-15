<?php

namespace App\Http\Controllers;

use App\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DateTime;
use Jenssegers\Date\Date;

class TvDashboard extends Controller
{
    public function index() {

        $yesterday = Carbon::yesterday();
        $tomorrow = Carbon::tomorrow();

        $d = new DateTime('-1day');
        $tomorrow = $d->format('d/m/Y h.i.s');

        $datetime = new DateTime('2013-01-22');
        $datetime->modify('+1 day');
        $datetime->format('Y-m-d H:i:s');

        $kemarin = Carbon::now()->subDays(1)->format('Y-m-d');
        $harini = Carbon::now()->format('Y-m-d');
        $besok = Carbon::now()->addDays(1)->format('Y-m-d');

        $array[] = [
            'kemarin' => $kemarin,
            'hariini' => $harini,
            'besok' => $besok,
        ];

        Date::setLocale('id');

        $slide1 = Agenda::whereDate('mulai', '=', date($kemarin))->get();
        $slide1title = Date::now()->sub('1 day')->format('l, j F Y');
        $slide2 = Agenda::whereDate('mulai', '=', date($harini))->get();
        $slide2title = Date::now()->format('l, j F Y');
        $slide3 = Agenda::whereDate('mulai', '=', date($besok))->get();
        $slide3title = Date::now()->add('1 day')->format('l, j F Y');

        // dd($cari);

        return view('tv_dashboard.index',compact('slide1', 'slide1title', 'slide2', 'slide2title', 'slide3', 'slide3title'));
    }
}
