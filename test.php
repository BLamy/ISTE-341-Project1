<?php
require_once './LIB_project1.php';

function Test($cb) {
  $cb();
}
class Assert {
  static function looseStringEquals($actual, $expected, $msg) {
    $actual = preg_replace('/\s/', '', $actual);
    $expected = preg_replace('/\s/', '', $expected);
    if ($actual === $expected) {
      echo "✔ $msg\n";
    } else {
      echo "× $msg\n";
      echo "Actual:\n";
      print_r($actual);
      echo "\nExpected:\n";
      print_r($expected);
    }
  }
}


Test(function() {
  $actual = TemplateEngine::render(<<<ACTUAL
  <Price price="100.00" salePrice="50.00" />
ACTUAL
  );

  $expected =<<<EXPECTED
  <span class="Price">
    <span class="strike">100.00</span>
    50.00
  </span>
EXPECTED;

  Assert::looseStringEquals($actual, $expected, 'Should handle Price');
});




Test(function() {
  $actual = TemplateEngine::render(<<<ACTUAL
  <Price price="100.00" salePrice="0.00"/>
ACTUAL
  );

  $expected =<<<EXPECTED
  <span class="Price">
    100.00
  </span>
EXPECTED;
Assert::looseStringEquals($actual, $expected, 'Should handle no saleprice');
});

Test(function() {
  $actual = TemplateEngine::render(<<<ACTUAL
  <SaleItem
        productName='RIT Hockey Jersey'
        imageName='3.png'
        description='A RIT Hockey Jersey'
        price='39.95'
        salePrice='0.00'
        quantity='20'
      />
ACTUAL
  );

  $expected = <<<EXPECTED
  <div class="SaleItem">
    <img src="public/3.png" alt="A RIT Hockey Jersey" />
    <div class="details">
      <h2 class="name">RIT Hockey Jersey</h2>
      <p class="description">A RIT Hockey Jersey</p>
      <span class="Price">
      39.95
    </span>
      <span>Quantity: <strong>20</strong></span>
      <div class="buttons"/>
    </div>
  </div>
EXPECTED;
  Assert::looseStringEquals($actual, $expected, 'Should handle SaleItem');
});
