import React from 'react';
import ReactDOM from 'react-dom';
import SubmissionsOTW from '../components/SubmissionsOTW.jsx';

class Submissions {
  constructor(content = {
    selector: ``,
    customClass: ``
  }) {
    this.selector = content.selector;
    this.customClass = content.customClass;
    this.holder = document.querySelector(this.selector)
    this.amount = 0;
  }

  currentContentToReact() {
    const articles = [...this.holder.querySelectorAll(`article`)];
    let result = [];

    //set amount
    this.amount = articles.length;

    articles.forEach(article => {
      const data = {
        id: parseInt(article.dataset.id, 10),
        artTitle: article.querySelector(`h3`).textContent,
        artistName: article.querySelector(`p span:last-of-type`).textContent,
        image: article.querySelector(`img`).src
      }

      result.push(data);
    });

    return result;
  }

  init() {
    this.currentContentToReact();
    ReactDOM.render(<SubmissionsOTW data={this.currentContentToReact()} customClass={this.customClass} amount={this.amount}/>, this.holder);
  }
}

export default Submissions;
