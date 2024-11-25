<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Catch_;

use function PHPUnit\Framework\fileExists;

class CategoryController extends Controller
{
    //

    public function index1 (){
        $categories= Category::paginate(5);
        return view('dashboard.category.index1',compact('categories'));
    }



    public function index2 (){
        return view('dashboard.category.index2');
    }

    public function store(Request $request){
        $request->validate([
            'image'=>'required|image',
            'title'=>'required',
        ]);

        $manager = new ImageManager(new Driver());
        if($request->file('image')){
            $newname= auth()->user()->id . '-' . rand(0, 99999) . '-' . now()->format('d-m-Y H-i-s') . '.' . $request->file('image')->getClientOriginalExtension();
        $image = $manager->read($request->file('image'));
        $image->toPng()->save(base_path('public/uploads/category/'.$newname));

        if($request->slug){
            Category::insert([
                'image'=>$newname,
                'title'=>$request->title,
                'slug'=> Str::slug($request->slug, '-'),
                'created_at'=>now()
            ]);
        }else{
            Category::insert([
                'image'=>$newname,
                'title'=>$request->title,
                'slug'=> Str::slug($request->title, '-'),
                'created_at'=>now()
            ]);
        }

        return back()->with('category_insert','Category Insert Successfully');

        // return redirect()->route('category.index1')->with('category_insert', 'Category Insert Successfully!');


        }
    }





    public function edit($id){
        $category= Category:: where('id',$id)->first();
        return view('dashboard.category.edit',compact('category'));
    }





    public function update(Request $request , $id){
        $request->validate([
            'title'=>'required',
        ]);
        $manager = new ImageManager(new Driver());

        if($request->hasFile('image')){
            $category=Category::where('id',$id)->first();
            if($category->image){
                $oldpath= base_path('public/uploads/category/'.$category->image);
                if(file_exists($oldpath)){
                    unlink($oldpath);
                }
            }
            $newname= auth()->user()->id . '-' . rand(0, 99999) . '-' . now()->format('d-m-Y H-i-s') . '.' . $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->toPng()->save(base_path('public/uploads/category/'.$newname));

            if($request->slug){
                Category::find($id)->update([
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->slug, '-'),
                    'image'=>$newname,
                    'updated_at'=>now()
                ]);

            }else{
                Category::find($id)->update([
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->title, '-'),
                    'image'=>$newname,
                    'updated_at'=>now()
                ]);
            }

        }else{
            if($request->slug){
                Category::find($id)->update([
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->slug, '-'),
                    'updated_at'=>now()
                ]);

            }else{
                Category::find($id)->update([
                    'title'=>$request->title,
                    'slug'=>Str::slug($request->title, '-'),
                    'updated_at'=>now()
                ]);
            }
        }
        return redirect()->route('category.index1')->with('category','Category Updated Successfully!');


    }



    public function delete($id){
        $category= Category::where('id',$id)->first();
        if($category->image){
            $oldpath=base_path('public/uploads/category/'.$category->image);
            if(file_exists($oldpath)){
                unlink($oldpath);
            }
        }
        Category::find($id)->delete();
        return back()->with('category','Category Deleted Successfully!');
    }




    public function status ($id){
        $category= Category::where('id',$id)->first();

        if($category->status=='active'){
            Category::find($id)->update([
                'status'=>'deactive',
                'updated_at'=>now()
            ]);
        }else{
            Category::find($id)->update([
                'status'=>'active',
                'updated_at'=>now()
            ]);
        }
        return back()->with('category','Status Updated Successfully!');
    }


}
