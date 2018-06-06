import CustomSelect from './classes/CustomSelect';

const customSelect = new CustomSelect({selector: `select`, customClass: `customDropDown`, customOpenClass: `customDropDownOpen`, customSelectedClass: `customSelectedItem`});

const init = () => {
  customSelect.init();
}

init();
