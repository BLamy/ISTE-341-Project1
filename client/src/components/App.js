import React from 'react';
import Router from 'react-router/BrowserRouter';
import Match from 'react-router/Match';
import Link from 'react-router/Link';

import logo from '../../public/logo.svg';
import cart from '../../public/cart.svg';
import admin from '../../public/admin.svg';
import Home from './Home';
import { catalogType } from '../types';

const Cart = () => (
  <div>
    <h2>Cart</h2>
  </div>
);

const Admin = () => (
  <div>
    <h2>Admin</h2>
  </div>
);

const App = ({ catalog }) => (
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
      <Match exactly pattern="/" component={() => <Home catalog={catalog} />} />
      <Match pattern="/cart" component={Cart} />
      <Match pattern="/admin" component={Admin} />
    </div>
  </Router>
);
App.propTypes = {
  catalog: catalogType
};

export default App;
