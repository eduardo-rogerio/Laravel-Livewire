<div>
    @include('includes.message')

    <x-slot name="header">
        Meus Registros
    </x-slot>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Data Registro</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($expenses as $expense)
            <tr>
                <td>{{ $expense->id }}</td>
                <td>{{ $expense->description }}</td>
                <td>{{ $expense->amount }}</td>
                <td>{{ $expense->created_at->format('d/m/Y')}}</td>
                <td>
                    <a href="{{ route('expenses.edit',$expense->id) }}">Editar</a>
                    <a href="#" wire:click.prevent="remove({{$expense->id}})">Deletar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $expenses->links() }}
</div>
