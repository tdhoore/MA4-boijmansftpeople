import AddDropzone from './AddDropzone';

export default class Validator {
  constructor(param = {
    formSelector: ``
  }) {
    //must have items
    this.form = document.querySelector(param.formSelector);
    this.action = false;
    this.method = false;
    this.inputs = [];

    //listeners
    this.listener = e => this.handleSubmit(e);
    this.blurListener = e => this.handleBlurInput(e);
    this.changeListener = e => this.handleChangeInput(e);

    this.addDropzone = false;
  }

  init() {
    //check if there is a form
    if (this.form) {
      //get attributes
      this.action = this.form.getAttribute(`action`);
      this.method = this.form.getAttribute(`method`);

      //add event listener
      this.form.addEventListener(`submit`, this.listener);

      //turn off default validation
      this.form.setAttribute(`novalidate`, ``);

      //setup dropzone
      this.addDropzone = new AddDropzone({selector: `.dragAndDrop`})
      this.addDropzone.init();
    } else {
      return false;
    }

    return true;
  }

  handleSubmit(e) {
    e.preventDefault();
    //check if the form is valid
    //and check if agreements are met
    if (this.form.checkValidity()) {
      //clear all messages
      this.restInputAllMessages();

      //send the data
      this.sendData();
    } else {
      //check all the inputs for mistakes
      this.checkInputs();
    }
  }

  checkInputs() {
    this.inputs.forEach(input => {
      input.checks.forEach(check => {
        this.checkValidityByName(input.inputElem, check);
      });
    });
  }

  sendData() {
    const formData = new FormData(this.form);
    let files = this.addDropzone.droppedFile;

    //get the file
    if (files) {
      //is drop
      formData.append(this.addDropzone.input.getAttribute(`name`), files[0]);
    } else {
      //check if there is somthing in the input
      files = this.addDropzone.input.files[0];
    }

    //if file exists
    if (files) {
      return fetch(this.action, {
        headers: new Headers({Accept: `application/json`}),
        credentials: `same-origin`,
        method: this.method,
        body: formData
      }).then(responce => responce.text()).then(this.handleAjaxResult);
    }
  }

  handleAjaxResult(result) {
    console.log(result);
  }

  restInputAllMessages() {
    const inputs = [...this.form.querySelectorAll(`.validator`)];

    inputs.forEach($input => {
      this.resetMessage($input);
    });
  }

  handleBlurInput(e, checks) {
    const $input = e.currentTarget;
    this.doChecks($input, checks);
  }

  handleChangeInput(e, checks) {
    const $input = e.currentTarget;
    this.doChecks($input, checks, false);
  }

  doChecks($input, checks, canDisplayError = true, canDisplayOkey = true) {
    let isValid = true;
    checks.forEach(check => {
      if (isValid) {
        isValid = !this.checkValidityByName($input, check);
      }

      if ((!isValid && canDisplayError) || (isValid && canDisplayOkey)) {
        this.displayMessage($input, this.getMessageByType(check.messages, !isValid), isValid);
      }
    });
  }

  checkValidityByName($elem, check) {
    const isValid = $elem.validity[check.name];
    return isValid;
  }

  displayMessage($elem, message, type = true) {
    const $errorElem = $elem.parentElement.parentElement.querySelector(`.validator`);

    //add error class and remove oke class
    this.changeMessageClass($errorElem, type);

    //set message
    $errorElem.textContent = message;
  }

  getMessageByType(messages, type) {
    return type
      ? messages.error
      : messages.okey;
  }

  changeMessageClass($errorElem, type = true) {
    if (type) {
      $errorElem.classList.remove(`error`);
      $errorElem.classList.add(`okey`);
    } else {
      $errorElem.classList.remove(`okey`);
      $errorElem.classList.add(`error`);
    }
  }

  resetMessage($errorElem) {
    $errorElem.textContent = ` `;
  }

  addValidationToInput(selector, checks = []) {
    const $input = this.form.querySelector(selector);
    if ($input) {
      this.inputs.push({inputElem: $input, checks: checks});

      this.addEventListeners(this.inputs[this.inputs.length - 1].inputElem, checks);
    }
  }

  addEventListeners($elem, checks) {
    //create listeners
    this.createListeners(checks);

    //add listeners
    $elem.addEventListener(`blur`, this.blurListener);
    $elem.addEventListener(`input`, this.changeListener);
  }

  createListeners(checks) {
    this.blurListener = e => this.handleBlurInput(e, checks);
    this.changeListener = e => this.handleChangeInput(e, checks);
  }
}
