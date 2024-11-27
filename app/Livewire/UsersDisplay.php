<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class UsersDisplay extends Component
{
    public $user;
    public $classrooms;
    public $newName;
    public $newMail;


    public function mount()
    {
        $this->user = Auth::user();
        $this->classrooms = $this->user->classrooms;
    }

    public function deleteUser(User $user)
    {
        $user->delete();
    }

    public function createUser($classId)
    {
        $u = new User;
        $u->name = $this->newName;
        $u->email = $this->newMail;
        $u->password = Hash::make('coucou');
        $u->classroom_id = $classId;
        $u->is_admin = 0;
        $u->save();
    }

    public function render()
    {
        return view('livewire.users-display');
    }
}
