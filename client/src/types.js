import { PropTypes } from 'react';
const { arrayOf, shape, number, string } = PropTypes;

export const saleItemType = {
  productName: string.isRequired,
  itemId: number.isRequired,
  description: string.isRequired,
  imageName: string.isRequired,
  price: number.isRequired,
  salePrice: number.isRequired,
  quantity: number.isRequired
};

export const catalogType = arrayOf(shape(saleItemType));
