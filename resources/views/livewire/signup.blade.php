<div class="w-full xl:w-1/2 bg-white p-5 flex justify-center items-center">
    <div class="p-8">
        <div class="p-6 bg-white space-y-3">
            <div>
                <form wire:submit.prevent="signup()" enctype="multipart/form-data" class="flex flex-col space-y-4" action="">
                    <div class="flex space-x-2 items-center justify-center">
                        <div class="h-10 w-10 text-green-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h1 class="text-center font-bold text-green-800 text-3xl">Sign up</h1>
                    </div>
                    <div class="px-3 mb-5 flex flex-col space-y-4">
                        <p class="font-bold">Name : 
                            @error("name")
                            <span class="text-red-800">
                                {{$message}}
                            </span>
                            @enderror
                        </p>
                        <input type="text" wire:model="name" name="text" id="" class="bg-gray-100 border-4 border-green-800 p-3 ">
                        <p class="font-bold">Email : 
                        @error("email")
                        <span class="text-red-800">
                            {{$message}}
                        </span>
                        @enderror
                        </p>
                        <input type="email" wire:model="email" name="emaill" id="" class="bg-gray-100 border-4 border-green-800 p-3 ">
                        <p class="font-bold">Password : 
                        @error("password")
                        <span class="text-red-800">
                            {{$message}}
                        </span>
                        @enderror</p>
                        <input type="password" wire:model="password" name="emaill" id="" class="bg-gray-100 border-4 border-green-800 p-3 ">
                        <p class="font-bold">
                        <span wire:loading.remove wire:target="photo">Choose your DP :</span>
                        <span wire:loading wire:target="photo">Loading Image </span> 
                        @error("photo")
                        <span class="text-red-800">
                            {{$message}}
                        </span>
                        @enderror
                        </p>
                        @if(!$photo)
                        <input wire:loading.remove wire:target="photo" type="file" wire:model="photo" name="photo" id="photo" class="bg-gray-100 border-4 border-green-800 p-3 ">
                        @endif
                        @if($photo)
                        <div class="flex items-center">
                            <img src="{{$photo->temporaryUrl()}}" class="h-10 w-10 rounded-full object-cover" alt="">
                            <p class="text-green-800 ml-4 font-bold">Image Loaded</p>
                        </div>
                        @endif
                        <button target="signup()" type="submit" class="bg-green-800 py-2 text-white"> <span wire:loading.remove wire:target="signup">Continue</span> <span wire:loading wire:target="signup">Loading</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>