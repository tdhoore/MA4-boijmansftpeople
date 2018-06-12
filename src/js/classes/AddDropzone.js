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
      this.input.setAttribute(`files`, this.droppedFile);
    }

    return false;
  }

  getDroppedFile() {
    return this.droppedFile;
  }

  init() {
    //set zone style
    this.zone.classList.add(`dropStyle`);

    //add drop event
    this.addListeners(this.zone);
  }
}
