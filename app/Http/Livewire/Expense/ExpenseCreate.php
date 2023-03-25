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

    public function store()
    {
        $this->validate([
            'amount' => 'required',
            'description' => 'required',
            'type' => 'required',
        ]);

        $expense = new Expenses();
        $expense->amount = $this->amount;
        $expense->description = $this->description;
        $expense->type = $this->type;
        $expense->save();

        $this->resetInputFields();
        $this->emit('expenseAdded');
    }
}
