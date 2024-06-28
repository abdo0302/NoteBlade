    {{-- creer note --}}
    <section class="bg-black/70 w-full h-screen fixed top-0 left-0 flex flex-col justify-center items-center z-30 section_cree_note">
        <div class="absolute top-3 right-5"><i class="fa-solid fa-x text-white button_close hover:bg-slate-300 p-4 rounded-full"></i></div>
        <form method="POST" action="{{route('note.store')}}" class="flex flex-col w-1/3 bg-white p-9 items-center gap-2 rounded-xl">
            @csrf
            <h3 class="text-black font-bold text-xl mb-5">Créer un Note</h3>
            <input class="border border-slate-500 w-4/5 p-1 rounded-md shadow" type="text" name="title" placeholder="title">
            <input class="border border-slate-500 w-4/5 p-1 rounded-md shadow" type="text" name="description" placeholder="description">
            <input class="border border-slate-500 w-4/5 p-1 rounded-md shadow" type="date"  name="date" placeholder="date">
            <select name="priority" id="" class="border border-slate-500 w-4/5 p-1 rounded-md shadow">
                <option value="Très important">Très important</option>
                <option value="important">important</option>
                <option value="Sans importance">Sans importance</option>
            </select>
            <select name="category_id" id="" class="border border-slate-500 w-4/5 p-1 rounded-md shadow">
                @foreach ($catigoris as $it)
                    <option value="{{$it->id}}">{{$it->name}}</option>                
                @endforeach 
            </select>
            <input class="border border-slate-500 w-4/5 p-1 rounded-md shadow bg-indigo-600 text-white hover:bg-indigo-700" type="submit" value="Créer">
        </form>
    </section>   
    {{-- creer gatigori --}}
    <section class="bg-black/70 w-full h-screen fixed top-0 left-0 flex flex-col justify-center items-center z-30 section_cree_catigori">
        <div class="absolute top-3 right-5"><i class="fa-solid fa-x text-white button_close_section_creer_cgategory hover:bg-slate-300 p-4 rounded-full"></i></div>
        <form method="POST" action="{{route('category.store')}}" class="flex flex-col w-1/3 bg-white p-9 items-center gap-2 rounded-xl">
            @csrf
            <h3 class="text-black font-bold text-xl mb-5">Créer un cgategory</h3>
            <input class="border border-slate-500 w-4/5 p-1 rounded-md shadow" type="text" name="name" placeholder="name de cgategory">
            
            <input class="border border-slate-500 w-4/5 p-1 rounded-md shadow bg-indigo-600 text-white hover:bg-indigo-700" type="submit" value="Créer">
        </form>
    </section>