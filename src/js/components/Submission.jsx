import React from 'react';
import PropTypes from "prop-types";

const Submission = ({data, customClass}) => {
  return (<article className={customClass}>
    <header>
      <h3>{data.artTitle}</h3>
      <p>
        <span>BY</span>
        &nbsp;
        <span>{data.artistName}</span>
      </p>
    </header>
    <div className="imageHolder">
      <img src={data.image} alt={data.artTitle}/>
    </div>
  </article>);
};

Submission.propTypes = {
  data: PropTypes.object.isRequired
};

export default Submission;
