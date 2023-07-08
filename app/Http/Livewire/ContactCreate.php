<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class ContactCreate extends Component
{
    public $name, $email, $password;

    // public function mount($contacts) 
    // {
    //     //dd($contacts);
    //     $this->contacts = $contacts;
    // }
    public function render()
    {
        return view('livewire.contact-create');
    }
    
    public function store()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required'
        ]);


       $userNew = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
       ]);

       $this->resetInput();
       $this->emit('contactStored', $userNew);
    }

    private function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

}
