export default class AddDropzone {
  constructor(vars = {
    selector: ``
  }) {
    this.selector = vars.selector;
    this.zone = document.querySelector(this.selector);
    this.input = this.zone.querySelector(`input`);
    this.droppedFile = false;

    this.listeners = [`dragover`, `dragenter`, `dragleave`, `dragend`, `drop`];

    this.handledragDrop = e => this.dragDropControll(e);
    this.handleUploadImage = e => this.changeImage(e);
  }

  toggleVisibility($elem) {
    $elem.classList.toggle(`hide`);
  }

  addListeners($elem) {
    this.listeners.forEach(listener => {
      $elem.addEventListener(listener, this.handledragDrop);
    });
  }

  dragDropControll(e) {
    e.preventDefault();
    e.stopPropagation();

    if (e.type === `dragover` || e.type === `dragenter`) {
      //isDragOver
      this.zone.classList.add(`isDragOver`);

    } else if (e.type === `dragleave` || e.type === `dragend` || e.type === `drop`) {
      //isDragOver remove
      this.zone.classList.remove(`isDragOver`);
    }

    if (e.type === `drop`) {
      //is drop
      this.droppedFile = e.dataTransfer.files;

      //display image
      this.displayImage(this.droppedFile[0]);
    }

    return false;
  }

  displayImage(img) {
    const reader = new FileReader();

    reader.onload = () => {
      if (this.hasImage(this.zone)) {
        this.addImage(this.zone);
      }
      this.getImageElem(this.zone).src = reader.result;
    };

    reader.readAsDataURL(img);
  }

  getDroppedFile() {
    return this.droppedFile;
  }

  hasImage($elem) {
    return this.getImageElem($elem) === null
      ? true
      : false;
  }

  addImage($elem) {
    const $img = document.createElement(`img`);

    $img.src = ``;

    $elem.appendChild($img);
  }

  getImageElem($elem) {
    return $elem.querySelector(`img`);
  }

  changeImage(e) {
    this.displayImage(e.currentTarget.files[0]);
  }

  init() {
    //set zone style
    this.zone.classList.add(`dropStyle`);

    //add drop event
    this.addListeners(this.zone);

    //add change event to input
    this.input.addEventListener(`change`, this.handleUploadImage);
  }
}
