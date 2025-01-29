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
                        <form action="" method="POST" class="max-w-lg">
                            @csrf
                            <div class="space-y-6">

                                <div>
                                    <label class="text-sm text-white">Select Type of class</label>
                                    <select name="type" id="type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                        @foreach($classTypes as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                               
                                <div>
                                    <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Date</label>
                                    <input type="date" name="date" id="date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div>
                                    <label for="time" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Time</label>
                                    <input type="time" name="time" id="time" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                
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
