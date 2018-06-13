import CustomSelect from './classes/CustomSelect';
import SearchSuggestion from './classes/SearchSuggestion';
import Submissions from './classes/Submissions';
import InfiniteScroll from './classes/InfiniteScroll';
import Validator from './classes/Validator';
import Emitter from 'event-emitter';
import ClearFilterBtn from './classes/ClearFilterBtn'

let $pCheck;
let $inputFile;
let interval;

const eventEmitter = Emitter();

const customSelect = new CustomSelect({selector: `select`, customClass: `customDropDown`, customOpenClass: `customDropDownOpen`, customSelectedClass: `customSelectedItem`, emmitter: eventEmitter});

const filter = new SearchSuggestion({selector: `.suggestion`, customClass: `filterSuggestions`, customOpenClass: `filterSuggestionsOpen`, tagsHolderClass: `filterTags`});

const submissions = new Submissions({selector: `.submissions`, customClass: `submissionItem`});

const infiniteScroll = new InfiniteScroll({selector: `.infinite`, customClass: ``, filterSelector: `.submissionFilter`, emmitter: eventEmitter});

const submitValidator = new Validator({formSelector: `.submitForm`});

const clearFilterBtn = new ClearFilterBtn({selector: `.submitBtn`, formSelector: `.submissionFilter`});

const onFileChange = e => {
  interval = setInterval(changeInput, 1000);
}

const changeInput = () => {
  if ($inputFile.value !== '') {
    $pCheck.innerHTML = $inputFile.value.replace(/([^\\]*\\)*/, '');
    clearInterval(interval);
  }
}

const styleInputFile = () => {
  const $submit = document.querySelector('.submit-drop');

  if ($submit) {
    let $div = document.querySelector('.drop-div');
    $div.classList.add('drop-div');

    $inputFile = document.querySelector('.submit-drop');
    $inputFile.classList.add('input-file-styling');

    let $divFlex = document.createElement('div');
    $divFlex.classList.add('align-input-file');

    let $p = document.createElement('p');
    $p.classList.add('input-file-js-on');

    let $strong = document.createElement('strong');
    $strong.innerHTML = 'Select File';

    $pCheck = document.createElement('p');
    $pCheck.classList.add('file-check');
    $pCheck.innerHTML = 'no file selected';

    $div.appendChild($divFlex);
    $divFlex.appendChild($p);
    $divFlex.appendChild($pCheck);
    $p.appendChild($strong);

    $submit.addEventListener('click', onFileChange);
  }
}

const init = () => {
  styleInputFile();

  filter.init();

  customSelect.init();

  submissions.init();

  infiniteScroll.init();

  clearFilterBtn.init();

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
          okey: `What a beautiful name!`
        }
      }
    ]);

    submitValidator.addValidationToInput(`input[name="terms"]`, [
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
