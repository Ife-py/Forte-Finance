<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()->take(5)->get();

        return view('admin.announcements.index', compact('announcements'));
    }

    // Show form for admin to create new announcement
    public function create()
    {
        return view('admin.announcements.create');
    }

    // Store new announcement
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        Announcement::create($request->only(['title', 'content', 'author', 'date']));

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement posted successfully!');
    }

    public function show($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('admin.announcements.show', compact('announcement'));
    }

    public function edit($id)
    {
        $announcement = Announcement::findOrFail($id);

        return view('admin.announcements.edit', compact('announcement'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'date' => 'nullable|date',
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->update($request->only(['title', 'content', 'author', 'date']));

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement updated successfully!');
    }
    // Delete announcement
    public function destroy($id)
    {
        Announcement::findOrFail($id)->delete();

        return back()->with('error', 'Announcement deleted successfully!');
    }
}
