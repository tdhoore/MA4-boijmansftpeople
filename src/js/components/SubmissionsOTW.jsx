import React, {Component} from 'react';
import Submission from '../components/Submission.jsx';

class SubmissionsOTW extends Component {
  constructor(props) {
    super(props);
    this.data = this.props.data;
    this.customClass = this.props.customClass;

    this.amount = this.props.amount;
    this.count = 0;

    this.handleClickNext = e => this.getSubmissions(e, `next`);
    this.handleClickPrev = e => this.getSubmissions(e, `prev`);

    this.state = {
      submissionData: this.data
    };
  }

  onChangeChannel = (channel, value) => {
    this.setState({[channel]: value});
  }

  getSubmissions(e, type) {
    let min = this.count;
    let max = this.count;

    //select witch ones
    if (type === `next`) {
      max += this.amount;
    } else {
      min -= this.amount;
    }

    //fetch(``).then()

    this.handleResponce([
      {
        id: 1,
        title: `werkNaam`,
        artist: `naam`,
        image: `url`
      }
    ]);

  }

  handleResponce(responce) {
    this.onChangeChannel(`submissionData`, responce)
  }

  render() {
    return (<div>
      <button onClick={this.handleClickPrev}>prev</button>{
        this.state.submissionData.map(submission => {
          return <Submission key={`weeklySubmission${submission.id}`} data={submission} customClass={this.customClass}/>
        })
      }
      <button onClick={this.handleClickNext}>next</button>
    </div>);
  }
}

export default SubmissionsOTW;
