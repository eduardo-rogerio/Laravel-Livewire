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

    public function createExpense()
    {
        $this->validate([
            'amount' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        Expenses::create([
            'amount' => $this->amount,
            'description' => $this->description,
            'type' => $this->type,
            'user_id' => '1',
        ]);

        $this->reset();
    }
}
