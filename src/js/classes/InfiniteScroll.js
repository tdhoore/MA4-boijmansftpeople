import React from 'react';
import ReactDOM from 'react-dom';
import AllSubmissions from '../components/AllSubmissions.jsx';

export default class InfiniteScroll {
  constructor(vars = {
    selector: ``,
    customClass: ``
  }) {
    this.selector = vars.selector;
    this.container = document.querySelector(this.selector);
    this.currentSubmissions = [...this.container.querySelectorAll(`article`)];
    this.count = this.currentSubmissions.lenght;

    this.submissions = [];
  }

  existingElementsToObj(elem) {
    const title = elem.querySelector(`h3`).textContent;
    const artist = elem.querySelector(`p`).textContent;
    const imgUrl = elem.querySelector(`img`).getAttribute(`src`);

    return {artTitle: title, artistName: artist, image: imgUrl};

  }

  init() {
    this.submissions = this.currentSubmissions.map(elem => {
      let result = this.existingElementsToObj(elem);

      elem.outerHTML = ``;

      return result;
    });

    ReactDOM.render(<AllSubmissions submissions={this.submissions} container={this.container}/>, this.container);
  }

}
