<x-app-layout>
    <div class ="min-h-screen 
    flex flex-col 
    sm:justify-center 
    items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <h1 class ="text-lg font-bold">Create new support ticket</h1>
        <div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                <form method="POST">
                    @csrf
                    <!-- title -->
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" 
                        type="text" 
                        name="text"
                        required autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- description -->
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />

                        <x-text-input id="description" class="block mt-1 w-full"
                                        type="text"
                                        name="Description"/>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="attachment" :value="__('Attachment')" />
                        <x-text-input id="attachment" 
                                            name="attachment" 
                                            type="file" 
                                            class="mt-1 block w-full" />
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-3">
                            Create
                        </x-primary-button>
                    </div>
                </form>
        </div>
    </div>
</x-guest-layout>