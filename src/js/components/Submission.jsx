import React from 'react';
import PropTypes from "prop-types";

const Submission = ({data, customClass}) => {
  return (<article className={customClass}>
    <header>
      <h3>{data.artTitle}</h3>
      <p>
        <span>BY</span>
        {data.artistName}</p>
    </header>
    <img src={data.image} alt={data.artTitle}/>
  </article>);
};

Submission.propTypes = {
  data: PropTypes.object.isRequired
};

export default Submission;
