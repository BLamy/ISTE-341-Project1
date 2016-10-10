import React from 'react';
import Router from 'react-router/BrowserRouter';
import Link from 'react-router/Link';

import logo from '../../public/logo.svg';
import loading from '../../public/loading.svg';
import cart from '../../public/cart.svg';
import admin from '../../public/admin.svg';

export default () => (
  <Router>
    <div className="App">
      <div className="App-header">
        <Link to="/">
          <img src={logo} className="App-logo" alt="logo" />
        </Link>
        <div className="App-header-right">
          <Link to="/cart"><img src={cart} className="" alt="cart" /></Link>
          <Link to="/admin"><img src={admin} className="" alt="admin" /></Link>
        </div>
      </div>
      <img src={loading} className="App-loading" alt="loading" />
    </div>
  </Router>
);
