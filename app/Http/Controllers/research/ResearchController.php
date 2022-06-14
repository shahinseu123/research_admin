<?php

namespace App\Http\Controllers\research;

use App\Http\Controllers\Controller;
use App\Progress;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResearchController extends Controller
{
    public function index()
    {
        $progress = Progress::orderBy('created_at', 'desc')->get();
        return view('admin.researcher_progress', ['progress' => $progress]);
    }

    public function add()
    {
        return view('admin.researcher_progress_add');
    }
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $progress = new Progress();
        $progress->title = $request->title;
        $progress->description = $request->description;
        $progress->created_at = Carbon::now();
        $progress->save();
        return redirect()->back()->with('success', 'Research progress added');
    }

    public function delete($id)
    {
        Progress::findOrFail($id)->delete();
        return redirect()->back()->with('error', 'Research progress deleted');
    }
    public function edit($id)
    {
        $progress = Progress::findOrFail($id);
        return view('admin.researcher_progress_edit', ['progress' => $progress]);
    }

    public function update(Request $request)
    {
        $progress = Progress::findOrFail($request->id);
        $progress->title = $request->title;
        $progress->description = $request->description;
        $progress->save();
        return redirect()->back()->with('success', 'Research progress updated');
    }

    public function show($id)
    {
        $progress = Progress::findOrFail($id);
        return view('admin.researcher_progress_show', ['progress' => $progress]);
    }
}
