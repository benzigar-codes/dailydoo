<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class Login extends Component
{
	public $email,$password;
	public $message;
	public function login()
	{
		$this->validate([
			"email" => "required|email",
			"password" => "required|min:5"
		]);
		if(Auth::attempt(["email" => $this->email,"password" => $this->password])){
			$this->message="";
			redirect(route("home"));
		}
		else{
			$this->message="Check email and password";
		}

	}
    public function render()
    {
        return view('livewire.login');
    }
}
