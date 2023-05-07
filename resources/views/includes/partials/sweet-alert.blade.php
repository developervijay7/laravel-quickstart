@if(session()->get('sweet_success'))
    <x-bladewind.modal
        type="success"
        title="Success"
        name="success"
        cancel_button_label="">
        {{  session()->get('sweet_success') }}
    </x-bladewind.modal>
    <script>showModal('success')</script>
@endif

@if(session()->get('sweet_warning'))
    <x-bladewind.modal
        type="warning"
        title="Warning"
        name="warning"
        cancel_button_label="">
        {{  session()->get('sweet_warning') }}
    </x-bladewind.modal>
    <script>showModal('warning')</script>
@endif

@if(session()->get('sweet_info') || session()->get('sweet_message'))
    <x-bladewind.modal
        type="info"
        title="Info"
        name="info"
        cancel_button_label="">
        {{  session()->get('sweet_info') }}
    </x-bladewind.modal>
    <script>showModal('info')</script>
@endif

@if(session()->get('sweet_error'))
    <x-bladewind.modal
        type="error"
        title="Error"
        name="error"
        cancel_button_label="">
        {{  session()->get('sweet_error') }}
    </x-bladewind.modal>
    <script>showModal('error')</script>
@endif
