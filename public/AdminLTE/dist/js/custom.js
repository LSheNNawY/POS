    // deleting confirm alert
    function confirmDelete(formID, confirmMessage, confirm, cancel) {
        var n = new Noty({
            text: confirmMessage,
            buttons: [
                Noty.button(confirm, 'btn btn-danger', function () {
                    let form = document.getElementById(formID);
                    form.submit();
                }),

                Noty.button(cancel, 'btn btn-default', function () {
                    n.close();
                })
            ],
            theme: 'mint',
            type: 'warning'
        });
        n.show();
    }
