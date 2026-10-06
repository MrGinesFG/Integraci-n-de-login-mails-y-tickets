<x-layouts::app :title="__('Tickets')">
    <flux:main class="w-full">
        <flux:heading size="xl" level="1">Tickets</flux:heading>
        
        @if(session('success'))
            <flux:toast variant="success">{{ session('success') }}</flux:toast>
        @endif

        <div class="mt-6 flex justify-end">
            @can('crear tickets')
                <flux:button href="{{ route('tickets.create') }}" variant="primary" icon="plus">Nuevo Ticket</flux:button>
            @endcan
        </div>

        <div class="mt-6">
            <flux:table>
                <flux:table.columns>
                    <flux:table.column>ID</flux:table.column>
                    <flux:table.column>Título</flux:table.column>
                    <flux:table.column>Usuario</flux:table.column>
                    <flux:table.column>Estado</flux:table.column>
                    <flux:table.column>Acciones</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @foreach($tickets as $ticket)
                        <flux:table.row>
                            <flux:table.cell>{{ $ticket->id }}</flux:table.cell>
                            <flux:table.cell class="font-medium">{{ $ticket->titulo }}</flux:table.cell>
                            <flux:table.cell>{{ $ticket->user->name }}</flux:table.cell>
                            <flux:table.cell>
                                <flux:badge color="{{ $ticket->estado === 'abierto' ? 'green' : 'zinc' }}">
                                    {{ ucfirst($ticket->estado) }}
                                </flux:badge>
                            </flux:table.cell>
                            <flux:table.cell class="flex gap-2">
                                <flux:button size="sm" href="{{ route('tickets.show', $ticket) }}" variant="ghost">Ver</flux:button>
                                
                                @can('editar tickets')
                                    <flux:button size="sm" href="{{ route('tickets.edit', $ticket) }}" variant="ghost">Editar</flux:button>
                                @endcan

                                @can('cerrar tickets')
                                    @if($ticket->estado === 'abierto')
                                        <form method="POST" action="{{ route('tickets.cerrar', $ticket) }}">
                                            @csrf
                                            @method('PATCH')
                                            <flux:button type="submit" size="sm" variant="danger" icon="check-circle">Cerrar</flux:button>
                                        </form>
                                    @endif
                                @endcan
                            </flux:table.cell>
                        </flux:table.row>
                    @endforeach
                </flux:table.rows>
            </flux:table>
        </div>
    </flux:main>
</x-layouts::app>