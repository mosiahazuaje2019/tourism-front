<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PreUser;

class UserList extends Component
{
    public $users;

    public function mount() {
        $this->users = PreUser::where('is_active',1)->get();
    }

    public function approve($id) {
        return redirect()->to('/tenants/create?id='.$id);
    }

    public function render()
    {
        return view('livewire.user-list');
    }
}
