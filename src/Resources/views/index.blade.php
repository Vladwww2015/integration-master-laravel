<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        {{ __('Integration Master List') }}
    </x-slot:title>
    <div class="flex justify-between items-center">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            {{__('Integration Master List')}}
        </p>

        <div class="flex gap-x-2.5 items-center">
            <div class="flex gap-x-2.5 items-center">

            </div>
        </div>
    </div>
    <x-admin::datagrid src="{{ route('admin.integration.master.list') }}" />
</x-admin::layouts>
