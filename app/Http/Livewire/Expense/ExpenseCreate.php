<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expenses;
use Livewire\Component;
use Livewire\WithFileUploads;

class ExpenseCreate extends Component
{
    use WithFileUploads;

    public $amount;
    public $description;
    public $type;
    public $photo;
    public $expenseDate;

    public function render()
    {
        return view('livewire.expense.expense-create');
    }

    protected $rules = [
        'amount' => 'required|numeric',
        'description' => 'required',
        'type' => 'required',
        'photo' => 'image|max:4098|nullable', // 4MB Max
    ];

    public function createExpense()
    {
        $this->validate();

        if ($this->photo) {
            $photo = $this->photo->store('expenses-photos', 'public');
        }
        Expenses::create([
            'amount' => $this->amount,
            'description' => $this->description,
            'type' => $this->type,
            'user_id' => '1',
            'photo' => $photo ?? null,
            'expense_date' => $this->expenseDate ?? null,
        ]);

        session()->flash('message', 'Expense created successfully.');

        $this->reset();
    }
}
