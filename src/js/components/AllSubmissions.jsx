import React, {Component} from 'react';
import Submission from '../components/Submission.jsx';

class AllSubmissions extends Component {
  constructor(props) {
    super(props);
    this.container = this.props.container;
    this.submissions = this.props.submissions;

    this.canTrigger = true;
    this.bottomDist = 200;

    this.filter = this.props.filter;
    this.url = this.filter.getAttribute(`action`);

    this.limitStart = this.submissions.length;
    this.limitEnd = 8;

    this.state = {
      submissions: this.submissions
    };

    this.scrollFunc = e => this.handleScroll(e);
    window.addEventListener(`scroll`, this.scrollFunc);

    this.emmitter = this.props.emmitter;
    this.emmitter.on(`changeFilter`, () => {
      this.resetSubmissions();
    });
  }

  resetSubmissions() {
    //set start to 0
    this.limitStart = 0;

    //get new submission
    this.getNewSubmissions();

    //reset the trigger
    this.canTrigger = true;
  }

  onChangeChannel = (channel, value) => {
    this.setState({[channel]: value});
  }

  handleScroll(e) {
    if (window.innerHeight + window.scrollY > document.body.offsetHeight - this.bottomDist && this.canTrigger) {
      console.log(`send ajax`);
      this.getNewSubmissions();
      this.canTrigger = false;
    }
  }

  getNewSubmissions() {
    const formData = new FormData(this.filter);

    formData.append(`action`, `submissions`);
    formData.append(`limitStart`, this.limitStart);
    formData.append(`limitEnd`, this.limitEnd);

    fetch(this.url, {
      headers: new Headers({Accept: `application/json`}),
      credentials: `same-origin`,
      method: `POST`,
      body: formData
    }).then(r => r.json()).then(r => this.handleResponce(r));
  }

  handleResponce(r) {
    if (r.length > 0) {
      let tempSubmissions = this.state.submissions;
      r.forEach(result => {
        tempSubmissions.push(result);
      });

      this.onChangeChannel(`submissions`, tempSubmissions);

      //add to limit
      this.limitStart = this.state.submissions.length;
    }

    this.canTrigger = true;
  }

  render() {
    return (<div>
      {
        this.state.submissions.map((submission, index) => {
          return <Submission key={`submission_${index}`} data={submission} customClass="test"/>
        })
      }
    </div>);
  }
}

export default AllSubmissions;
