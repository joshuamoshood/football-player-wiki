<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Player') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-validation-errors />
            <form class="max-w-lg mx-auto p-4 border rounded shadow-lg space-y-4 bg-white" action="{{route("players.update", $player->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Player Name</label>
                    <input type="text" name="name" value="{{old('name') ?? $player->name}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" name="age" value="{{old('age') ?? $player->age}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Country</label>
                    <select name="country_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}"
                            @if ($country->id == $player->country_id)
                                selected
                            @endif>{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Club</label>
                    <select name="football_club_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach ($clubs as $club)
                        <option value="{{$club->id}}" @selected($club->id == $player->football_club_id )>{{$club->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Profile Picture</label>
                    <div class="mt-1 flex items-center">
                        
                        @if ($player->profile_pic)
                        <img src="{{ secure_asset('storage/'.$player->profile_pic) }}" class="inline-block h-12 w-12 rounded-full overflow-hidden" alt="profile pic">
                        @else
                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 24H0V0h24v24z" fill="none"/>
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </span>
                        @endif
                        <input name="profile_pic" type="file" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Appearances</label>
                    <input type="number" name="appearances" value="{{old('appearances') ?? $player->playerStat->appearances}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Goals</label>
                    <input type="number" name="goals" value="{{old('goals') ?? $player->playerStat->goals}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Assists</label>
                    <input type="number" name="assists" value="{{old('assists') ?? $player->playerStat->assists}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Yellow Cards</label>
                    <input type="number" name="yellow_cards" value="{{old('yellow_cards') ?? $player->playerStat->yellow_cards}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Red Cards</label>
                    <input type="number" name="red_cards" value="{{old('red_cards') ?? $player->playerStat->red_cards}}" value="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>

                <input type="hidden" name="id" value="{{$player->id}}">
                <input type="hidden" name="_method" value="PUT">

                <div>
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update Player</button>
                </div>
            </form>
            
        </div>
    </div>
</x-app-layout>
