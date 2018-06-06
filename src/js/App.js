import CustomSelect from './classes/CustomSelect';
import SearchSuggestion from './classes/SearchSuggestion';
import Submissions from './classes/Submissions';

const customSelect = new CustomSelect({selector: `select`, customClass: `customDropDown`, customOpenClass: `customDropDownOpen`, customSelectedClass: `customSelectedItem`});

const filter = new SearchSuggestion({selector: `.suggestion`, customClass: `filterSuggestions`, customOpenClass: `filterSuggestionsOpen`, tagsHolderClass: `filterTags`});

const submissions = new Submissions({selector: `.submissions`});

const init = () => {
  filter.init();

  customSelect.init();

  submissions.init();
}

init();
