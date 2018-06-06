import React from 'react';
import ReactDOM from 'react-dom';
import SubmissionsOTW from '../components/SubmissionsOTW.jsx';

const test = [
  {
    id: 1,
    title: `werkNaam`,
    artist: `naam`,
    image: `url`
  }, {
    id: 2,
    title: `werkNaam2`,
    artist: `naam2`,
    image: `url`
  }, {
    id: 3,
    title: `werkNaam3`,
    artist: `naam3`,
    image: `url`
  }
];

class Submissions {
  constructor(content = {
    selector: ``,
    customClass: ``
  }) {
    this.selector = content.selector;
    this.customClass = content.customClass;
    this.amount = 3;
  }

  init() {
    ReactDOM.render(<SubmissionsOTW data={test} customClass={this.customClass} amount={this.amount}/>, document.querySelector(this.selector));
  }
}

export default Submissions;
