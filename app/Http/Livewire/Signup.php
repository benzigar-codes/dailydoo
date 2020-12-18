<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Auth;

class Signup extends Component
{
	use WithFileUploads;
	public $name,$email,$password,$photo;
	public function signup()
	{
		$this->validate([
			"name" => "required|min:3",
			"email" => "required|email|unique:users",
			"password" => "required|min:5",
			'photo' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024'
		]);
		$path = $this->photo->store("uploads","public");
		\App\User::create([
			"name" => $this->name,
			"email" => $this->email,
			"password" =>bcrypt($this->password),
			"image" => $path
		]);
		if(Auth::attempt(["email" => $this->email,"password" => $this->password])){
			redirect(route("home"));
		}

	}
    public function render()
    {
        return view('livewire.signup');
    }
}
