<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <a class="bg-violet-600 hover:bg-violet-100 text-white hover:border-violet-600 border
            hover:text-violet-600 px-4 py-2 rounded">
            Добавить
        </a>

        @foreach($users as $user)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-3 grid md:grid-cols-4 grid-cols-1">
                <div class="p-6 text-gray-900">
                    {{$user->name}}
                </div>
                <div class="p-6 text-gray-900">
                    {{$user->email}}
                </div>
                <div class="p-6 text-gray-900">
                    {{$user->email}}
                </div>
                <div class="p-6 text-gray-900">
                    <button class="bg-red-600 hover:bg-red-100 text-white hover:border-red-600 border
                                hover:text-red-600 px-4 py-2 rounded">
                        Удалить
                    </button>
                    <button class="bg-teal-700 text-white border-teal-700 hover:border-teal-900
                     hover:bg-teal-900  px-4 py-2 rounded">
                        Редактировать
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</div>
