<div>
    <div class="text-white border border-blue-500">
        @forelse($classrooms as $classroom)
            <form wire:submit="createUser({{ $classroom->id }})">
                <input type="text" placeholder="Le nom" wire:model="newName">
                <input type="text" placeholder="Le mail" wire:model="newMail">
                <button
                    class="bg-emerald-500 px-4 py-2 rounded hover:bg-emerald-600
            disabled:bg-gray-500 disabled:cursor-not-allowed"
                    wire:loading.attr="disabled" wire:target="createUser">
                    Create
                </button>
            </form>
            {{ $classroom->label }}
            @foreach($classroom->users as $student)
                <p class="p-4">{{ $student->name }}
                    <button wire:click="deleteUser({{ $student->id }})"
                            class="bg-red-500 px-4 py-2 rounded hover:bg-red-600
            disabled:bg-gray-500 disabled:cursor-not-allowed"
                            wire:loading.attr="disabled" wire:target="deleteUser({{ $student->id }})">
                        Delete
                    </button>
                </p>
            @endforeach
        @empty
            No Classrooms
        @endforelse
    </div>

</div>
