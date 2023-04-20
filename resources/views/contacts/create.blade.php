<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Клиенты
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-2/4 mx-auto sm:px-6 lg:px-8">
            <form action="{{route('clients.store')}}"  method="post">
                @csrf
                <div class="mt-6 max-w-md">
                    <label for="name" class="text-gray-500 my-3">Имя</label>
                    <input id="name" name="name" type="text" autocomplete="email" required
                           class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Имя">
                    <label for="phone" class="text-gray-500 my-3">Телефон</label>
                    <input id="phone" name="phone" type="text" autocomplete="email" required
                           class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Телефон">
                    <label for="email-address" class="text-gray-500 my-3">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                           class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="email">
                    <label for="email-address" class="text-gray-500 my-3">Год рождения</label>
                    <input id="email-address" name="age" type="date" autocomplete="email" required
                           class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Год рождения">
                    <label for="comment" class="text-gray-500 my-3">Комментарий</label>
                    <input id="comment" name="comment" type="text" autocomplete="email" required
                           class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="Комментарий">


                    <button type="submit"  class="my-3 bg-violet-600 hover:bg-violet-100 text-white hover:border-violet-600 border
                        hover:text-violet-600 px-4 py-2 rounded">
                        Добавить
                    </button>
                  </div>
            </form>
        </div>
    </div>
</x-app-layout>
