import React from 'react';
import ReactDom from 'react-dom';

import './index.css';
import Loading from './components/Loading';
import App from './components/App';

const render = dom => ReactDom.render(dom, document.getElementById('root'));

render(<Loading />);
fetch('http://localhost:8888/ISTE-341-Project1/api/LIB_project1.php')
  .then(res => res.json())
  .then(({ catalog }) =>
    render(<App catalog={catalog} />)
  );
