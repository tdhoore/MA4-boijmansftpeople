import * as FilePond from 'filepond';
import FilePondPluginFileEncode from 'filepond-plugin-file-encode';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
import FilePondPluginImageCrop from 'filepond-plugin-image-crop';
import FilePondPluginImageResize from 'filepond-plugin-image-resize';
import FilePondPluginImageTransform from 'filepond-plugin-image-transform';

export default class AddDropzone {
  constructor(vars = {
    selector: ``
  }) {
    this.selector = vars.selector;
    this.zone = document.querySelector(this.selector);
    this.preview = false;
    this.fallback = false;

    this.submitForm = e => this.handleSubmit(e);
  }

  handleSubmit(e) {
    e.preventDefault();
    console.log(`test`);
  }

  toggleVisibility($elem) {
    $elem.classList.toggle(`hide`);
  }

  init() {
    console.log();

    FilePond.registerPlugin(
    // encodes the file as base64 data
    FilePondPluginFileEncode,

    // validates files based on input type
    FilePondPluginFileValidateType,

    // previews the image
    FilePondPluginImagePreview,

    // crops the image to a certain aspect ratio
    FilePondPluginImageCrop,

    // resizes the image to fit a certain size
    FilePondPluginImageResize,

    // applies crop and resize information on the client
    FilePondPluginImageTransform);

    // Select the file input and use create() to turn it into a pond
    // in this example we pass properties along with the create method
    // we could have also put these on the file input element itself
    FilePond.create(document.querySelector('.filepond'), {
      labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
      imagePreviewHeight: 170,
      imageCropAspectRatio: '1:1',
      imageResizeTargetWidth: 200,
      imageResizeTargetHeight: 200
    });
  }
}
