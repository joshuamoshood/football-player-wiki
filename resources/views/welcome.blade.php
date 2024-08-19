<x-public-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h2 class="lg:px-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Players') }}
            </h2>

            <div class="grid grid-cols-3 gap-5">
                        
                @forelse($players as $player)
                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white relative group">
                    @if ($player->profile_pic)
                    <img class="h-64 w-auto mx-auto" src="{{ secure_asset('storage/'.$player->profile_pic) }}" alt="Profile Picture">
                    @else
                    <img class="h-64 w-auto mx-auto" src="https://via.placeholder.com/400x300" alt="Profile Picture">
                    @endif
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{$player->name}}</div>
                        <p class="text-gray-700 text-base">Age: {{$player->age}}</p>
                        <p class="text-gray-700 text-base">Country: {{$player->country->name}}</p>
                        <p class="text-gray-700 text-base">Club: {{$player->club->name}}</p>
                    </div>
                    <div class="px-6 py-4">
                        <p class="text-gray-700 text-base">Appearances: {{$player->playerStat?->appearances}}</p>
                        <p class="text-gray-700 text-base">Goals: {{$player->playerStat?->goals}}</p>
                        <p class="text-gray-700 text-base">Assists: {{$player->playerStat?->assists}}</p>
                        <p class="text-gray-700 text-base">Yellow Cards: {{$player->playerStat?->yellow_cards}}</p>
                        <p class="text-gray-700 text-base">Red Cards: {{$player->playerStat?->red_cards}}</p>
                    </div>

                    <a href="{{route('players.edit', $player->id)}}" class="absolute bottom-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-blue-500 text-white px-4 py-2 rounded">
                        Edit
                    </a>

                    <form action="{{ route('players.destroy', $player->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this player?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="absolute bottom-4 right-20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-red-500 text-white px-4 py-2 rounded">
                            Delete
                        </button>
                    </form>
                </div>
                
                @empty
                    <div class="px-4 text-center">
                        <p>No player record found</p>
                    </div>
                @endforelse

            </div>

            {{ $players->links()}}

        </div>
    </div>
</x-public-layout>
