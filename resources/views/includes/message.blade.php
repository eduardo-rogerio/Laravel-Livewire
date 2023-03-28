@if(session()->has('message'))
    <div class="px-5 py-4 border bg-red-500 text-white mb-10">
        {{ session('message') }}
    </div>
@endif
