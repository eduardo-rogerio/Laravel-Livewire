<div class="py-4">
    @include('includes.message')

    <x-slot name="header">
        Criar Registro
    </x-slot>

    <form action="" wire:submit.prevent="createExpense">
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
        <button type="submit">Criar Registro</button>
    </form>

</div>
