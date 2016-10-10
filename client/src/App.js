import React from 'react';
import logo from './logo.svg';
import './App.css';

export default () => (
  <div className="App">
    <div className="App-header">
      <img src={logo} className="App-logo" alt="logo" />
      <div className="App-header-right">
        <span>Cart</span>
        <span>Admin</span>
      </div>
    </div>
    <p className="App-intro">
      To get started, edit <code>src/App.js</code> and save to reload.
    </p>
  </div>
);
