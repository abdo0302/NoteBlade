@extends('layouts.layout')
@section('afficher_note')
@foreach ($note as $item)
    @include('dashboard')
    <section class="w-full h-screen fixed top-0 right-0 z-50 flex justify-center items-center bg-black/60">
        <div class="absolute top-3 right-5"><a href="/dashboard"><i class="fa-solid fa-x text-white button_close_section_creer_cgategory hover:bg-slate-300 p-4 rounded-full"></i></a></div>
        <div class="bg-white p-3 pt-2 shadow-md shadow-slate-400 rounded-lg w-1/2">
                <main class="flex justify-between">
                    <section>
                        <h1 class="text-lg font-semibold">{{$item->title}}</h1>
                        <p class="text-sm text-slate-800 mt-2">{{$item->contenu}}</p>
                    </section>
                    <aside class="bg-slate-200/40 w-2/5 p-2">
                        <div class="border-b border-slate-300 pb-2 ">
                            <h2>Category</h2>
                            # <span class="text-sm">
                                @foreach ($catigoris as $it)
                                    @if ($it->id==$item->category_id)
                                        {{$it->name}}
                                    @endif
                                @endforeach
                            </span>
                        </div>
                        <div class="border-b border-slate-300 pb-2 mt-3">
                            <h2>Due date</h2>
                            <i class="fa-solid fa-calendar-days"></i> <span class="text-sm">10/2/2024</span>
                        </div>
                        <div class="border-b border-slate-300 pb-2 mt-3">
                            <h2>priority</h2>
                                {{-- priority --}}
                                @switch($item->priority)
                                @case('Très important')
                                <i class="fa-solid fa-flag text-red-600"></i>
                                    @break
                                @case('important')
                                <i class="fa-solid fa-flag text-yellow-500"></i>
                                    @break
                                @case('Sans importance') 
                                <i class="fa-solid fa-flag text-green-600"></i>
                                    @break   
                                @endswitch
                            <span class="text-sm">{{$item->priority}}</span>
                        </div>
                    </aside>
                </main>
            </div>
    </section>
    
@endforeach

@endsection