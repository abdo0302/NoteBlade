<x-app-layout>
    @include('layouts.navigation')
    <x-slot name="header">
    </x-slot>

    <div class="pb-12 h-screen overflow-y-auto w-full">
        @include('layouts.search')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-wrap gap-3 justify-center">
                @foreach ($notes as $item)
                   
                        <!--card note-->
                        <a class="card_notes" href="/note/afficher/{{$item->id}}">
                            <div class=" border-b bg-white border-slate-300 card_note p-5 rounded-lg">
                                <div class="">
                                <div class="flex items-center gap-2">
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
                                    <h1 class="font-semibold text-black/95 text-lg title_note"><a class="text-black/95" href="/note/afficher/{{$item->id}}">{{$item->title}}</a></h1><span class="ml-auto text-sm">
                                    {{-- catigoris --}}
                                    @foreach ($catigoris as $it)
                                        @if($it->id == $item->category_id)
                                            {{ $it->name }}

                                        @endif
                                    @endforeach  
                                    </span></div> 
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
    @include('layouts.creer')
    @include('layouts.notif')
</x-app-layout>



    