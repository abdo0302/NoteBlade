     {{-- nofit --}}
     @if (session()->has('creer'))
     <div class="notif_pop_up fixed top-0 right-0 w-full h-screen bg-black/20 flex justify-center items-center">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="p-4 md:p-5 text-center flex flex-col justify-center items-center gap-4">
                    <svg class="ft-green-tick" xmlns="http://www.w3.org/2000/svg" height="50" width="50" viewBox="0 0 48 48" aria-hidden="true">
                        <circle class="circle" fill="#5bb543" cx="24" cy="24" r="22"/>
                        <path class="tick" fill="none" stroke="#FFF" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M14 27l5.917 4.917L34 17"/>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{session('creer')}}</h3>
                </div>
            </div>
     </div>
     <script>
        let notif_pop_up=document.querySelector('.notif_pop_up')
        setTimeout(() => {
            notif_pop_up.style.display='none'
        }, 1500);
     </script>
    @endif