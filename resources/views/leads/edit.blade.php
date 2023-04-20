<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Панель
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-2/4 mx-auto sm:px-6 lg:px-8">
            <form action="{{route('leads.update', $lead->id)}}"  method="post">
                @csrf
                <div class="mt-6 max-w-md">
                    <label for="clientId" class="text-gray-500 my-3">Клиент</label>

                    <select name="client_id" id="clientId"
                           class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        @foreach($clients as $client)
                        <option value="{{$client->id}}" {{$lead->client_id==$client->id ? 'selected' : ''}}>{{$client->name}}</option>
                        @endforeach
                    </select>
                    <label for="userId" class="text-gray-500 my-3">Пользователь</label>

                    <select name="user_id" id="userId"
                            class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        @foreach($users as $user)
                            <option value="{{$user->id}}"  {{$lead->user_id==$user->id ? 'selected' : ''}}>{{$user->name}}</option>
                        @endforeach
                    </select>

                    <label for="dept" class="text-gray-500 my-3">Отдел</label>
                    <select name="department_id" id="departmentId"
                            class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        @foreach($departments as $department)
                            <option value="{{$department->id}}" {{$lead->department_id==$department->id ? 'selected' : ''}}>{{$department->name}}</option>
                        @endforeach
                    </select>

                    <label for="dept" class="text-gray-500 my-3">Статус</label>
                    <select name="status" id="statusId"
                            class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >
                        <option value="defect" {{$lead->status=='defect' ? 'selected' : ''}}>Брак</option>
                        <option value="liquid" {{$lead->status=='liquid' ? 'selected' : ''}}>Ликвид</option>
                        <option value="default" {{$lead->status=='default' ? 'selected' : ''}}>Не обработан</option>
                    </select>

                    <label for="comment" class="text-gray-500 my-3">Комментарий</label>
                    <input id="comment" name="comment" type="text" autocomplete="email"
                           value="{{$lead->comment}}" required
                           class="w-full rounded-md border border-gray-300 bg-white px-[calc(theme(spacing.4)-1px)] py-[calc(theme(spacing[1.5])-1px)] placeholder-gray-500 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                           placeholder="">

                    <button type="submit"  class="my-3 bg-violet-600 hover:bg-violet-100 text-white hover:border-violet-600 border
                        hover:text-violet-600 px-4 py-2 rounded">
                        Изменить
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
