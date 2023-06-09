<?php

namespace App\Http\Livewire\Form\Backend;

use App\Services\Helper;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class CareerCEV extends Component
{
    public $career_description;

    public function mount()
    {
        $this->career_description = Helper::get_static_option('career_description');
    }

    protected $rules = [
        'career_description' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        abort_if(Gate::denies('practice_places'), 403);

        $validatedData = $this->validate();

        foreach ($validatedData as $key => $value) {
            Helper::set_static_option($key, $value);
        }

        return $this->redirectRoute('admin.practice_places');
    }

    public function render()
    {
        return view('livewire.form.backend.career-c-e-v');
    }
}
