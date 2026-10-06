<x-layouts::app :title="__('Detalle del Ticket')">
    <flux:main class="max-w-3xl mx-auto w-full">
        <div class="flex items-center justify-between">
            <flux:heading size="xl" level="1">Ticket #{{ $ticket->id }}</flux:heading>
            <flux:badge color="{{ $ticket->estado === 'abierto' ? 'green' : 'zinc' }}">
                {{ ucfirst($ticket->estado) }}
            </flux:badge>
        </div>

        <div class="mt-6 p-6 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800">
            <flux:heading size="lg">{{ $ticket->titulo }}</flux:heading>
            <div class="mt-2 text-sm text-zinc-500">
                Creado por {{ $ticket->user->name }} el {{ $ticket->created_at->format('d/m/Y H:i') }}
            </div>
            <div class="mt-6 prose dark:prose-invert">
                {{ $ticket->descripcion }}
            </div>
        </div>

        <div class="mt-6 flex justify-end gap-3">
            <flux:button href="{{ route('tickets.index') }}" variant="ghost">Volver</flux:button>
            @can('editar tickets')
                <flux:button href="{{ route('tickets.edit', $ticket) }}" variant="secondary">Editar</flux:button>
            @endcan
        </div>
    </flux:main>
</x-layouts::app>