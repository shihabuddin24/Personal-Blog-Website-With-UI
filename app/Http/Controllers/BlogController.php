<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $blogs= Blog::latest()->paginate(10);
        return view('dashboard.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $category= Category::where('status', 'active')->get();
        return view('dashboard.blog.create',compact('category'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'thumbnail'=>'required',
        ]);
        $manager = new ImageManager(new Driver());

        if($request->hasFile('thumbnail')){
            $newname= Auth::user()->id . '-' . rand(0, 99999) . '-' . now()->format('d-m-Y H-i-s') . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $image = $manager->read($request->file('thumbnail'));
            $image->toPng()->save(base_path('public/uploads/blog/'.$newname));

            if($request->slug){
                Blog::create([
                    'user_id'=>Auth::user()->id,
                    'category_id'=>$request->category_id,
                    'title'=>$request->title,
                    'slug'=> Str::slug($request->slug,'-'),
                    'short_description'=>$request->short_description,
                    'description'=>$request->description,
                    'thumbnail'=>$newname,
                    'created_at'=>now()
                ]);
            }else{
                Blog::create([
                    'user_id'=>Auth::user()->id,
                    'category_id'=>$request->category_id,
                    'title'=>$request->title,
                    'slug'=> Str::slug($request->title,'-'),
                    'short_description'=>$request->short_description,
                    'description'=>$request->description,
                    'thumbnail'=>$newname,
                    'created_at'=>now()
                ]);
            }
            return back()->with('blog','Blogs Created Successfully!');

        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $category=Category::where('status','active')->get();
        return view('dashboard.blog.edit',compact('category','blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'=>'required',
            'short_description'=>'required',
            'description'=>'required',
        ]);
        $manager = new ImageManager(new Driver());

        if($request->hasFile('thumbnail')){
            if($blog->thumbnail){
                $oldpath= base_path('public/uploads/blog/'.$blog->thumbnail);
                if(file_exists($oldpath)){
                    unlink($oldpath);
                }
            }
            $newname= Auth::user()->id . '-' . rand(0, 99999) . '-' . now()->format('d-m-Y H-i-s') . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $image = $manager->read($request->file('thumbnail'));
            $image->toPng()->save(base_path('public/uploads/blog/'.$newname));

            if($request->slug){
                Blog::find($blog->id)->update([
                    'user_id'=>Auth::user()->id,
                    'category_id'=>$request->category_id,
                    'title'=>$request->title,
                    'slug'=> Str::slug($request->slug,'-'),
                    'short_description'=>$request->short_description,
                    'description'=>$request->description,
                    'thumbnail'=>$newname,
                    'updated_at'=>now()
                ]);
            }else{
                Blog::find($blog->id)->update([
                    'user_id'=>Auth::user()->id,
                    'category_id'=>$request->category_id,
                    'title'=>$request->title,
                    'slug'=> Str::slug($request->title,'-'),
                    'short_description'=>$request->short_description,
                    'description'=>$request->description,
                    'thumbnail'=>$newname,
                    'updated_at'=>now()
                ]);
            }


        }else{
            if($request->slug){
                Blog::find($blog->id)->update([
                    'user_id'=>Auth::user()->id,
                    'category_id'=>$request->category_id,
                    'title'=>$request->title,
                    'slug'=> Str::slug($request->slug,'-'),
                    'short_description'=>$request->short_description,
                    'description'=>$request->description,
                    'updated_at'=>now()
                ]);
            }else{
                Blog::find($blog->id)->update([
                    'user_id'=>Auth::user()->id,
                    'category_id'=>$request->category_id,
                    'title'=>$request->title,
                    'slug'=> Str::slug($request->title,'-'),
                    'short_description'=>$request->short_description,
                    'description'=>$request->description,
                    'updated_at'=>now()
                ]);
            }
        }
        return redirect()->route('blog.index')->with('blog','Blogs Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if($blog->thumbnail){
            $oldpath= base_path('public/uploads/blog/'.$blog->thumbnail);
            if(file_exists($oldpath)){
                unlink($oldpath);
            }
        }
        Blog::find($blog->id)->delete();
        return back()->with('blog','Blogs Deleted Successfully!');
    }


    public function status($id){
        $blog=Blog::where('id',$id)->first();

        if($blog->status == 'active'){
            Blog::find($id)->update([
                'status'=>'deactive',
                'updated_at'=>now(),
            ]);
        }else{
            Blog::find($id)->update([
                'status'=>'active',
                'updated_at'=>now(),
            ]);
        }

        return back()->with('blog','Status Updated Successfully!');
    }

    public function feature($id){
        $blogs=Blog::where('id',$id)->first();

        if($blogs->feature == false){
            Blog::find($blogs->id)->update([
                'feature'=> true,
                'updated_at'=>now()
            ]);
        }else{
            Blog::find($blogs->id)->update([
                'feature'=> false,
                'updated_at'=>now()
            ]);
        }
        return back()->with('blog','Feature Updated Successfully!');
    }
}

