<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expenses;
use Livewire\Component;

class ExpenseList extends Component
{
    public function render()
    {
        $expenses = Expenses::paginate(3) ? Expenses::query()
            ->orderBy('created_at', 'desc')
            ->paginate(3) : [];

        return view('livewire.expense.expense-list', compact('expenses'));
    }

    public function remove($expense)
    {
        Expenses::find($expense)
            ->delete();
        session()->flash('message', 'Expense deleted successfully.');
    }
}
