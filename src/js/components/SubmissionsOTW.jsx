import React, {Component} from 'react';
import Submission from '../components/Submission.jsx';

class SubmissionsOTW extends Component {
  constructor(props) {
    super(props);
    this.data = this.props.data;
    this.customClass = this.props.customClass;
    this.url = `index.php`;

    this.amount = this.props.amount;
    this.lastId = this.amount - 1;
    this.dir = true;

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
      this.dir = true;
    } else {
      this.dir = false;
    }

    formData.append(`action`, `HOTW`);
    formData.append(`amount`, this.amount);
    formData.append(`lastId`, this.lastId);
    formData.append(
      `dir`, this.dir
      ? 1
      : 0);

    fetch(this.url, {
      headers: new Headers({Accept: `application/json`}),
      credentials: `same-origin`,
      method: `POST`,
      body: formData
    }).then(r => r.json()).then(r => this.handleResponce(r));

  }

  handleResponce(responce) {
    if (responce) {
      //set lastId
      this.lastId = responce[responce.length - 1].id - 1;

      this.onChangeChannel(`submissionData`, responce);
    }

    console.log(responce);
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
