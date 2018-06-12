import CustomDropDown from './CustomDropDown';

export default class CustomSelect extends CustomDropDown {
  constructor(param = {
    selector: ``,
    customClass: ``,
    customOpenClass: ``,
    customSelectedClass: ``,
    emmitter: false
  }) {
    super({selector: param.selector, customClass: param.customClass, customOpenClass: param.customOpenClass, customSelectedClass: param.customSelectedClass});

    this.clickFakeSelectListener = e => this.handleClickFakeSelect(e);

    this.selectedOption = `Default`;

    this.emitter = param.emmitter;
  }

  init() {
    this.inputs.forEach($select => {
      $select.classList.add(`hide`);
      this.createCustomDropDown($select);
    });
  }

  getOptions($select) {
    return [...$select.querySelectorAll(`option`)];
  }

  createFakeSelect($select) {
    const $result = document.createElement(`div`);

    const optionContent = $select.querySelector(`option`).textContent;
    const $a = this.createEmptyLink(optionContent);

    $result.classList.add(`date-btn`);

    //set default selected
    this.selectedOption = optionContent;

    //add class
    $a.classList.add(`fakeSelect`);

    //add listener to fake select
    $a.addEventListener(`click`, this.clickFakeSelectListener);
    $result.append($a);

    return $result;
  }

  createCustomDropDown($select) {
    const $customSelect = document.createElement(`div`);

    //add customDropdownClass
    $customSelect.classList.add(this.customClass);

    //add fake select
    this.addElemToElem(this.createFakeSelect($select), $customSelect);

    //add the created list
    this.addElemToElem(this.createOptionsList($select), $customSelect);

    //add customselect to the select parent
    this.addElemToElem($customSelect, $select.parentElement);
  }

  handleClickFakeSelect(e) {
    e.preventDefault();

    //open or close dropdown
    this.toggleOpenDropDown(e.currentTarget.parentElement.parentElement.querySelector(`ul`));
  }

  handleClickOption(e) {
    e.preventDefault();
    this.setSelectedOption(e.currentTarget);
    this.emitter.emit(`changeFilter`);
  }

  setSelectedOption($selectedOption) {
    const $customDropdown = $selectedOption.parentElement.parentElement.parentElement;
    const customOptions = [...$customDropdown.querySelectorAll(`ul li a`)];
    const $fakeSelect = $customDropdown.querySelector(`a`);
    const options = [...$customDropdown.parentElement.querySelectorAll(`option`)];

    customOptions.forEach(($customOption, index) => {
      //set the selected option in the select options
      this.addOrRemoveSelected(options[index].value === $selectedOption.dataset.value, options[index]);

      if ($customOption === $selectedOption) {
        //set the class for the custom option
        $customOption.classList.add(this.customSelectedClass);

        //set the fake select textContent
        this.setContentToContent($fakeSelect, $customOption);

        this.selectedOption = $customOption.textContent;
      } else {
        $customOption.classList.remove(this.customSelectedClass);
      }
    });
  }

  addOrRemoveSelected(condition, $option) {
    if (condition) {
      $option.setAttribute(`selected`, ``);
    } else {
      $option.removeAttribute(`selected`);
    }
  }

  getSelectedOption() {
    return this.selectedOption;
  }
}
