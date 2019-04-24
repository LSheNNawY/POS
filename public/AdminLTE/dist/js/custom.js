// (function () {
//
//     // deleting confirm alert
//     function confirmDelete(formID, confirm, cancel) {
//         var n = new Noty({text: 'Do you want to continue?',
//           buttons: [
//             Noty.button(confirm, 'btn btn-danger', function () {
//                 formID.submit();
//             }),
//
//             Noty.button(cancel, 'btn btn-error', function () {
//                 n.close();
//             })
//           ]
//         });
//         n.show();
//     }
//
// });