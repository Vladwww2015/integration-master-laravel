<x-admin::layouts>
    <!-- Title of the page -->
    <x-slot:title>
        {{ __('Integration Master Exclusion List') }}
    </x-slot:title>
    <div class="flex justify-between items-center">
        <p class="text-xl text-gray-800 dark:text-white font-bold">
            {{__('Integration Master Exclusion List')}}
        </p>

        <div class="flex gap-x-2.5 items-center">
            <div class="flex gap-x-2.5 items-center">
                <a href="{{ route('admin.integration.master.edit-exclusion-list', ['hash' => '']) }}" class="primary-button">{{__('Add')}}</a>
            </div>
        </div>
    </div>
    <x-admin::datagrid src="{{ route('admin.integration.master.exclusion-list') }}" />
</x-admin::layouts>
