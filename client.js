import React, { PropTypes } from 'react';
const { arrayOf, shape, number, string, node } = PropTypes;

//----------------------
// Types
//----------------------
const saleItemType = {
  productName: string.isRequired,
  itemId: number.isRequired,
  description: string.isRequired,
  imageName: string.isRequired,
  price: number.isRequired,
  salePrice: number.isRequired,
  quantity: number.isRequired
};

const catalogType = arrayOf(shape(saleItemType));

//----------------------
// Paper
//----------------------
const Paper = ({ children, className }) => <div className={`Paper ${className}`}>{children}</div>;
Paper.propTypes = { children: node, className: string };

//----------------------
// Header
//----------------------
const Header = () =>
  <div className="App-header">
    <a href="/">
      <img src="./public/logo.svg" className="App-logo" alt="logo" />
    </a>
    <div className="App-header-right">
      <a href="/cart"><img src="./public/cart.svg" className="" alt="cart" /></a>
      <a href="/admin"><img src="./public/admin.svg" className="" alt="admin" /></a>
    </div>
  </div>;

//----------------------
// SaleItem
//----------------------
const SaleItem = ({ productName, imageName, description, price, salePrice, quantity }) => (
  <div className="SaleItem">
    <img src={imageName} alt={description} className="SaleItem-img" />
    <div className="SaleItem-details">
      <h2 className="SaleItem-name">{productName}</h2>
      <p className="SaleItem-description">{description}</p>
      {
      salePrice ?
        <span className="SaleItem-price"><strike>{price}</strike>{salePrice}</span> :
        <span className="SaleItem-price">{price}</span>
      }
      <span><strong>{quantity}</strong> Left</span>
    </div>
  </div>
);
SaleItem.propTypes = saleItemType;

const Home = ({ catalog, saleItems }) => (
  <div>Home</div>
);
Home.propTypes = {
  catalog: catalogType,
  saleItems: catalogType
};
