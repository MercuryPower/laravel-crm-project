<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Главная
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
{{--                <div class="p-6 text-gray-900">--}}
{{--                    Вы вошли в систему как <strong>{{Auth::user()->name}}</strong>--}}
{{--                </div>--}}
            </div>
            @foreach(Auth::user()->leads()->where('status', 'default')->get() as $lead)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3 grid md:grid-cols-6 grid-cols-1">
                    <div class="p-6 span-cols-1">
                        <div class="mb-1 text-gray-900">
                            {{$lead->client->name}}
                        </div>
                        <div class="text-gray-900">
                            {{$lead->client->phone}}
                        </div>
                    </div>
                    <div class="p-6 text-gray-900">
                        {{$lead->user->name}}
                    </div>
                    <div class="p-6 text-gray-900">
                        {{$lead->department->name}}
                    </div>
                    <div class="p-6 text-gray-900">
                        {{$lead->comment}}
                    </div>
                    <div class="p-6 text-gray-900">
                        {{$lead->getStatus()}}
                    </div>
                    <div class="p-6 text-gray-900">
                        <a href="/delete/{{$lead->id}}" class="bg-red-600 hover:bg-red-100 text-white hover:border-red-600 border
                                hover:text-red-600 px-4 py-2 rounded">
                            Удалить
                        </a>
                        <a href="/leads/edit/{{$lead->id}}" class="bg-emerald-600 hover:bg-emerald-100 text-white hover:border-emerald-600 border
                                hover:text-emerald-600 px-4 py-2 my-5 rounded">
                            Редактировать
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-app-layout>
