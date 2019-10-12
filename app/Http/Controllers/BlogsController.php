<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use App\User;
use App\Mail\BlogPublished;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

use Session;

class BlogsController extends Controller
{

    public function __construct()
    {
        $this->middleware('author', ['only' => ['create', 'delete', 'store', 'edit', 'update']]);
        $this->middleware('admin', ['only' => ['delete', 'trash', 'restore', 'permanentDelete']]);
        $this->middleware('super', ['only' => ['delete', 'trash', 'restore', 'permanentDelete']]);
    }



    // index
    public function index()
    {
    	$blogs = Blog::latest()->get();
        //$blogs = Blog::where('status', 1)->latest()->get();
        $categories = Category::latest()->get();
    	return view('blogs.index', compact(['blogs', 'categories']));
    }

    // create method
    public function create()
    {
        $categories = Category::latest()->get();
    	return view('blogs.create', compact('categories'));
    }

    // store method
    public function store(Request $request)
    {
        // form validation
        $valRules = [

            'title' => ['required', 'min:20', 'max:150'],
            'body' => ['required', 'min:100'],
            'featured_image' => ['image', 'max:1000000']
        ];

        $this->validate($request, $valRules);

    	$input = $request->all();

        // meta info
        $input['slug'] = Str::slug($request->title);
        $input['meta_title'] = Str::limit($request->title, 55, '...');
        $input['meta_description'] = Str::limit($request->body, 150, '...');


        if ($file = ($request->file('featured_image'))) {
           $destinationPath = 'images/featured_image/'; // upload path
           $name= $file->getClientSize();
           $name = date('YmdHis') . "." . $file->getClientOriginalExtension();         
           $name = strtolower(str_replace(' ', '-', $name));
           $file->move($destinationPath, $name);
           //$file->move('images/featured_image/');
           $input['featured_image'] = $name;
        }


    	//$blog = Blog::create($input);
        $blogByUser = $request->user()->blogs()->create($input);

        // Now we Sync with Choosen Categories from the Form
        if ($request->category_id) {
            $blogByUser->category()->sync($request->category_id);
        }

        // Send Mail
        $users = User::all();
        foreach ($users as $user) {
            Mail::to($user->email)->queue(new BlogPublished($blogByUser, $user));
        }


        Session::flash('blog_created_message', 'Blog has been Successfully Created...');

    	return redirect('/blogs');
    }

    // show method
    public function show($slug)
    {
    	//$blog = Blog::findOrFail($id);
        $blog = Blog::whereSlug($slug)->first();
        $categories = Category::latest()->get();
    	return view('blogs.show', compact(['blog', 'categories']));
    }

    // edit method
    public function edit($id)
    {
        $categories = Category::latest()->get();
        $blog = Blog::findOrFail($id);

        $blog_categories = array();
        foreach ($blog->category as $cat) {
            $blog_categories[] = $cat->id - 1;
        }
        $filtered = Arr::except($categories, $blog_categories);

        return view('blogs.edit', ['blog' => $blog, 'categories' => $categories, 'filtered' => $filtered]);
    }

    //update method
    public function update(Request $request, $id)
    {
        //dd($request->all());
        $input = $request->all();
        $blog = Blog::findOrFail($id);

        if ($file = $request->file('featured_image')) {            
            if ($blog->featured_image) {
                @unlink('images/featured_image/' . $blog->featured_image);
            }
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/featured_image/', $name);
            $input['featured_image'] = $name;
        }


        $blog->update($input);

        // Now we Sync with Choosen Categories from the Form
        if ($request->category_id) {
            $blog->category()->sync($request->category_id);
        }        
        return redirect('blogs');
    }

    // delete method
    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('blogs');
    }

    // trash method
    public function trash()
    {
        $trashedBlogs = Blog::onlyTrashed()->get();
        return view('blogs.trash', compact('trashedBlogs'));
    }

    // restore trash method
    public function restore($id)
    {
        $restoreBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoreBlog->restore($restoreBlog);
        return redirect('blogs');
    }

    // Permanent Delete Method
    public function permanentDelete($id)
    {
        $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
        $permanentDeleteBlog->forceDelete($permanentDeleteBlog);
        return back();
    }


}
