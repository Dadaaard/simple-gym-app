<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Boook a Class
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="p-10 text-gray-900 max-w-2xl divide-y">
                  @forelse ($scheduledClasses as $class)
                  <div class="py-6">
                     <div class="flex gap-6 justify-between">
                        <div>
                           <p class="text-2xl font-bold text-purple-700">{{ $class->classType->name }}</p>
                           <span class="text-slate-600 text-sm">{{ $class->classType->minutes }} minutes</span>
                           <p>{{ $class->classType->description }}</p>
                        </div>
                        <div class="text-right flex-shrink-0">
                           <p class="text-lg font-bold">{{ $class->date_time->format('g:i a') }}</p>
                           <p class="text-sm">{{ $class->date_time->format('jS M') }}</p>
                        </div>
                     </div>
                     
                     <div class="mt-1 text-right">
                        <div class="flex gap-6 justify-between">
                            <p class="text-sm font-bold text-pink-700">Instructor: {{ $class->instructor->name }}</p>
                        <form method="post" action="{{ route('booking.store') }}">
                           @csrf
                           @method('POST')

                           <input type="hidden" name="class_type_id" value="{{ $class->class_type_id }}">
                           <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Book</button>
                        </form>
                        </div>
                     </div>
                     
                  </div>
                  @empty
                  <div>
                     <p>You don't have any upcoming classes</p>
                     <a class="inline-block mt-6 underline text-sm" href="{{ route('schedule.create') }}">
                        Schedule now
                     </a>
                  </div>
                  @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
