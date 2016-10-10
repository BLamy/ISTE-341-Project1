import React, { PropTypes } from 'react';

const Paper = ({ children, className }) => (
  <div className={`Paper ${className} `}>{children}</div>
);
Paper.propTypes = {
  children: PropTypes.node,
  className: PropTypes.string
};

export default Paper;
