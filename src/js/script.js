import CustomSelect from './classes/CustomSelect';
import SearchSuggestion from './classes/SearchSuggestion';
import Submissions from './classes/Submissions';
import InfiniteScroll from './classes/InfiniteScroll';

const customSelect = new CustomSelect({selector: `select`, customClass: `customDropDown`, customOpenClass: `customDropDownOpen`, customSelectedClass: `customSelectedItem`});

const filter = new SearchSuggestion({selector: `.suggestion`, customClass: `filterSuggestions`, customOpenClass: `filterSuggestionsOpen`, tagsHolderClass: `filterTags`});

const submissions = new Submissions({selector: `.submissions`});

const infiniteScroll = new InfiniteScroll({selector: `.infinite`, customClass: ``, filterSelector: `.submissionFilter`});

const init = () => {
  filter.init();

  customSelect.init();

  submissions.init();

  infiniteScroll.init();
}

init();
