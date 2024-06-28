<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function afficher(Request $request){
        $id=$request->id;
        $note=Note::where('id',$id)->get();
        $catigoris=Categorie::where('user_id',Auth::user()->id)->get();
        $notes = Note::where('category_id', $id)->paginate(5);
        return view('show',compact('note','catigoris','notes'));
    }

    public function store(Request $request){
        $title=$request->title;
        $description=$request->description;
        $date=$request->date;
        $priority=$request->priority;
        $category_id=$request->category_id;

        $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|max:255',
            'date' => 'required',
        ]);
        $note=Note::create([
            'title'=>$title,
            'contenu'=>$description,
            'date'=>$date,
            'priority'=>$priority,
            'user_id'=>Auth::user()->id,
            'category_id'=>$category_id
        ]);
        if($note){
            return redirect()->back()->withInput()->with('creer','Created successfully');
        }
        
    }

    public function show(Request $request){
         $id=$request->id;
         $notes = Note::where('category_id', $id)->paginate(5);
         $catigori=Categorie::where('id', $id)->get();
         $catigoris=Categorie::where('user_id', Auth::user()->id)->get();
        return view('category',compact('notes','catigoris','catigori'));
    }

    public function destroy(Request $request){
        $id=$request->id;
         $note=Note::find($id);
         if($note){
            $note->delete();
            return redirect()->route('dashboard')->with('creer','deleted successfully');
         }
         
    }

    public function modifier(Request $request){
         $id=$request->id;
         $note=Note::where('id',$id)->get();
         $notes = Note::where('category_id', $id)->paginate(5);
         $catigori=Categorie::where('user_id',Auth::user()->id)->get();
         $catigoris=Categorie::where('user_id',Auth::user()->id)->get();
         return view('modefier',compact('note','catigori','catigoris','notes'));
    }

    public function modifier_note(Request $request){
        $note=Note::find($request->id);
        if($note){
            $note->update($request->all());
            return redirect()->route('dashboard')->with('creer','Modifié avec succès');
        }
    }

}
