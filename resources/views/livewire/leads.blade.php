
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="grid grid-cols-3 mb-6">
            @foreach(\App\Helpers\Status::$statusArray as $key=>$status)
                <div wire:click="getLeadsWithStatus('{{$key}}')"
                    class="cursor-pointer bg-white mx-2 flex align-center justify-center p-6 text-center
                    rounded {{$this->status==$key ? 'border-amber-500 border' : ''}}">
                    {{$status}}
                    <br>
                    {{Auth::user()->leads()->where('status', $key)->count()}}
                </div>
            @endforeach
        </div>


        <a href="/leads/create" class="bg-violet-600 hover:bg-violet-100 text-white hover:border-violet-600 border
            hover:text-violet-600 px-4 py-2 rounded">
            Добавить
        </a>

        @foreach($leads as $lead)
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
                    <button wire:click = "confirmDelete('{{$lead->id}}')" class="bg-red-600 hover:bg-red-100 text-white hover:border-red-600 border
                                hover:text-red-600 px-4 py-2 rounded">
                        У
                    </button>
                    <a href="/leads/edit/{{$lead->id}}" class="bg-emerald-600 hover:bg-emerald-100 text-white hover:border-emerald-600 border
                                hover:text-emerald-600 px-4 py-2 my-5 rounded">
                        Р
                    </a>
                </div>
            </div>
        @endforeach
    </div>


    @if($confirmDelete)
        @livewire('leads.confirm-delete',['lead_id' => $lead_id], key($lead_id))
    @endif
</div>
