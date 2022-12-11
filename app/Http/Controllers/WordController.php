<?php

namespace App\Http\Controllers;
use App\Models\Words;
use App\Models\Categories;
use DataTables;
use DB;
use Illuminate\Http\Request;


use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\Excel\toCollection;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use Illuminate\Support\Collection;

class WordController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    public function index(Request $request)
    {
        $words =DB::table('words')
                    ->select('words.*','categories.catname')
                    ->leftJoin('categories','categories.id','words.category_id')
                    ->get();
                    if ($request->ajax()) {
                        return Datatables::of($words)
                                ->addIndexColumn()
                                ->addColumn('action', function($row){
                                    $edit_url_with_id = 'editw/'.$row->id;
                                    $btn = '<a href="'.$edit_url_with_id.'" class="edit btn btn-outline-primary btn-sm">Edit</a>';
                                    return $btn;
                                })
                                ->rawColumns(['action'])
                                ->make(true);
                    }
                    return view('Word.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =\DB::table('categories')->orderBy('catname','ASC')->get();
        $data['categories'] = $categories;
        return view('Word.create',$data);
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
            'wordname' => 'required|min:3|max:255',
            'category_id'=>'required',
        ]);
        $words = new Words;
        $words->wordname= $request->wordname;
        $words->category_id = $request->category_id;
        $words->highlight= $request->wordname;
        $words->save();
        return redirect()->back()->with('status', 'Word updated successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editw($id)
    {
        $categories =\DB::table('categories')->orderBy('catname','ASC')->get();
        $data['categories'] = $categories;
        $word = Words::find($id);
        return view('Word.edit',$data, compact('word'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatew(Request $request,$id)
    {
        $words = Words::find($id);
        $words->wordname = $request->input('wordname');
        $words->category_id = $request->input('category_id');
        $words->update();
        return redirect()->back()->with('status','Word Updated Successfully');
    }

    public function importView(Request $request){
        return view('importFile')->with('sucess');
    }

    public function import(Request $request){
        $request->validate([
            'file' => 'required|mimes:csv,xlsx',
        ]);
        $convertedArrayData = Excel::toCollection(collect([]), $request->file('file'));
        // dd($convertedArrayData->toArray());
        $arr= Excel::import(new ImportUser, $request->file('file')->store('files'));
        // dd($arr);
        return redirect()->back()->with('success', 'CSV file imported successfully');
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }


}
