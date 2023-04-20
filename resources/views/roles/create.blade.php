<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Добавление новых ролей
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-2/4 mx-auto sm:px-6 lg:px-8">
            <form action="{{route('roles.store')}}"  method="post">
                @csrf
                <div class="mt-6 max-w-md">
                    <label for="name" class="text-gray-500 my-3">Название роли</label>
                    <input name="name" type="text" autocomplete="" required
                           class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Admin, moderator && etc.">
                    <button type="submit"  class="my-3 bg-violet-600 hover:bg-violet-100 text-white hover:border-violet-600 border
                        hover:text-violet-600 px-4 py-2 rounded">
                        Добавить
                    </button>
                </div>
                @foreach($permissions as $permission)
                    <div class="btn-group p-6 px-4 py-2" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" value="{{$permission ->id}}" name="permissions[]" autocomplete="off">
                        <label class="btn btn-outline-primary px-2" for="btncheck{{$permission ->id}}">{{$permission ->name}}</label>
                    </div>
                @endforeach
            </form>
        </div>
    </div>
</x-app-layout>
