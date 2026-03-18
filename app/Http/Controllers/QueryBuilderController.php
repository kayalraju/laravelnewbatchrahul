<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    public function index()
    {
         //$posts = DB::select('SELECT * FROM posts');
          $posts = DB::table('posts')
            ->paginate(5);
        return view('query-builder.index',compact('posts'));
    }
    public function createdata()
    {
        return view('query-builder.add');
    }
    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        // Insert data using raw query
        DB::insert('INSERT INTO posts (title, content) VALUES (?, ?)', [$title, $content]);

        return redirect()->route('query.builder')->with('success', 'Post created successfully');
       
    }

    public function edit($id)
    {
        // $post = DB::table('posts')->where('id', $id)->first();
        // return view('query-builder.edit', compact('post'));

         $post = DB::select('SELECT * FROM posts WHERE id = ?', [$id]);

        if (!$post) {
            return redirect()->route('query.builder')->with('error', 'Post not found');
        }

        return view('query-builder.edit', ['post' => $post[0]]);
    }

    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        // Update data using raw query
        DB::update('UPDATE posts SET title = ?, content = ? WHERE id = ?', [$title, $content, $id]);

        return redirect()->route('query.builder')->with('success', 'Post updated successfully');
    }


    public function delete($id)
    {
        // Delete data using raw query
        DB::delete('DELETE FROM posts WHERE id = ?', [$id]);

        return redirect()->route('query.builder')->with('success', 'Post deleted successfully');
    }


    public function search(Request $request)
    {
        $search = $request->input('search');
        $posts = DB::table('posts')
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('content', 'like', '%' . $search . '%')
            ->paginate(5);
        return view('query-builder.index', compact('posts'));
    }
}
