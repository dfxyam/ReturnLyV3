<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class AdminNotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::latest()->paginate(15);

        return view('admin.notifications.index', compact('notifications'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->update(['is_read' => true]);

        return back()->with('success', 'Notifikasi ditandai sebagai dibaca.');
    }
}
