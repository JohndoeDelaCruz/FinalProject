<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with analytics data.
     */
    public function index()
    {
        // Get total counts for current user
        $totalContacts = auth()->user()->contacts()->count();
        $totalUsers = User::count();
        $recentContacts = auth()->user()->contacts()->latest()->take(5)->get();
        
        // Get contacts created this month for current user
        $contactsThisMonth = auth()->user()->contacts()
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        
        // Get contacts created last month for current user
        $contactsLastMonth = auth()->user()->contacts()
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->count();
        
        // Calculate growth percentage
        $growthPercentage = $contactsLastMonth > 0 
            ? round((($contactsThisMonth - $contactsLastMonth) / $contactsLastMonth) * 100, 1)
            : 100;
            
        // Get contacts by month (last 6 months) for current user
        $contactsByMonth = [];
        $months = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('M');
            
            $contactsByMonth[] = auth()->user()->contacts()
                ->whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }
        
        // Get contacts with/without emails for current user
        $contactsWithEmail = auth()->user()->contacts()->whereNotNull('email')->count();
        $contactsWithoutEmail = $totalContacts - $contactsWithEmail;
        
        // Get contacts with/without phone for current user
        $contactsWithPhone = auth()->user()->contacts()->whereNotNull('phone')->count();
        $contactsWithoutPhone = $totalContacts - $contactsWithPhone;
        
        return view('dashboard', compact(
            'totalContacts',
            'totalUsers',
            'recentContacts',
            'contactsThisMonth',
            'contactsLastMonth',
            'growthPercentage',
            'months',
            'contactsByMonth',
            'contactsWithEmail',
            'contactsWithoutEmail',
            'contactsWithPhone',
            'contactsWithoutPhone'
        ));
    }
}
