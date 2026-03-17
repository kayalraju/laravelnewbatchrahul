<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Blog;

class OneToONeController extends Controller
{
    public function createAuthor()
    {
        return view('onetoone.author');
    }

    public function storeAuthor(Request $request)
    {
        // Validate and store the author data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);         
        $author = Author::create($validatedData);
        return redirect()->route('blog')->with('success', 'Author: Firstname Lastname successfully');
    
    }

    // public function authorBlog(){
        
    // }

    public function createBlog()
    {
        $authors = Author::all();
        return view('onetoone.blog', compact('authors'));
    }

    public function storeBlog(Request $request)
    {
        // Validate and store the blog data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|exists:authors,id',
        ]);
        $blog = Blog::create($validatedData);
        return redirect()->route('blog.list')->with('success', 'Blog created successfully');
    }

    public function authorBlogList()
    {
        $authors_with_blogs = Author::with('blog')->get();
        
        $blogs_with_authors = Blog::with('author')->get();
        
        return view('onetoone.listblog', compact('authors_with_blogs', 'blogs_with_authors'));
    }

    public function authorBlog($id)
    {
        // $author = Author::find($id);
        // //dd($author->blog);
        // //author name
        // $author_name = $author->name;
        // //dd($author_name);
        // //blog title
        // $blog_title = $author->blog->title;
        // dd($blog_title);
        // //blog content
        // $blog_content = $author->blog->content;
        // //

        $blog = Blog::find($id);
        $author_name = $blog->author->name;
        //dd($author_name);
        $blog_title = $blog->title;
        dd($blog_title);
        $blog_content = $blog->content;
        
    }
}
