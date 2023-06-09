import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// toggle sidebar
const btnToggleSidebar = document.getElementById('sidebarToggle');
btnToggleSidebar.addEventListener('click', (e) => {
    const bodyEl = document.querySelector('body');
    bodyEl.classList.toggle('sidebar-toggled');
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('toggled');
});

// delete modal
const deleteSubmitButtons = document.querySelectorAll('.delete-button');

deleteSubmitButtons.forEach((button) => {
    button.addEventListener('click', (event) => {
        event.preventDefault();

        const dataTitle = button.getAttribute('data-item-title');

        const modal = document.getElementById('deleteModal');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const modalItemTitle = modal.querySelector('#modal-item-title');
        modalItemTitle.textContent = dataTitle;

        const buttonDelete = modal.querySelector('button.btn-primary');

        buttonDelete.addEventListener('click', () => {
            button.parentElement.submit();
        });
    });
});

// image preview
const previewImage = document.getElementById('cover_image');
previewImage.addEventListener('change', (event) => {
    var oFReader = new FileReader();
    // var image  =  previewImage.files[0];
    // console.log(image);
    oFReader.readAsDataURL(previewImage.files[0]);

    oFReader.onload = function (oFREvent) {
        //console.log(oFREvent);
        document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
});
