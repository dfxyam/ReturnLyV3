<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;

class AdminActivityLogController extends Controller
{
    public function index()
    {
        $activities = ActivityLog::latest('created_at')->paginate(20);

        return view('admin.activity-logs.index', compact('activities'));
    }
}
