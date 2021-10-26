<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThreadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'body'  => ['required'],
            'category_id'   => ['required'],
        ]);

        $thread = $request->user()->threads()->create([
            'title' => $name = $request->title,
            'slug'  => Str::slug($name . '-' . Str::random(6)),
            'body'  => $request->body,
            'category_id'   => $request->category_id,
        ]);

        return redirect(route('threads.show', $thread));
    }

    public function show(Thread $thread)
    {
        //
    }

    public function edit(Thread $thread)
    {
        //
    }

    public function update(Request $request, Thread $thread)
    {
        //
    }

    public function destroy(Thread $thread)
    {
        //
    }
}
