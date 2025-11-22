<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class AssignRole extends Component
{
    public $selectedUser = '';
    public $selectedRole = '';
    
    public $users = [];
    public $roles = [];

    public function mount()
    {
        $this->users = User::orderBy('name')->get();
        $this->roles = Role::orderBy('name')->get();
    }

    public function assignRole()
    {
        $this->validate([
            'selectedUser' => 'required|exists:users,id',
            'selectedRole' => 'required|exists:roles,id',
        ]);

        // Находим пользователя
        $user = User::find($this->selectedUser);

        // Проверяем, не назначена ли уже эта роль пользователю
        if ($user->roles()->where('role_id', $this->selectedRole)->exists()) {
            session()->flash('error', 'Эта роль уже назначена данному пользователю.');
            return;
        }

        // Прикрепляем роль к пользователю через отношение many-to-many
        $user->roles()->attach($this->selectedRole);

        // Сбрасываем выбранные значения
        $this->reset(['selectedUser', 'selectedRole']);

        session()->flash('success', 'Роль успешно назначена пользователю.');
    }

    public function render()
    {
        return view('livewire.assign-role');
    }
}