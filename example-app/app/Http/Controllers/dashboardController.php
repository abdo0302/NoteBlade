<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
   public function dashboard(){
    $id=Auth::user()->id;
    $notes = Note::where('user_id', $id)->paginate(5);
    $catigoris=Categorie::where('user_id', $id)->get();
    return view('dashboard',compact('notes','catigoris'));
   }
}
