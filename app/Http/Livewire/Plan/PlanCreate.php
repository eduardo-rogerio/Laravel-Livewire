<?php

namespace App\Http\Livewire\Plan;

use App\Models\Plan;
use Livewire\Component;

class PlanCreate extends Component
{
    public array $plan = [];

    protected $rules = [
        'plan.name' => 'required',
        'plan.price' => 'required',
        'plan.slug' => 'required',
        'plan.description' => 'required',
        'plan.reference' => 'required',
    ];

    public function createPlan()
    {
        $this->validate();
        $plan = $this->plan;
        $plan['reference'] = 'PagSeguro';

        Plan::create($plan);

        session()->flash('message', 'Plano criado com sucesso.');
    }

    public function render()
    {
        return view('livewire.plan.plan-create');
    }
}
