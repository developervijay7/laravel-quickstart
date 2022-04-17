/**
 * Place any jQuery/helper plugins in here.
 */
(function(){
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
        form.find('input[type="submit"]').attr('disabled', true);
        form.find('button[type="submit"]').attr('disabled', true);
    }

    /**
     * Enable the submit inputs in a given form
     *
     * @param form
     */
    function enableSubmitButtons(form) {
        form.find('input[type="submit"]').removeAttr('disabled');
        form.find('button[type="submit"]').removeAttr('disabled');
    }

    /**
     * Disable all submit buttons once clicked
     */
    // $('form').submit(function () {
    //     disableSubmitButtons($(this));
    //     return true;
    // });


    /**
     * Add a confirmation to a delete button/form
     */
    $('body')
        .on('submit', 'form[name=logout-form]', function (e) {
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
        })
        .on('submit', 'form[name=delete-item]', function(e) {
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
                    enableSubmitButtons($(this));
                }
            });
        })
        .on('submit', 'form[name=permanent-delete-item]', function(e) {
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
                    enableSubmitButtons($(this));
                }
            });
        })
        .on('submit', 'form[name=confirm-item]', function (e) {
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
                    enableSubmitButtons($(this));
                }
            });
        })

        .on('click', 'a[name=confirm-item]', function (e) {
            /**
             * Add an 'are you sure' pop-up to any button/link
             */
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure you want to do this?',
                showCancelButton: true,
                confirmButtonText: 'Continue',
                cancelButtonText: 'Cancel',
                icon: 'info',
            }).then((result) => {
                result.value && window.location.assign($(this).attr('href'));
            });
        });
})();
