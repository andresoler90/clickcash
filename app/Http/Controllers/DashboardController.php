<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Libs\Multilevel;
use App\Models\Membership;
use App\Models\UserMembership;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $membership = UserMembership::where('users_id', \Auth::id())->where('status', "P")->first();

        return view('Dashboard.index', compact("membership"));
    }

    function dashboardTwo()
    {
        return view('Dashboard.dashboard_two');
    }

    function analytics()
    {
        return view('Dashboard.analytics');
    }

    function tracking()
    {
        return view('Dashboard.tracking');
    }

    function webAnalytics()
    {
        return view('Dashboard.web-analytics');
    }

    function patientDashboard()
    {
        return view('Dashboard.patient-dashboard');
    }

    function ticketBooking()
    {
        return view('Dashboard.ticket-booking');
    }

}
