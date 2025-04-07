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
        // Get total counts
        $totalContacts = Contact::count();
        $totalUsers = User::count();
        $recentContacts = Contact::latest()->take(5)->get();
        
        // Get contacts created this month
        $contactsThisMonth = Contact::whereMonth(
            'created_at', Carbon::now()->month
        )->count();
        
        // Get contacts created last month
        $contactsLastMonth = Contact::whereMonth(
            'created_at', Carbon::now()->subMonth()->month
        )->count();
        
        // Calculate growth percentage
        $growthPercentage = $contactsLastMonth > 0 
            ? round((($contactsThisMonth - $contactsLastMonth) / $contactsLastMonth) * 100, 1)
            : 100;
            
        // Get contacts by month (last 6 months)
        $contactsByMonth = [];
        $months = [];
        
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('M');
            
            $contactsByMonth[] = Contact::whereMonth('created_at', $month->month)
                ->whereYear('created_at', $month->year)
                ->count();
        }
        
        // Get contacts with/without emails
        $contactsWithEmail = Contact::whereNotNull('email')->count();
        $contactsWithoutEmail = $totalContacts - $contactsWithEmail;
        
        // Get contacts with/without phone
        $contactsWithPhone = Contact::whereNotNull('phone')->count();
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
