<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTopshiriqRequest;
use App\Http\Requests\UpdateTopshiriqRequest;
use App\Models\Category;
use App\Models\Topshiriq;
use Illuminate\Http\Request;

class TopshiriqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Topshiriq::query();
    
        // Check if both start_date and end_date are present in the request
        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('muddat', [$request->start_date, $request->end_date]);
        }
    
        // Optionally, you can check if the user only selects one date (start or end date) and filter accordingly.
    
        $topshiriqs = $query->get();
    
        return view('topshiriq.index', compact('topshiriqs'));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('topshiriq.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd(123);
        $data = $request->validate([
            'category_id' => 'required',
            'ijrochi' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
            'muddat' => 'required|date',
        ]);
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('/home/kenc1k/work_system/public/files', $fileName);
            $data['file'] = $fileName;
        }
        
        Topshiriq::create($data);
        // dd($data);
        
        return redirect('/topshiriq')->with('success', 'Topshiriq created successfully!');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Topshiriq $topshiriq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $topshiriq = Topshiriq::findOrFail($id);
        $categories = Category::all();
        return view('topshiriq.edit' , compact('topshiriq' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $topshiriq = Topshiriq::findOrFail($id);
    
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'ijrochi' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:2048',
            'muddat' => 'required|date',
        ]);
    
        if ($request->hasFile('file')) {
            if ($topshiriq->file && file_exists('/home/kenc1k/work_system/public/files/' . $topshiriq->file)) {
                unlink('/home/kenc1k/work_system/public/files/' . $topshiriq->file);
            }
    
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('/home/kenc1k/work_system/public/files', $fileName);
            $data['file'] = $fileName; 
        }
    
        $topshiriq->update($data);
    
        return redirect('/topshiriq')->with('success', 'Topshiriq updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $topshiriq = Topshiriq::findOrFail($id);
        $topshiriq->delete();

        return redirect('/topshiriq');
    }
}
