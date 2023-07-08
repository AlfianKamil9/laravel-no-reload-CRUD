<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ContactUpdate extends Component
{
    public $name, $email,  $setId;

    protected $listeners = [
        'showUpdate' => 'getShowUpdate'
    ];

    public function render()
    {
        return view('livewire.contact-update');
    }

    public function getShowUpdate ($dataUser) {
       
        $this->name = $dataUser['name'];
        $this->email = $dataUser['email'];
        $this->setId = $dataUser['id'];
        //$this->password = $dataUser['password'];
    }
    
    public function update () {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
        ]);

        $userUpdate = User::where('id', $this->setId)->update([
            'name' => $this->name,
            'email' => $this->email
        ]);

        $this->emit('afterUpdate', $userUpdate);
    }
}
