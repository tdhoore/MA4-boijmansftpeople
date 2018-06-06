import React, {Component} from 'react';
//import Submission from '../components/Submission.jsx';

class AllSubmissions extends Component {
  constructor(props) {
    super(props);
    this.container = this.props.container;
    this.submissions = this.props.submissions;

    this.canTrigger = true;
    this.bottomDist = 200;

    this.scrollFunc = e => this.handleScroll(e);
    window.addEventListener(`scroll`, this.scrollFunc);
  }

  handleScroll(e) {
    if (window.innerHeight + window.scrollY > document.body.offsetHeight - this.bottomDist && this.canTrigger) {
      console.log(`send ajax`);
      this.canTrigger = false;
    }
  }

  render() {
    return (<div>
      {
        this.submissions.map(submission => {
          return (<article>
            <header>
              <h3>{submission.title}</h3>
              <p>{submission.artist}</p>
            </header>
            <img src={submission.imgUrl} alt={submission.title}/>
          </article>)
        })
      }
    </div>);
  }
}

export default AllSubmissions;
