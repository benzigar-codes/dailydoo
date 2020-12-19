<div class="min-h-screen bg-green-800">
	{{-- Navbar --}}
	<div class="w-full bg-white p-5 flex
	 items-center justify-between">
		<div class="flex space-x-4 items-center">
            <div class="h-8 w-8 text-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                </svg>
            </div>
            <h1 class="font-bold text-3xl text-green-800">DailyDoooo's</h1>
        </div>
        <div class="flex items-center space-x-4">
        	<p>{{auth()->user()->name}}</p>
        	<img class="h-10 w-10 object-cover rounded-full border-4 border-green-600" src="/storage/{{auth()->user()->image}}" alt="">
        	<a href="{{route("logout")}}" class="hover:text-green-600">
        		<div class="flex space-x-2 items-center">
		            <div class="h-8 w-8 text-green-800">
		                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
					</svg>
		            </div>
		            <h1 class="font-bold text-green-800">Log out</h1>
		        </div>
        	</a>
        </div>
	</div>
	<div class="flex">
		{{-- Date --}}
		<div class="w-1/5 p-4">
			<div class="bg-white p-5 space-y-3">
				<div class="flex items-center space-x-2">
					<div class="h-8 w-8 text-green-800">
    					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
						</svg>
    				</div>
    				<h1 class="font-bold text-xl text-green-900">{{\Carbon\Carbon::parse($dateDetermined)->toFormattedDateString()}}</h1>
				</div>
				<hr>
				<p>Change the date</p>
				<input type="date" wire:model="changeDate" name="date" id="date">
			</div>
		</div>
		{{-- All Tasks --}}
		<div class="w-2/5 p-4">
			<div class="bg-white p-4 space-y-4 overflow-scroll">
				@if(count($morningLearn) == 0 && count($morningWork) == 0 && count($afternoonLearn) == 0 && count($afternoonWork) == 0)
					<p class="text-green-800 font-bold">No Record Till now</p>
				@endif
				@if((count($morningLearn) > 0) || (count($morningWork) > 0))
				<div>
					<div class="flex items-center space-x-2">
    					<div class="h-8 w-8 text-green-800">
	    					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
							</svg>
	    				</div>
	    				<h1 class="font-bold text-xl text-green-900">Morning</h1>
    				</div>
					<div class="flex">
						@if(count($morningLearn) > 0)
						<div class="w-1/2 ml-10">
							<h1 class="text-xl font-bold">Learn</h1>
							@foreach($morningLearn as $morn)
							<div class="flex animate__animated animate__fadeIn">
								<p class="text-gray-800 flex">{{$morn->name}}
								</p>
								<div wire:click="deleteDoo({{$morn->id}})" class="h-5 w-5 text-red-300 ml-2 hover:text-red-800">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
									</svg>
								</div>
							</div>
							@endforeach
						</div>
						@endif
						@if(count($morningWork) > 0)
						<div class="w-1/2 border-l-4 pl-4">
							<h1 class="text-xl font-bold">Work</h1>
							@foreach($morningWork as $morn)
							<div class="flex animate__animated animate__fadeIn">
								<p class="text-gray-800 flex">{{$morn->name}}
								</p>
								<div class="h-5 w-5 text-red-300 ml-2 hover:text-red-800">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
									</svg>
								</div>
							</div>
							@endforeach
						</div>
						@endif
					</div>
				</div> 
				<hr>
				@endif
				@if((count($afternoonLearn) > 0) || (count($afternoonWork) > 0))
				<div>
					<div class="flex items-center space-x-2">
    					<div class="h-8 w-8 text-green-800">
	    					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
							</svg>
	    				</div>
	    				<h1 class="font-bold text-xl text-green-900">Afternoon</h1>
    				</div>
    				<div class="flex">
    					@if(count($afternoonLearn) > 0)
						<div class="w-1/2 ml-10">
							<h1 class="text-xl font-bold">Learn</h1>
							@foreach($afternoonLearn as $morn)
							<div class="flex animate__animated animate__fadeIn">
								<p class="text-gray-800 flex">{{$morn->name}}
								</p>
								<div wire:click="deleteDoo({{$morn->id}})" class="h-5 w-5 text-red-300 ml-2 hover:text-red-800">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
									</svg>
								</div>
							</div>
							@endforeach
						</div>
						@endif
						@if(count($afternoonWork) > 0)
						<div class="w-1/2 border-l-4 pl-4">
							<h1 class="text-xl font-bold">Work</h1>
							@foreach($afternoonWork as $morn)
							<div class="flex animate__animated animate__fadeIn">
								<p class="text-gray-800 flex">{{$morn->name}}
								</p>
								<div wire:click="deleteDoo({{$morn->id}})" class="h-5 w-5 text-red-300 ml-2 hover:text-red-800">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
									</svg>
								</div>
							</div>
							@endforeach
						</div>
						@endif
					</div>
				</div>
				@endif
			</div>
		</div>
		{{-- Todos --}}
		<div class="w-1/5 p-4">
			<div class="bg-white p-5 space-y-3">
				<div class="flex items-center space-x-2">
					<div class="h-8 w-8 text-green-800">
    					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
						</svg>
    				</div>
    				<h1 class="font-bold text-xl text-green-900">To Do's</h1>
				</div>
				<hr>
				<div class="flex items-center ml-1 grid grid-cols-6">
					@foreach(\App\Todo::where("completed","0")->get() as $todo)
					<input wire:click="todoCompleted({{$todo->id}})" type="checkbox" class="form-checkbox h-5 w-5">
					<p class="overflow-ellipsis col-span-4">{{$todo->task}}</p>
					<div wire:click="deleteTodo({{$todo->id}})" class="h-5 w-5 text-red-300 ml-2 hover:text-red-800">
						<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
						</svg>
					</div>
					@endforeach
				</div>
				<div class="flex">
					<input type="text" wire:keydown.enter="addTodo()"  wire:model="task" name="emaill" id="" class="bg-gray-100 border-b-4 border-green-800 p-3 w-full" placeholder="Type..">
				</div>
			</div>
		</div>
		{{-- Insert Todooo --}}
		<div class="w-1/5 p-4">
			<form wire:submit.prevent="addDoo()" class="bg-white p-5 space-y-3">
				<div class="flex items-center space-x-2">
					<div class="h-8 w-8 text-green-800">
    					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
						</svg>
    				</div>
    				<h1 class="font-bold text-xl text-green-900">Insert Doooo's</h1>
				</div>
				<hr>
				<div class="flex">
					<input type="text" wire:model="name" name="emaill" id="" class="bg-gray-100 border-b-4 border-green-800 p-3 w-full" placeholder="Type..">
				</div>
				<div class="flex">
					<select wire:model="type" name="" class="bg-gray-100 p-3 w-full" id="">
						<option value="learn">Learn</option>
						<option value="work">Work</option>
					</select>
				</div>
				<button class="bg-green-800 border-b-4 text-white border-gray-800 p-3 w-full">Done</button>
			</form>
		</div>
	</div>
</div>