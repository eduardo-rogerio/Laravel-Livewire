<div class="max-w-7xl mx-auto py-15 px-4">
    @include('includes.message')
    <x-slot name="header">
        Meus Registros
    </x-slot>

    <div class="w-full mx-auto text-right mt-4">
        <a href="{{route('expenses.create')}}" class="px-4 py-2 border rounded bg-indigo-500 text-white">Criar
            Registro</a>
    </div>

    <table class="table-auto w-full mx-auto">
        <thead>
        <tr class="text-left">
            <th class="px-4 py-2">#</th>
            <th class="px-4 py-2">Descrição</th>
            <th class="px-4 py-2">Valor</th>
            <th class="px-4 py-2">Data Registro</th>
            <th class="px-4 py-2">Ações</th>
        </tr>
        </thead>

        <tbody>
        @foreach($expenses as $exp)
            <tr>
                <td class="px-4 py-2 border">{{$exp->id}}</td>
                <td class="px-4 py-2 border">{{$exp->description}}</td>
                <td class="px-4 py-2 border">
                    <span
                        class="@if($exp->type == 1) bg-indigo-500 @else bg-red-500 @endif">${{number_format($exp->amount,2,',','.')}}
                </td>
                <td class="px-4 py-2 border">{{$exp->expense_date ? $exp->expense_date: $exp->created_at->format('d/m/Y H:i:s')}}</td>
                <td class="px-4 py-4 border">
                    <a href="{{route('expenses.edit', $exp->id)}}"
                       class="px-4 py-2 border rounded bg-indigo-500 text-white">Editar</a>
                    <a href="#" wire:click.prevent="remove({{$exp->id}})"
                       class="px-4 py-2 border rounded bg-red-500 text-white">Remover</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="w-full mx-auto mt-10">
        @if(count($expenses))
            {{$expenses->links()}}
        @endif
    </div>
</div>
