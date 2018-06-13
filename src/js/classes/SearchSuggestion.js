import CustomDropDown from './CustomDropDown';

export default class SearchSuggestion extends CustomDropDown {
  constructor(param = {
    selector: ``,
    customClass: ``,
    customOpenClass: ``,
    customSelectedClass: ``
  }) {
    super({selector: param.selector, customClass: param.customClass, customOpenClass: param.customOpenClass, customSelectedClass: param.customSelectedClass});

    //listeners
    this.inputListener = e => this.handleInput(e);
    this.ajaxResult = r => this.handleAjaxResult(r);
    this.selectOption = e => this.handleSelectOption(e);

    //tags list
    this.selectedTags = [];
  }

  init() {
    if (this.inputs.length > 0) {
      //add addEventListeners to inputs
      this.inputs.forEach($input => {
        $input.addEventListener(`input`, this.inputListener);
      });
    }
  }

  handleInput(e) {
    const $input = e.currentTarget;
    if ($input.value !== ``) {
      this.getSuggestions($input);
    } else {
      this.wipeElement(this.getCustomSuggestion($input));
    }
  }

  handleClickOption(e) {
    e.preventDefault();
    const $option = e.currentTarget;
    const $input = $option.parentElement.parentElement.parentElement.querySelector(`input`);

    $input.value = $option.querySelector(`span:last-of-type`).textContent;

    //preform reset
    this.wipeElement($option.parentElement.parentElement);
  }

  getOptionData($option) {
    return {type: $option.children[0].textContent, value: $option.children[1].textContent};
  }

  createTag(data) {
    const $li = document.createElement(`li`);
    const $a = this.createEmptyLink(data.value);

    //add type
    $a.dataset.type = data.type;

    //add listener
    $a.addEventListener(`click`, this.selectOption);

    //add to list item
    $li.append($a);

    return $li;
  }

  getDataFromTagElem(tagElem) {
    return {type: tagElem.dataset.type, value: tagElem.textContent};
  }

  getSuggestions($input) {
    const formData = new FormData();

    formData.append(`action`, `searchHint`);
    formData.append(`search`, $input.value);

    fetch(this.getFilterUrl($input), {
      headers: new Headers({Accept: `application/json`}),
      credentials: `same-origin`,
      method: `POST`,
      body: formData
    }).then(r => r.json()).then(this.ajaxResult);
  }

  handleAjaxResult(results) {
    const $input = document.querySelector(`input[name="search"]`);
    const $customSuggestion = this.getCustomSuggestion($input);

    if (!$customSuggestion) {
      this.createCustomDropDown($input, results);
    }

    //add the created list
    this.fillCustomDropDown($input, this.createOptions(`input[name="search"]`, results));
  }

  createOptions(inputName, options) {
    const results = [];
    options.forEach(option => {
      const $li = document.createElement(`li`);
      const $a = this.createEmptyLink(``);

      //set value data
      $a.dataset.inputName = inputName;

      //set content
      $a.innerHTML = `<span class="titleAccent">${option.tag}</span>`;
      $a.innerHTML += `<span>${option.value}</span>`;

      //add listener
      $a.addEventListener(`click`, this.clickOptionListener);

      //add link to list item
      this.addElemToElem($a, $li);

      results.push($li);
    });

    return results;
  }

  getFilters() {
    return this.selectedTags;
  }

  getFilterUrl($input) {
    let $form = $input.parentElement.parentElement.parentElement;

    if ($form.tagName.toLowerCase() !== `form`) {
      $form = $form.parentElement;
    }

    return $form.getAttribute(`action`);
  }

  getCustomSuggestion($input) {
    return $input.parentElement.querySelector(`.${this.customClass}`);
  }

  fillCustomDropDown($input, options) {
    const $customSuggestion = this.getCustomSuggestion($input);
    this.wipeElement($customSuggestion);
    this.addElemsToElem(options, $customSuggestion);
  }

  wipeElement($elem) {
    $elem.innerHTML = ``;
  }

  clearValue($elem) {
    $elem.value = ``;
  }

  createCustomDropDown($input) {
    const $customSuggestion = document.createElement(`ul`);

    //add customDropdownClass
    $customSuggestion.classList.add(this.customClass);

    //add customselect to the select parent
    this.addElemToElem($customSuggestion, $input.parentElement);
  }
}
