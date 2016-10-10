import React from 'react';
const { string, number } = React.PropTypes;

const SaleItem = ({ imageName, description, price, salePrice, quantity }) => (
  <div>
    <img src={imageName} alt={description} />
    <p>{description}</p>
    <span>{price}</span>
    <span>{salePrice}</span>
    <span>{quantity}</span>
  </div>
);
SaleItem.propTypes = {
  itemId: number.isRequired,
  description: string.isRequired,
  imageName: string.isRequired,
  price: number.isRequired,
  salePrice: number.isRequired,
  quantity: number.isRequired
};

export default SaleItem;
