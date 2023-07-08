<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $formCreate = false ; 
    public $formUpdate = false ; 
    public $paginate = 5 ;
    public $search;

    protected $listeners = [
        'contactStored' => 'handleStored',
        'afterUpdate' => 'handleAfterUpdate'
        
    ];

    protected $queryString = ['search'];

    public function mount () {
        $this->search = request()->query('search', $this->search);
    }

    public function render()
    {
        
        return view('livewire.contact-index', [
            'users' => $this->search === NULL ? 
            User::orderBy('name', 'ASC')->paginate($this->paginate) :
            User::orderBy('name', 'ASC')->where('name', 'like' , '%'.$this->search.'%')->orWhere('email', 'like', '$'.$this->search.'%')->paginate($this->paginate)
        ]);
    }

    public function handleStored ($userNew) {
        $this->formCreate = false;
        session()->flash('message', 'User Successfully Created');
    }

    public function handleAfterUpdate () {
        $this->formUpdate = false;
        session()->flash('message', 'User Successfully Updated');
    }

    public function showFormCreate () {
        $this->formUpdate = false;
        $this->formCreate = true;
    }

    public function closeFormCreate () {
        $this->formCreate = false;
    }

    public function closeFormUpdate () {
        $this->formUpdate = false;
    }

    public function clickUpdate($id) {
        $this->formUpdate = true ; 
        $dataUser = User::where('id', $id)->first();
        //dd($dataUser->password);
        $this->emit('showUpdate', $dataUser);
    }

    public function clickDelete ($id) {
        User::where('id', $id)->delete();
        
    }
}
