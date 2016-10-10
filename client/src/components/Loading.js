import React from 'react';
import Router from 'react-router/BrowserRouter';
import Link from 'react-router/Link';

import logo from '../logo.svg';
import loading from '../loading.svg';

export default () => (
  <Router>
    <div className="App">
      <div className="App-header">
        <Link to="/">
          <img src={logo} className="App-logo" alt="logo" />
        </Link>
        <div className="App-header-right">
          <Link to="/cart">Cart</Link>
          <Link to="/admin">Admin</Link>
        </div>
      </div>
      <img src={loading} className="App-loading" alt="loading" />
    </div>
  </Router>
);
