<div>
    <x-slot name="header">
        Editando Registro
    </x-slot>

    @if(session()->has('$message'))
        <div class="alert alert-success">
            {{ session('$message') }}
        </div>
    @endif

    <form action="" wire:submit.prevent="updateExpense">
        <p>
            <label>Descrição Registro</label>
            <input type="text" wire:model="description" class="shadow border-t">
            @error('description')
            <span class="error">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>Valor do Registro</label>
            <input type="text" wire:model="amount" class="shadow border-t">
            @error('amount')
            <span class="error">{{ $message }}</span> @enderror
        </p>

        <p>
            <label>Tipo do Registro</label>
            <select name="type" id="" class="shadow border-t" wire:model="type">
                <option value="">Selecione o tipo do registro</option>
                <option value="1">Entrada</option>
                <option value="2">Saída</option>
            </select>
            @error('type')
            <span class="error">{{ $message }}</span> @enderror
        </p>
        <button type="submit">Atualizar Registro</button>
    </form>
</div>