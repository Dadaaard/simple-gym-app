<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Schedule a class
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-12 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div class="p-10 text-gray-900">
                        <form action="{{ route('schedule.store')}}" method="POST" class="max-w-lg">
                            @method('POST')
                            @csrf
                            <div class="space-y-6">

                                <div>
                                    <label class="text-sm text-gray-700 dark:text-gray-200">Select Type of class</label>
                                    <select name="class_type_id" id="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                        @foreach($classTypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <div>
                                    <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date</label>
                                    <input type="date" name="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" 
                                    min={{ date('Y-m-d', strtotime('tommorow'))}}>
                                </div>
                                <div>
                                    <label class="text-sm text-white">Time</label>
                                    <select name="time" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            <option value="05:00:00">5 am</option>
                                            <option value="06:00:00">6 am</option>
                                            <option value="07:00:00">7 am</option>
                                            <option value="08:00:00">8 am</option>
                                            <option value="09:00:00">9 am</option>
                                            <option value="10:00:00">10 am</option>
                                            <option value="11:00:00">11 am</option>
                                    </select>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                
                                <div>
                                    <x-primary-button >
                                        Schedule
                                    </x-primary-button>
                                </div>
                            </div>
                        </form>




            </div>
        </div>
    </div>
</x-app-layout>
