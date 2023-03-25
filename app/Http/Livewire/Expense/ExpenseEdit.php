<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expenses;
use Livewire\Component;

class ExpenseEdit extends Component
{
    public $description;
    public $amount;
    public $type;
    public Expenses $expense;
    protected $rules = [
        'amount' => 'required',
        'description' => 'required',
        'type' => 'required',
    ];

    public function mount($expense)
    {
        $this->description = $this->expense->description;
        $this->amount = $this->expense->amount;
        $this->type = $this->expense->type;
    }

    public function updateExpense()
    {
        $this->validate();

        $this->expense->update([
            'amount' => $this->amount,
            'description' => $this->description,
            'type' => $this->type,
        ]);

        session()->flash('message', 'Expense updated successfully.');
    }

    public function render()
    {
        return view('livewire.expense.expense-edit');
    }
}
