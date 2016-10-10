import React from 'react';
import { saleItemType } from '../types';

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

export default SaleItem;
