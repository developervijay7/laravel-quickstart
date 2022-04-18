/**
 * Place any jQuery/helper plugins in here.
 */
(function() {
//     /**
//      * Checkbox tree for permission selecting
//      */
//     let permissionTree = $('.permission-tree :checkbox');
//
//     permissionTree.on('click change', function (){
//         if($(this).is(':checked')) {
//             $(this).siblings('ul').find('input[type="checkbox"]').attr('checked', true).attr('disabled', true);
//         } else {
//             $(this).siblings('ul').find('input[type="checkbox"]').removeAttr('checked').removeAttr('disabled');
//         }
//     });
//
//     permissionTree.each(function () {
//         if($(this).is(':checked')) {
//             $(this).siblings('ul').find('input[type="checkbox"]').attr('checked', true).attr('disabled', true);
//         }
//     });

    /**
     * Disable submit inputs in the given form
     *
     * @param form
     */
    function disableSubmitButtons(form) {
        let x = form.querySelector('button[type="submit"]') || form.querySelector('input[type="submit"]')
        x && x.setAttribute('disabled', true);
    }

    /**
     * Enable the submit inputs in a given form
     *
     * @param form
     */
    function enableSubmitButtons(form) {
        let x = form.querySelector('button[type="submit"]') || form.querySelector('input[type="submit"]')
        x && x.removeAttribute('disabled', true);
    }

    /**
     * Disable all submit buttons once clicked
     */
    let form = document.querySelector('form');
    form && form.addEventListener('submit', function (e) {
        disableSubmitButtons(this);
        return true;
    });


    /**
     * Add a confirmation to a delete button/form
     */
    let logOutForm = document.querySelector('form[name="logout-form"]');
    logOutForm && logOutForm.addEventListener('submit', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure you want to logout?',
            showCancelButton: true,
            confirmButtonText: 'Logout',
            cancelButtonText: 'Cancel',
            icon: 'question'
        }).then((result) => {
            if (result.value) {
                document.querySelector("form[name='logout-form']").submit();
            }
        });
    });

    let deleteForm = document.querySelector('form[name=delete-item]');
    deleteForm && deleteForm.addEventListener('submit', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure you want to delete this item?',
            showCancelButton: true,
            confirmButtonText: 'Confirm Delete',
            cancelButtonText: 'Cancel',
            icon: 'warning'
        }).then((result) => {
            if (result.value) {
                this.submit()
            } else {
                enableSubmitButtons(document.querySelector(this));
            }
        });
    });

    let permanentlyDeleteForm = document.querySelector('form[name=permanent-delete-item]');
    permanentlyDeleteForm && permanentlyDeleteForm.addEventListener('submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to permanently delete this item?',
            showCancelButton: true,
            confirmButtonText: 'Confirm Permanent Delete',
            cancelButtonText: 'Cancel',
            icon: 'warning'
        }).then((result) => {
            if (result.value) {
                this.submit()
            } else {
                enableSubmitButtons(document.querySelector(this));
            }
        });
    });

    let confirmationForm = document.querySelector('form[name=confirm-item]');
    confirmationForm && confirmationForm.addEventListener('submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to do this?',
            showCancelButton: true,
            confirmButtonText: 'Continue',
            cancelButtonText: 'Cancel',
            icon: 'warning'
        }).then((result) => {
            if (result.value) {
                    this.submit()
                } else {
                enableSubmitButtons(document.querySelector(this));
            }
        });
    });

    let confirmationLink = document.querySelector('a[name=confirm-item]');
    confirmationLink && confirmationLink.addEventListener('submit', function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure you want to do this?',
            showCancelButton: true,
            confirmButtonText: 'Continue',
            cancelButtonText: 'Cancel',
            icon: 'info',
        }).then((result) => {
            result.value && window.location.assign(document.querySelector(this).attr('href'));
        });
    });

})();

