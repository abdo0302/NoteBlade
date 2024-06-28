<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class categoryController extends Controller
{
    public function store(Request $request){
        $name=$request->name;

        $request->validate([
            'name'=>'required|string|max:100'
        ]);

        $catigori=Categorie::create([
            'name'=>$name,
            'user_id'=>Auth::user()->id
        ]);
        if($catigori){
            return redirect()->back()->withInput()->with('creer','Created successfully');
        }
    }

    public function destroy(Request $request){
        $id=$request->id;
        $catigori=Categorie::find($id);
        $notes=DB::table('notes')->where('category_id',$id)->delete();
        if($catigori){
            $catigori->delete();
            return redirect()->route('dashboard')->with('creer','deleted successfully');
        }
    }
}
