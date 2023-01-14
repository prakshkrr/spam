<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;
use DataTables;
use DB;


class SpamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Categories::select('*');
        if ($request->ajax()) {
            $data = Categories::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $edit_url_with_id = 'edit/'.$row->id;
                        $btn = '<a href="'.$edit_url_with_id.'" class="edit btn btn-outline-primary btn-sm">Edit</a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('Category.index');
    }

    // admin and user  call to dashboard
    public function dashboard_index()
    {
        $words =DB::table('words')
                    ->select('wordname','highlight','categories.catname as category','categories.color', 'categories.image')
                    ->leftJoin('categories','categories.id','words.category_id')
                    ->get()->toArray();
                    // dd($words);
        $words_json = json_encode($words); 
        return view('dashboard.index',compact('words_json'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'catname' => 'required|min:3|max:255',
            'image' => 'required|mimes:png,jpeg,gif',
            'color' => 'required',
        ]);
        $post = new Categories;
        $post->catname = $request->catname;

        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename= time() . '.' . $extension;
            $file->move('uploads/word/', $filename);
            $post->image =$filename;
        }else{
            return $request;
            $post->image  = '';
        }
    
        $post->color =$request->color;
        $post->save();
        return redirect()->back()->with('response', 'Category save successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::find($id);
        // dd($categories);
        return view('Category.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $post = Categories::find($id);
        $post->catname = $request->input('catname');

        if($request->hasfile('image'))
        {
            $destination = "uploads/word/".$post->image;
            $file=$request->file('image');
            $extension=$file->getclientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/word/',$filename);
            $post->image=$filename;
        }
        $post->color = $request->input('color');
        $post->update();
        return redirect()->back()->with('status','Category Updated Successfully');
        
    }

}
