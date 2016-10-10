import React from 'react';
import { render } from 'react-dom';
import logo from './logo.svg';
import './index.css';
import Router from 'react-router/BrowserRouter';
import Match from 'react-router/Match';
import Link from 'react-router/Link';

const Home = () => (
  <div>
    <h2>Home</h2>
  </div>
);

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


const App = () => (
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
      <p className="App-intro">
        <Match exactly pattern="/" component={Home} />
        <Match pattern="/cart" component={Cart} />
        <Match pattern="/admin" component={Admin} />
      </p>
    </div>
  </Router>
);

fetch('http://localhost:8888/ISTE-341-Project1/api/')
  .then(res => res.json())
  .then(console.log.bind(console));

render(<App />, document.getElementById('root'));
