<x-layouts::app :title="__('Nuevo Ticket')">
    <flux:main class="max-w-2xl mx-auto w-full">
        <flux:heading size="xl" level="1">Nuevo Ticket</flux:heading>
        
        <form method="POST" action="{{ route('tickets.store') }}" class="mt-6 space-y-6">
            @csrf
            
            <flux:field>
                <flux:label>Título</flux:label>
                <flux:input name="titulo" value="{{ old('titulo') }}" placeholder="Título del ticket..." />
                <flux:error name="titulo" />
            </flux:field>

            <flux:field>
                <flux:label>Descripción</flux:label>
                <flux:textarea name="descripcion" placeholder="Detalle del problema...">{{ old('descripcion') }}</flux:textarea>
                <flux:error name="descripcion" />
            </flux:field>

            <div class="flex justify-end gap-3">
                <flux:button href="{{ route('tickets.index') }}" variant="ghost">Cancelar</flux:button>
                <flux:button type="submit" variant="primary">Crear Ticket</flux:button>
            </div>
        </form>
    </flux:main>
</x-layouts::app>