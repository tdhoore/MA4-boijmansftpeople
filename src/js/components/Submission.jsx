import React from 'react';
import PropTypes from "prop-types";

const Submission = ({data, customClass}) => {
  return (<article className={customClass}>
    <header>
      <h3>{data.title}</h3>
      <p>
        <span>BY</span>
        {data.artist}</p>
    </header>
    <img src={data.url} alt={data.title}/>
  </article>);
};

Submission.propTypes = {
  data: PropTypes.object.isRequired
};

export default Submission;
