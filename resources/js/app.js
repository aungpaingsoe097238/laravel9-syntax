import * as boostrap from 'bootstrap';
import Swal from 'sweetalert2'

let showToast = document.getElementById('showToast');
let exampleModal = document.getElementById('exampleModal');
let myModal = new boostrap.Modal(exampleModal);

showToast.addEventListener('click',function () {
    myModal.show();
    // Swal.fire({
    //     title: 'Do you want to save the changes?',
    //     showDenyButton: true,
    //     showCancelButton: true,
    //     confirmButtonText: 'Save',
    //     denyButtonText: `Don't save`,
    // }).then((result) => {
    //     /* Read more about isConfirmed, isDenied below */
    //     if (result.isConfirmed) {
    //         Swal.fire('Saved!', '', 'success')
    //     } else if (result.isDenied) {
    //         Swal.fire('Changes are not saved', '', 'info')
    //     }
    // })
});
