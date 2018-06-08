import React, {Component} from 'react';
import Submission from '../components/Submission.jsx';

class SubmissionsOTW extends Component {
  constructor(props) {
    super(props);
    this.data = this.props.data;
    this.customClass = this.props.customClass;
    this.url = `index.php`;

    this.amount = this.props.amount;
    this.count = 0;

    this.handleClickBtn = e => this.getSubmissions(e);

    this.state = {
      submissionData: this.data
    };
  }

  onChangeChannel = (channel, value) => {
    this.setState({[channel]: value});
  }

  getSubmissions(e) {
    const formData = new FormData();
    const dir = e.currentTarget.dataset.dir;

    //select witch ones
    if (dir === `next`) {
      this.count++;
    } else {
      this.count--;
    }

    /*if (dir === `next`) {
      if (this.min === 0) {
        this.min++;
      }

      this.min += this.amount;
      this.max += this.amount;
    } else {
      this.min -= this.amount;
      this.max -= this.amount;

      if (this.max === 0) {
        this.max--;
      }
    }

    //set range
    for (let i = 0; i < this.amount; i++) {
      let count = 0;

      if (dir === `next`) {
        count = this.min + i;

        if (this.hasZero(this.range) || count === 0) {
          count++;
        }
      } else {
        count = this.max - i;

        if (this.hasZero(this.range) || count === 0) {
          count--;
        }
      }

      this.range.push(count);
    }

    console.log(this.range);

    this.range = [];*/

    formData.append(`action`, `HOTW`);
    formData.append(`amount`, this.amount);
    formData.append(`count`, this.count);

    fetch(this.url, {
      headers: new Headers({Accept: `application/json`}),
      credentials: `same-origin`,
      method: `POST`,
      body: formData
    }).then(r => r.json()).then(r => this.handleResponce(r));

    /*this.handleResponce([
      {
        id: 1,
        title: `werkNaam`,
        artist: `naam`,
        image: `url`
      }
    ]);*/

  }

  hasZero(range) {
    let hasZero = false;
    range.forEach(r => {
      if (r === 0) {
        hasZero = true;
      }
    });

    return hasZero;
  }

  handleResponce(responce) {
    // empty range

    console.log(responce.ids);

    if (responce.resetCounter) {
      this.count = 0;
    }

    //this.onChangeChannel(`submissionData`, responce)
  }

  render() {
    return (<div>
      <button data-dir="prev" onClick={this.handleClickBtn}>prev</button>
      {
        this.state.submissionData.map(submission => {
          return <Submission key={`weeklySubmission${submission.id}`} data={submission} customClass={this.customClass}/>
        })
      }
      <button data-dir="next" onClick={this.handleClickBtn}>next</button>
    </div>);
  }
}

export default SubmissionsOTW;
