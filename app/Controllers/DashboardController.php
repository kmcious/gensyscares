<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\SocialPostModel;
use App\Models\UserModel;
use App\Models\AnnouncementModel;

class DashboardController extends Controller
{
    protected $socialPostModel;
    protected $userModel;
    protected $announcementModel;

    public function __construct()
    {
        $this->socialPostModel = new SocialPostModel();
        $this->userModel = new UserModel();
        $this->announcementModel = new AnnouncementModel(); // Model for announcements
    }

    public function adminDashboard()
    {
        // Get the total users
        $totalUsers = $this->userModel->countAllResults();
    
        // Get the total announcements
        $totalAnnouncements = $this->announcementModel->countAllResults();
    
        // Example data for graph: Monthly user registrations (replace with real data)
        $monthlyUsers = $this->userModel->select("MONTH(created_at) as month, COUNT(id) as total_users")
                                        ->groupBy("MONTH(created_at)")
                                        ->orderBy("MONTH(created_at)", "ASC")
                                        ->findAll();
    
        // Prepare labels and data for the chart
        $labels = [];
        $data = [];
        foreach ($monthlyUsers as $user) {
            $labels[] = date('F', mktime(0, 0, 0, $user['month'], 10));  // Get month name
            $data[] = $user['total_users'];
        }
    
        // Pass the data to the view
        return view('pages/adminSide/admin_dashboard', [
            'totalUsers' => $totalUsers,
            'totalAnnouncements' => $totalAnnouncements,
            'monthlyUserLabels' => json_encode($labels),
            'monthlyUserData' => json_encode($data)
        ]);
    }
    
}
