import React from 'react';
import { render } from 'react-dom';
import App from './App';
import './index.css';

fetch('http://localhost:8888/ISTE-341-Project1/api/')
  .then(res => res.json())
  .then(console.log.bind(console));

render(<App />, document.getElementById('root'));
