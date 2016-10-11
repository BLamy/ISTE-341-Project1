<?php
require_once './lib/Util.php';

const HTML_TAGS = ['div', 'p', 'span', 'a', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];

class TemplateEngine {
  private static function dashcaseToElementName($str) {
    if (in_array($str, HTML_TAGS)) return $str;
    return Util::dashcaseToBookCase($str);
  }

  /**
   * Create our own jsx inspired PHP template engine
   */
  private static function compile($root) {
    $elementName = self::dashcaseToElementName($root->localName);
    //-----------------------
    // attributes
    //-----------------------
    $attributes = [];
    foreach ($root->attributes as $attribute) {
      $key = Util::dashcaseToCamelCase($attribute->localName);
      $attributes[] = "{$key}: '{$attribute->value}'";
    }

    //-----------------------
    // recurse children
    //-----------------------
    $children = [];
    foreach ($root->childNodes as $child) {
      if ($child->localName) {
        $children[] = self::compile($child);
      } else if (!empty(preg_replace('/\s+/', '', $child->data))){
        $children[] = "'{$child->data}'";
      }
    }

    //-----------------------
    // return embeddable JS
    //-----------------------
    return (
      "React.createElement(".
        (in_array($elementName, HTML_TAGS) ? "'{$elementName}'" : $elementName).", ".
        (count($attributes) ? '{ '.implode(", ", $attributes).' }' : 'null').
        (count($children) ? ', '.implode(", ", $children): '').
      ")"
    );
  }

  public static function render($jsx) {
    $dom = new DomDocument();
    $dom->loadHTML($jsx);
    $root = $dom->documentElement->childNodes[0]->childNodes[0];
    $html =  self::compile($root);
    return <<<HTML
    <!DOCTYPE html>
    <html>
      <head>
      	<title></title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react-dom.js"></script>
        <link rel="stylesheet" href="/ISTE-341-Project1/public/index.css" />

      </head>
      <body>
      	<div id="app"></div>
      	<script>
        "use strict";

    var _React$PropTypes = React.PropTypes;
    var arrayOf = _React$PropTypes.arrayOf;
    var shape = _React$PropTypes.shape;
    var number = _React$PropTypes.number;
    var string = _React$PropTypes.string;
    var node = _React$PropTypes.node;


    var saleItemType = {
      productName: string.isRequired,
      itemId: number.isRequired,
      description: string.isRequired,
      imageName: string.isRequired,
      price: number.isRequired,
      salePrice: number.isRequired,
      quantity: number.isRequired
    };

    var catalogType = arrayOf(shape(saleItemType));

    //----------------------
    // Paper
    //----------------------
    var Paper = function Paper(_ref) {
      var children = _ref.children;
      var className = _ref.className;
      return React.createElement(
        "div",
        { className: "Paper " + className },
        children
      );
    };
    Paper.propTypes = { children: node, className: string };

    //----------------------
    // Header
    //----------------------
    var Header = function Header() {
      return React.createElement(
        "div",
        { className: "App-header" },
        React.createElement(
          "a",
          { href: "/" },
          React.createElement("img", { src: "./public/logo.svg", className: "App-logo", alt: "logo" })
        ),
        React.createElement(
          "div",
          { className: "App-header-right" },
          React.createElement(
            "a",
            { href: "/cart" },
            React.createElement("img", { src: "./public/cart.svg", className: "", alt: "cart" })
          ),
          React.createElement(
            "a",
            { href: "/admin" },
            React.createElement("img", { src: "./public/admin.svg", className: "", alt: "admin" })
          )
        )
      );
    };

    //----------------------
    // SaleItem
    //----------------------
    var SaleItem = function SaleItem(_ref2) {
      var productName = _ref2.productName;
      var imageName = _ref2.imageName;
      var description = _ref2.description;
      var price = _ref2.price;
      var salePrice = _ref2.salePrice;
      var quantity = _ref2.quantity;
      return React.createElement(
        "div",
        { className: "SaleItem" },
        React.createElement("img", { src: imageName, alt: description, className: "SaleItem-img" }),
        React.createElement(
          "div",
          { className: "SaleItem-details" },
          React.createElement(
            "h2",
            { className: "SaleItem-name" },
            productName
          ),
          React.createElement(
            "p",
            { className: "SaleItem-description" },
            description
          ),
          salePrice ? React.createElement(
            "span",
            { className: "SaleItem-price" },
            React.createElement(
              "strike",
              null,
              price
            ),
            salePrice
          ) : React.createElement(
            "span",
            { className: "SaleItem-price" },
            price
          ),
          React.createElement(
            "span",
            null,
            React.createElement(
              "strong",
              null,
              quantity
            ),
            " Left"
          )
        )
      );
    };
    SaleItem.propTypes = saleItemType;

    var Home = function Home(_ref3) {
      var catalog = _ref3.catalog;
      var saleItems = _ref3.saleItems;
      return React.createElement(
        "div",
        null,
        "Home"
      );
    };
    Home.propTypes = {
      catalog: catalogType,
      saleItems: catalogType
    };
          ReactDOM.render($html, document.getElementById('app'))
        </script>
      </body>
    </html>
HTML;
  }
}
