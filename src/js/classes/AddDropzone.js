import Dropzone from 'dropzone';

export default class AddDropzone {
  constructor(vars = {
    selector: ``
  }) {
    this.selector = vars.selector;
    this.zone = document.querySelector(this.selector);
    this.submit = (e, myDropzone) => this.handleSubmit(e, myDropzone);
  }

  handleSubmit(e, myDropzone) {
    e.preventDefault();
    e.stopPropagation();
    myDropzone.processQueue();
  }

  init() {
    //is there a zone
    if (this.zone) {
      Dropzone.options.dropzoneJsForm = {

        //prevents Dropzone from uploading dropped files immediately
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 1,
        maxFiles: 1,
        addRemoveLinks: true,
        previewsContainer: `.dropzone-previews`,

        // The setting up of the dropzone
        init: () => {
          const myDropzone = this;
          this.zone.addEventListeners(`submit`, this.submit(myDropzone));
        }
      };
    }
  }
}
