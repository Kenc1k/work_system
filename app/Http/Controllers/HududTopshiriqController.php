<?php

namespace App\Http\Controllers;

use App\Models\Hudud;
use App\Models\HududTopshiriq;
use App\Models\Topshiriq;
use Illuminate\Http\Request;

class HududTopshiriqController extends Controller
{
    public function index()
    {
        $hududtopshiriqs = HududTopshiriq::all();
        return view('HududTopshiriq.index' , compact('hududtopshiriqs'));
    }

    public function create()
    {
        $hududs = Hudud::all();
        $topshiriqs = Topshiriq::all();
        return view('HududTopshiriq.create', compact('hududs', 'topshiriqs'));
    }

    public function store(Request $request)
    {
        // dd(123);
        $data = $request->validate([
            'hudud_id'=>'required',
            'topshiriq_id'=>'required',
            'status'=>'required',
        ]);
        // dd($data);
        HududTopshiriq::create($data);

        return redirect('/hudud_topshiriq');
    }

    public function edit($id)
    {
        $hududTopshiriq = HududTopshiriq::findOrFail($id);
    
        // Fetch all hududs and topshiriqs
        $hududs = Hudud::all(); // Assuming you have a Hudud model
        $topshiriqs = Topshiriq::all(); // Assuming you have a Topshiriq model
    
        return view('HududTopshiriq.edit', compact('hududTopshiriq', 'hududs', 'topshiriqs'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'hudud_id'=>'required',
            'topshiriq_id'=>'required',
            'stutus'=>'required',
        ]);

        $hududtopshiriq = HududTopshiriq::findOrFail($id);
        $hududtopshiriq->update($data);

        return redirect('/hududtopshiriq');
    }

    public function destroy($id)
    {
        $hududtopshiriq = HududTopshiriq::findOrFail($id);
        $hududtopshiriq->delete();

        return redirect('/hududtopshiriq');
    }
}
