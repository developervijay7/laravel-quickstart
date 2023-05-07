<x-bladewind.modal
    name="logout-modal"
    title="Logout?"
    ok_button_action="document.querySelector(form[name='logout-form']).submit();"
    cancel_button_action="enableSubmitButtons(document.querySelector(this))"
>
    Are you sure you want to log out??
</x-bladewind.modal>

<x-bladewind.modal
    name="delete-modal">
    Are you sure you want to log out??
</x-bladewind.modal>

<x-bladewind.modal
    name="permanent-delete-modal">
    Are you sure you want to log out??
</x-bladewind.modal>
