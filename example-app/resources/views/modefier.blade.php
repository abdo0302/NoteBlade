
@extends('layouts.layout')
@section('afficher_note')
@foreach ($note as $item)
    @include('dashboard')
    <div class="absolute top-3 right-5"><a href="/dashboard"><i class="fa-solid fa-x text-white button_close_section_creer_cgategory hover:bg-slate-300 p-4 rounded-full"></i></a></div>
        {{-- modifier note --}}
   @foreach ($note as $item)
   <section class="bg-black/60 w-full h-screen fixed top-0 left-0 flex flex-col justify-center items-center z-30">
    <div class="absolute top-3 right-5"><a href="/dashboard"><i class="fa-solid fa-x text-white hover:bg-slate-300 p-4 rounded-full"></i></a></div>
    <form method="POST" action="{{route('note.modifier')}}" class="flex flex-col w-1/3 bg-white p-9 items-center gap-2 rounded-xl">
        @csrf
        <h3 class="text-black font-bold text-xl mb-5">Modifier un Note</h3>
        <input class=" hidden" type="text" name='id' value="{{$item->id}}">
        <input class="border border-slate-500 w-4/5 p-1 rounded-md shadow" type="text" name="title" placeholder="title" value="{{$item->title}}">
        <input class="border border-slate-500 w-4/5 p-1 rounded-md shadow" type="text" name="description" placeholder="description" value="{{$item->contenu}}">
        <input class="border border-slate-500 w-4/5 p-1 rounded-md shadow" type="date"  name="date" placeholder="date" value="{{$item->date}}">
        <select name="priority" id="" class="border border-slate-500 w-4/5 p-1 rounded-md shadow" value="{{$item->priority}}">
            <option value="Très important">Très important</option>
            <option value="important">important</option>
            <option value="Sans importance">Sans importance</option>
        </select>
        <select name="category_id" id="" class="border border-slate-500 w-4/5 p-1 rounded-md shadow" value="{{$item->category_id}}">
            @foreach ($catigori as $it)
                <option value="{{$it->id}}">{{$it->name}}</option>                
            @endforeach 
        </select>
        <input class="border border-slate-500 w-4/5 p-1 rounded-md shadow bg-neutral-700 text-white hover:bg-neutral-600" type="submit" value="modifier">
    </form>
   </section>
@endforeach  
@endforeach

@endsection