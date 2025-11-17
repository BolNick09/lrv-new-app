<?php

namespace App\Livewire;

use Livewire\Component;

class MirrorText extends Component
{
    public string $text = "";

    public function render()
    {
        return view('livewire.mirror-text');
    }
}
