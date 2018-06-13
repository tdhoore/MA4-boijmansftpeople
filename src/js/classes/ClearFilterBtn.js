export default class ClearFilterBtn {
  constructor(vars = {
    selector: ``,
    formSelector: ``
  }) {
    this.holder = document.querySelector(vars.selector);
    this.formSelector = vars.formSelector;
    this.btn = false;
    this.form = false;

    this.handleClick = e => this.clearFilters(e);
  }

  init() {
    if (this.holder) {
      //setup btn
      this.btn = this.holder.querySelector(`input`);

      this.btn.addEventListener(`click`, this.handleClick);

      //setup form
      this.form = document.querySelector(this.formSelector);
    }
  }

  clearFilters(e) {
    e.preventDefault();

    const inputs = [...this.form.querySelectorAll(`input`)];
    const selects = [...this.form.querySelectorAll(`select`)];

    //reset inputs
    inputs.forEach($input => {
      if ($input.type === `text`) {
        $input.value = ``;

      } else if ($input.type === `checkbox`) {
        $input.checked = false;
      }
    });

    selects.forEach($select => {
      const options = [...$select.querySelectorAll(`option`)];

      options.forEach(($option, index) => {
        if (index === 0) {
          $option.setAttribute(`selected`, `selected`);
        } else {
          $option.removeAttribute(`selected`);
        }
      });
    });
  }
}
