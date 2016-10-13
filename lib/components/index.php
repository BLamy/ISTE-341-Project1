TODO:
IMPLEMENT AUTOLOAD FUNCTION FOR COMPONENTS
HOOKUP TEMPLATE ENGINE TO AUTO RESOLVE TEMPLATES
REPLACE REACT WITH EITHER A SIMPLE CREATEELEMENT POLLYFIL OR USE NATIVE webcomponents
<?php

function Price($props) {
	foreach ($props as $key => $prop) { $$key = $prop; }

	if ($salePrice) {
		return <<<TEMPLATE
		<span className="SaleItem-price">
			<strike>{$price}</strike>
			{$salePrice}
		</span>
TEMPLATE;
	} else {
		return <<<TEMPLATE
		<span className="SaleItem-price">
			<strike>{$price}</strike>
			{$salePrice}
		</span>
TEMPLATE;
	}
};


function SaleItem($props) {
	foreach ($props as $key => $prop) { $$key = $prop; }
  return <<<TEMPLATE
    <div className="SaleItem">
      <img src="$imageName" alt="$description" className="SaleItem-img" />
      <div className="SaleItem-details">
        <h2 className="SaleItem-name">$productName</h2>
        <p className="SaleItem-description">$description</p>
        <Price price="$price" salePrice="$salePrice" />
        <span><strong>$quantity</strong> Left</span>
      </div>
    </div>
TEMPLATE;
};

const HTML_TAGS = ['div', 'p', 'span', 'a', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'img', 'strike', 'strong'];

function compile($nodeName, $node) {

	//-----------------------
	// attributes
	//-----------------------
	$attributes = [];
	foreach ($node->attributes() as $attributeName => $attributeValue) {
		$attributes[] = "{$attributeName}: '{$attributeValue}'";
	}

	//-----------------------
	// recurse children
	//-----------------------
	$children = [];
	foreach ($node->children() as $childName => $child) {
		if ($childName) {
			$children[] = compile($childName, $child);
		} else {
			$children[] = "'$child'";
		}
	}

	if (in_array($nodeName, HTML_TAGS)) {
		return "React.createElement('$nodeName', ".
						 (count($attributes) ? '{ '.implode(", ", $attributes).' }' : 'null').
						 (count($children) ? ', '.implode(", ", $children): '').
					")";
		} else {
			$jsx = call_user_func($nodeName, $node->attributes());
			$child = simplexml_load_string("<xml>$jsx</xml>")->children()[0];
			return compile($child->getName(), $child);
		}
	;
};

$jsx = call_user_func('SaleItem', [
		'productName' => "foo",
		'imageName' => "foo.png",
		'description' => "is a foo",
		'price' => 9001.00,
		'salePrice' => 0,
		'quantity' => 100
		]
  );
$root = simplexml_load_string("<xml>$jsx</xml>")->children()[0];

print_r(compile($root->getName(), $root));
