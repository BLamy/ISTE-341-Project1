<?php
$Price = function($price, $salePrice) {
  if ()
};

function SaleItem($productName, $imageName, $description, $price, $salePrice, $quantity) {
  return <<<TEMPLATE
    <div className="SaleItem">
      <img src="$imageName" alt="$description" className="SaleItem-img" />
      <div className="SaleItem-details">
        <h2 className="SaleItem-name">$productName</h2>
        <p className="SaleItem-description">$description</p>
        {$
          ($salePrice !== 0) ?
            <span className="SaleItem-price"><strike>$price</strike>$salePrice</span> :
            <span className="SaleItem-price">$price</span>
        }
        <span><strong>$quantity</strong> Left</span>
      </div>
    </div>
TEMPLATE;
};

?>x
