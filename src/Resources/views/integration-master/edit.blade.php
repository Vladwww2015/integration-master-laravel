<x-admin::layouts>
    <!-- Page Title -->
    <x-slot:title>
        {{ $integrationMaster ? __('Edit') : __('Add') }}
    </x-slot:title>

    <div class="grid">
        <div class="flex gap-4 justify-between items-center max-sm:flex-wrap">
            <div class="flex gap-2.5 items-center">

            </div>
            <a
                href="{{ route('admin.integration.master.list') }}"
                class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white"
            >
                @lang('admin::app.customers.customers.view.back-btn')
            </a>
        </div>
    </div>

    <!-- Modal Form -->
    <x-admin::form
        :action="$formUrl"
        method="post"
    >
        @method('POST')
        <x-admin::form.control-group>
            <x-admin::form.control-group.label>
                {{ __('Entity Type') }}
            </x-admin::form.control-group.label>

            <x-admin::form.control-group.control
                type="select"
                id="entity_type"
                name="entity_type"
                label="{{ __('Entity Type') }}"
            >
                @foreach($entityTypes as $entityType)
                    <option value="{{$entityType}}">{{$entityType}}</option>
                @endforeach
            </x-admin::form.control-group.control>

            <x-admin::form.control-group.error control-name="entity_type" />
        </x-admin::form.control-group>

        <x-admin::form.control-group>
            <x-admin::form.control-group.label>
                {{ __('External Source Identity') }}
            </x-admin::form.control-group.label>

            <x-admin::form.control-group.control
                type="select"
                id="external_source_identity"
                name="external_source_identity"
                label="{{ __('External Source Identity') }}"
            >
                @foreach($externalSourceIdentities as $externalSourceIdentity)
                    <option value="{{$externalSourceIdentity}}">{{$externalSourceIdentity}}</option>
                @endforeach
            </x-admin::form.control-group.control>

            <x-admin::form.control-group.error control-name="external_source_identity" />
        </x-admin::form.control-group>

        <x-admin::form.control-group>
            <x-admin::form.control-group.label class="required">
                {{ __('Is Master?') }}
            </x-admin::form.control-group.label>

            <x-admin::form.control-group.control
                type="select"
                id="is_master"
                name="is_master"
                label="{{ __('Is Master?') }}"
            >
                @foreach([0 => 'No', 1 => 'Yes'] as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </x-admin::form.control-group.control>

            <x-admin::form.control-group.error control-name="is_master" />
        </x-admin::form.control-group>

        <div class="flex gap-x-2.5 items-center">
            <button
                type="submit"
                class="primary-button"
            >
                {{__('Save')}}
            </button>
        </div>

    </x-admin::form>

</x-admin::layouts>
