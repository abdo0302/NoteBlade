@extends('layouts.layout')
@section('afficher_note')
<section class="flex h-screen fixed top-0 left-0 w-full">
   <nav class="h-screen bg-white/85">
    @include('layouts.navigation')
   </nav>
<main class="w-full">
    @include('layouts.search')
    <div class="h-screen overflow-y-auto w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-lg font-semibold bg-white p-3 w-fit rounded-3xl">
                        
                        @foreach ($catigori as $item)
                            {{$item->name}}
                        @endforeach
                    </h1>
                </div>
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-wrap gap-3 justify-center"> 
                @foreach ($notes as $item)
                
                        <!--card note-->
                        <a href="/note/afficher/{{$item->id}}">
                        <div class=" border-b bg-white border-slate-300 card_note p-5 rounded-lg">
                            <div class=" w-full">
                            <div class="flex items-center gap-2  w-full">
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
                                <h1 class="font-semibold text-black/95 text-lg title_note"><a class="text-black/95" href="/note/afficher/{{$item->id}}">{{$item->title}}</a></h1><span class="ml-auto text-sm"><span class="ml-auto text-sm"> </span></div> 
                                <p class="font-light ml-5 mb-3 contenu">{{$item->contenu}}</p>
                                <span class="ml-5 text-sm"><i class="fa-solid fa-calendar-days"></i> {{$item->date}}</span>
                            </div>
                            <div class="flex gap-4 buttons w-full justify-center mt-3">
                                <a class="shadow-lg shadow-slate-200 hover:shadow-md bg-white p-2 px-6 rounded-xl" href="/note/modifier/{{$item->id}}"><i class="fa-solid fa-pen text-blue-500"></i></a>
                                <a class="bg-white p-2 px-6 shadow-lg hover:shadow-md shadow-slate-200 rounded-xl" href="/note/destroy/{{$item->id}}"><i class="fa-solid fa-trash text-blue-500"></i></a>
                            </div>
                        </div> 
                        </a>
                        
                
                        
                @endforeach
                
            </div>
        </div>
        {{-- pagination --}}

        <div class="bg-white mt-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg px-24">
            {{$notes->links()}} 
        </div>
    </div> 
</main> 
@include('layouts.creer')
@include('layouts.notif')
</section>
@endsection