<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Player') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-validation-errors />
            <form class="max-w-lg mx-auto p-4 border rounded shadow-lg space-y-4 bg-white" action="{{route("players.store")}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Player Name</label>
                    <input type="text" name="name" value="{{old('name')}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" name="age" value="{{old('age')}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Country</label>
                    <select name="country_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Club</label>
                    <select name="football_club_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @foreach ($clubs as $club)
                        <option value="{{$club->id}}">{{$club->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Profile Picture</label>
                    <div class="mt-1 flex items-center">
                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 24H0V0h24v24z" fill="none"/>
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </span>
                        <input type="file" name="profile_pic" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Appearances</label>
                    <input type="number" name="appearances" value="{{old('appearances')}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Goals</label>
                    <input type="number" name="goals" value="{{old('goals')}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Assists</label>
                    <input type="number" name="assists" value="{{old('assists')}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Yellow Cards</label>
                    <input type="number" name="yellow_cards" value="{{old('yellow_cards')}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Red Cards</label>
                    <input type="number" name="red_cards" value="{{old('red_cards')}}" value="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                </div>

                <div>
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Add Player</button>
                </div>
            </form>
            
        </div>
    </div>
</x-app-layout>
