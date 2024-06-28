let button_close=document.querySelector('.button_close')
let section_cree_note=document.querySelector('.section_cree_note')
let add_task=document.querySelector('.add_task')

section_cree_note.style.display='none'

button_close.onclick=()=>{
    section_cree_note.style.display='none'
}
add_task.onclick=()=>{
    section_cree_note.style.display='flex'
}

// creer catigori
let button_crre_catigori=document.querySelector('.button_crre_catigori')
let section_cree_catigori=document.querySelector('.section_cree_catigori')
let button_close_section_creer_cgategory=document.querySelector('.button_close_section_creer_cgategory')

section_cree_catigori.style.display='none'
button_crre_catigori.onclick=()=>{
    section_cree_catigori.style.display='flex'
}

button_close_section_creer_cgategory.onclick=()=>{
    section_cree_catigori.style.display='none'
}


//input search bdsfgt
let input_search=document.querySelector('.input_search')
let title_note=document.querySelectorAll('.title_note')
let card_notes=document.querySelectorAll('.card_notes')
let contenar_search_notes=document.querySelector('.contenar_search_notes')

input_search.addEventListener('keydown',()=>{
    contenar_search_notes.innerHTML=''
    title_note.forEach((e,i) => {
        if (e.textContent.includes(input_search.value)) {
            r=e.cloneNode(true);
            contenar_search_notes.appendChild(r)
        }
        
        
    });
})
input_search.addEventListener('blur',()=>{
    if(input_search.value==''){
        contenar_search_notes.innerHTML=''

    }
})