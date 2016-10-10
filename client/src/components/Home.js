import React from 'react';
import { pipe, filter, prop, slice, difference } from 'ramda';

import SaleItem from './SaleItem';
import Paper from './Paper';
import { catalogType } from '../types';

/**
 * Store's Homepage.
 * @param {catalogType} catalog   Items in the catalog
 * @param {catalogType} saleItems Items to show in the saleItems
 */
const Home = ({ catalog, saleItems }) => (
  <div className="Home-wrapper">
    <Paper className="Home-catalog">
      <h1 className="Home-title">Catalog</h1>
      {catalog.map(saleItem => <SaleItem key={saleItem.itemId} {...saleItem} />)}
    </Paper>
    <Paper className="Home-saleItems">
      <h1 className="Home-title">Sale Items</h1>
      {saleItems.map(saleItem => <SaleItem key={saleItem.itemId} {...saleItem} />)}
    </Paper>
  </div>
);
Home.propTypes = {
  catalog: catalogType,
  saleItems: catalogType
};

/**
 * Pulls first 5 sale items it can find out of the current catelog
 */
const getSaleItemsFromCatalog = pipe(filter(prop('salePrice')), slice(0, 5));

/**
 * Extracts the sale items out of the catelog
 */
const HomeMapProps = ({ catalog }) => {
  const saleItems = getSaleItemsFromCatalog(catalog);
  const filteredCatelog = difference(catalog, saleItems); // Removes repeats from catelog array
  return <Home catalog={filteredCatelog} saleItems={saleItems} />;
};
HomeMapProps.propTypes = {
  catalog: catalogType
};

export default HomeMapProps;
