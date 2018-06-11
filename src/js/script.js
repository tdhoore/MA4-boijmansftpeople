import CustomSelect from './classes/CustomSelect';
import SearchSuggestion from './classes/SearchSuggestion';
import Submissions from './classes/Submissions';
import InfiniteScroll from './classes/InfiniteScroll';
import Emitter from 'event-emitter';

const eventEmitter = Emitter();

const customSelect = new CustomSelect({selector: `select`, customClass: `customDropDown`, customOpenClass: `customDropDownOpen`, customSelectedClass: `customSelectedItem`, emmitter: eventEmitter});

const filter = new SearchSuggestion({selector: `.suggestion`, customClass: `filterSuggestions`, customOpenClass: `filterSuggestionsOpen`, tagsHolderClass: `filterTags`});

const submissions = new Submissions({selector: `.submissions`});

const infiniteScroll = new InfiniteScroll({selector: `.infinite`, customClass: ``, filterSelector: `.submissionFilter`, emmitter: eventEmitter});

const init = () => {
  filter.init();

  customSelect.init();

  submissions.init();

  infiniteScroll.init();
}

init();
