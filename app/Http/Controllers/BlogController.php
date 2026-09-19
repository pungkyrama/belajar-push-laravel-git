<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $tittle = $request->title;
        $blogs = DB::table('blogs')->where('tittle', 'LIKE', '%' . $tittle . '%')->orderBy('created_at')->paginate(8);
        return view('blog', ['blogs' => $blogs, 'tittle' => $tittle]);
    }

    public function create()
    {
        return view('blogs/create');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'title' => ['required', 'unique:blogs,tittle', 'max:255'],
            'description' => 'required',
            'status' => 'required',
        ]);


        if ($validated) {
            DB::table('blogs')->insert([
                'tittle' => $request->title,
                'deskripsi' => $request->description,
                'status' => $request->status,
                'user_id' => fake()->numberBetween(1, User::all()->count()),
            ]);

            return redirect()->route('blogs.index')->with('success', 'New Blog Added Succesfully');
        } else {
            return redirect()->route('blogs.index')->with('failed', 'New Blog Added Failed');
        }
        
    }

    public function show($id) 
    {
        $blog = DB::table('blogs')->where('id', $id)->first();

        if (!$blog) {
            abort(404, 'Data tidak ditemukan');
        }

        return view('blogs.detail', ['blog' => $blog]);
    }


    public function edit($id)
    {
        $blog = DB::table('blogs')->where('id', $id)->first();

        if (!$blog) {
            abort(404);
        }

        return view('blogs.edit', ['blog' => $blog]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($validated) {
            DB::table('blogs')->where('id', $id)->update([
                'tittle' => $request->title,
                'deskripsi' => $request->description,
                'status' => $request->status,
                'user_id' => fake()->numberBetween(1, User::all()->count()),
                'update_at' => now(),
            ]);

            return redirect()->route('blogs.index')->with('success', 'Blog Updated Succesfully');
        } else {
            return redirect()->route('blogs.index')->with('failed', 'Blog Update Failed');
        }
    }

    public function delete($id) 
    {
        $blog = DB::table('blogs')->where('id', $id)->delete();

        if (!$blog) {
            return redirect()->route('blogs.index')->with('failed', 'Blog failed to Delete!');
        }

        return redirect()->route('blogs.index')->with('success', 'Blog Delete Succesfully!');
    }
}
