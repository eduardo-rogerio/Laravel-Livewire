<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expenses;
use Livewire\Component;

class ExpenseCreate extends Component
{
    public $amount;
    public $description;
    public $type;

    public function render()
    {
        return view('livewire.expense.expense-create');
    }

    protected $rules = [
        'amount' => 'required|numeric',
        'description' => 'required',
        'type' => 'required',
    ];

    public function createExpense()
    {
        $this->validate();

        Expenses::create([
            'amount' => $this->amount,
            'description' => $this->description,
            'type' => $this->type,
            'user_id' => '1',
        ]);

        session()->flash('message', 'Expense created successfully.');

        $this->reset();
    }
}
