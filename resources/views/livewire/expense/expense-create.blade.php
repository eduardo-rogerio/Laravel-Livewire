<div>
    <h3>Criar Registro</h3>
    <hr>
    <form action="" wire:submit.prevent="createExpense">
        <p>
            <label>Descrição Registro</label>
            <input type="text" wire:model="description" class="shadow border-t">
        </p>

        <p>
            <label>Valor do Registro</label>
            <input type="text" wire:model="amount" class="shadow border-t">
        </p>

        <p>
            <label>Tipo do Registro</label>
            <select name="type" id="" class="shadow border-t" wire:model="type">
                <option value="">Selecione o tipo do registro</option>
                <option value="1">Entrada</option>
                <option value="2">Saída</option>
            </select>
        </p>
        <button type="submit">Criar Registro</button>
    </form>
</div>
