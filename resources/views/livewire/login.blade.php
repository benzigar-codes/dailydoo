<div class="min-h-screen w-full xl:w-1/2 p-8 flex justify-center items-center">
    <div class="p-6 bg-white space-y-3">
        <div class="flex space-x-4 items-center">
            <div class="h-8 w-8 text-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
            </div>
            <h1 class="font-bold text-3xl text-green-800">DailyDoooo's</h1>
        </div>
        <p class="text-gray-600">A webpage to save all your daily work's</p>
        <hr>
        <div>
            <form wire:submit.prevent="login()" class="flex flex-col space-y-4" action="">
                <div class="flex space-x-2 items-center justify-center">
                    <div class="h-10 w-10 text-green-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h1 class="text-center font-bold text-green-800 text-3xl">Log in</h1>
                </div>
                <div class="px-3 mb-5 flex flex-col space-y-4">
                    @if($message != '')
                    <p class="text-center text-red-600 font-bold">Check email and password</p>
                    @endif
                    <p class="font-bold">Email : 
                    @error("email")
                    <span class="text-red-800">
                        {{$message}}
                    </span>
                    @enderror
                    </p>
                    <input type="text" wire:model="email" name="emaill" id="" class="bg-gray-100 border-4 border-green-800 p-3 ">
                    <p class="font-bold">Password : 
                    @error("password")
                    <span class="text-red-800">
                        {{$message}}
                    </span>
                    @enderror
                    </p>
                    <input type="password" wire:model="password" name="emaill" id="" class="bg-gray-100 border-4 border-green-800 p-3 ">
                    <button wire:click="login()" class="bg-green-800 py-2 text-white">Continue</button>
                </div>
            </form>
        </div>
    </div>
</div>