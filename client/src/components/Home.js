import React from 'react';

import SaleItem from './SaleItem';

const { arrayOf, shape, number, string } = React.PropTypes;

const Home = ({ catalog }) => (
  <div>
    <h2>Sale Items</h2>
    {
      catalog
        .filter(({ price, salePrice }) => price !== salePrice)
        .slice(0, 5)
        .map(saleItem => <SaleItem key={saleItem.itemId} {...saleItem} />)
    }
    <h2>Catalog</h2>
    {
      catalog
        .map(saleItem => <SaleItem key={saleItem.itemId} {...saleItem} />)
    }
  </div>
);
Home.propTypes = {
  catalog: arrayOf(shape({
    itemId: number.isRequired,
    description: string.isRequired,
    imageName: string.isRequired,
    price: number.isRequired,
    salePrice: number.isRequired,
    quantity: number.isRequired
  }))
};

export default Home;
