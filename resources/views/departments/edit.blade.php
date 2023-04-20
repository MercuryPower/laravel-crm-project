<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Отделы
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-2/4 mx-auto sm:px-6 lg:px-8">
            <form action="{{route('departments.update', $department->id)}}"  method="post">
                @csrf
                <div class="mt-6 max-w-md">
                    <label for="name" class="text-gray-500 my-3">Имя</label>
                    <input id="name" name="name" type="text" autocomplete="email" required
                           value="{{$department->name}}"
                           class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Имя">
                    <label for="info" class="text-gray-500 my-3">Информация</label>
                    <input id="info" name="info" type="text" autocomplete="email" required
                           value="{{$department->info}}"
                           class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Информация">
                    <button type="submit"  class="my-3 bg-violet-600 hover:bg-violet-100 text-white hover:border-violet-600 border
                        hover:text-violet-600 px-4 py-2 rounded">
                        Редактировать
                    </button>
                  </div>
            </form>
        </div>
    </div>
</x-app-layout>
