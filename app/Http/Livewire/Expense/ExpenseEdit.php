<?php

namespace App\Http\Livewire\Expense;

use App\Models\Expenses;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ExpenseEdit extends Component
{
    use WithFileUploads;

    public $photo;
    public $description;
    public $amount;
    public $type;
    public Expenses $expense;
    protected $rules = [
        'amount' => 'required|numeric',
        'description' => 'required',
        'type' => 'required',
        'photo' => 'image|max:4098|nullable', // 4MB Max
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

        if ($this->photo) {
            if (Storage::disk('public')
                ->exists($this->expense->photo)) {
                Storage::disk('public')
                    ->delete($this->expense->photo);
            }
            $this->photo = $this->photo->store('expenses-photos', 'public');
        }

        $this->expense->update([
            'amount' => $this->amount,
            'description' => $this->description,
            'type' => $this->type,
            'photo' => $this->photo ?? null,
        ]);

        session()->flash('message', 'Expense updated successfully.');
    }

    public function render()
    {
        return view('livewire.expense.expense-edit');
    }
}
