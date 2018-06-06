import CustomSelect from './classes/CustomSelect';
import SearchSuggestion from './classes/SearchSuggestion';

const customSelect = new CustomSelect({selector: `select`, customClass: `customDropDown`, customOpenClass: `customDropDownOpen`, customSelectedClass: `customSelectedItem`});

const filter = new SearchSuggestion({selector: `.suggestion`, customClass: `filterSuggestions`, customOpenClass: `filterSuggestionsOpen`, tagsHolderClass: `filterTags`});

const init = () => {
  filter.init();

  customSelect.init();
}

init();
