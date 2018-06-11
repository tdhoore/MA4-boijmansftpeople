import CustomSelect from './classes/CustomSelect';
import SearchSuggestion from './classes/SearchSuggestion';
import Submissions from './classes/Submissions';
import InfiniteScroll from './classes/InfiniteScroll';
import Validator from './classes/Validator';
import Emitter from 'event-emitter';
import AddDropzone from './classes/AddDropzone';

const eventEmitter = Emitter();

const customSelect = new CustomSelect({selector: `select`, customClass: `customDropDown`, customOpenClass: `customDropDownOpen`, customSelectedClass: `customSelectedItem`, emmitter: eventEmitter});

const filter = new SearchSuggestion({selector: `.suggestion`, customClass: `filterSuggestions`, customOpenClass: `filterSuggestionsOpen`, tagsHolderClass: `filterTags`});

const submissions = new Submissions({selector: `.submissions`});

const infiniteScroll = new InfiniteScroll({selector: `.infinite`, customClass: ``, filterSelector: `.submissionFilter`, emmitter: eventEmitter});

const submitValidator = new Validator({formSelector: `.submitForm`});

const addDropzone = new AddDropzone({selector: `.dropZone`})

const init = () => {
  filter.init();

  customSelect.init();

  submissions.init();

  infiniteScroll.init();

  addDropzone.init();

  if (submitValidator.init()) {
    submitValidator.addValidationToInput(`input[type="email"]`, [
      {
        name: `valueMissing`,
        messages: {
          error: `No worries, we won’t spam your inbox`,
          okey: ``
        }
      }, {
        name: `typeMismatch`,
        messages: {
          error: `Sorry, this isn’t a valid email`,
          okey: `Looks great!`
        }
      }
    ]);

    submitValidator.addValidationToInput(`input[type="text"]`, [
      {
        name: `valueMissing`,
        messages: {
          error: `Sorry, leaving it anonymous isn’t an option`,
          okey: `What a beautiful name`
        }
      }
    ]);

    submitValidator.addValidationToInput(`input[type="checkbox"]`, [
      {
        name: `valueMissing`,
        messages: {
          error: `Please agree`,
          okey: ``
        }
      }
    ]);
  }
}

init();
