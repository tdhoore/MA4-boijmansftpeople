class AddListenersToFilter {
  constructor(vars = {
    filterElem: false,
    toAddFunction: false
  }) {
    this.filter = vars.filterElem;
    this.func = vars.toAddFunction;

    this.inputs = false;
    //submit
    //input
    //change

    this.init();
  }

  setListeners() {
    //submit filter
    this.filter.addEventListener(`submit`, this.func);

    //for inputs
    this.inputs.forEach($input => {
      const type = $input.getAttribute(`type`);

      if (type === `text`) {
        $input.addEventListener(`input`, this.func);

      } else if (type !== `sumbit`) {
        $input.addEventListener(`change`, this.func);
      }
    });
  }

  setInputs() {
    this.inputs = [...document.querySelectorAll(`input`)];
  }

  init() {
    //get inputs
    this.setInputs();

    //set listeners
    this.setListeners();
  }
}

export default AddListenersToFilter;
