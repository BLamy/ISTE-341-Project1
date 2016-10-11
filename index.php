<?php
require_once '../dbinfo.php';
require_once './lib/DB.php';
require_once './lib/TemplateEngine.php';
$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass);

function renderItems($items) {
  return implode('', array_map(function($item) {
    return "
    <Sale-item
      product-name='{$item['productName']}'
      image-name='{$item['imageName']}'
      description='{$item['description']}'
      price='{$item['price']}'
      sale-price='{$item['salePrice']}'
      quantity='{$item['quantity']}'
    />";
  }, $items));
}

$homepage = TemplateEngine::render("
<div>
  <Header />
  <div class-name='Home-wrapper'>
    <Paper class-name='Home-catalog'>
      <h1 class-name='Home-title'>Catalog</h1>".
      renderItems($db->getItems()).
    "</Paper>
    <Paper class-name='Home-saleItems'>
      <h1 class-name='Home-title'>Sales</h1>".
      renderItems($db->getSaleItems()).
    "</Paper>
  </div>
<div>
");


echo $homepage;

























































// function assertEqual($actual, $expected, $msg = '') {
//   if ($actual === $expected) {
//     echo "Success: $msg \n";
//   } else {
//     echo "Failed:$msg \n Actual:\n$actual \n Expected:\n$expected \n";
//   }
// }
//
//
// assertEqual(compile("<Home />"), "React.createElement(Home, null);", "Should handle Single item");
// assertEqual(compile("<div />"), "React.createElement('div', null);", "Should not capitalize div");
// assertEqual(compile("<Home prop='foo'/>"), "React.createElement(Home, { prop: 'foo' });", "Should handle Single prop");
// assertEqual(compile("<Home prop='foo' bar='bar'/>"), "React.createElement(Home, { prop: 'foo', bar: 'bar' });", "Should handle mulitple props");
//
// const SINGLE_NESTED = <<<JSX
// <div>
//   <Home />
// </div>
// JSX;
// assertEqual(compile(SINGLE_NESTED), "React.createElement('div', null, React.createElement(Home, null));", "Should handle single child");
//
// const MULTIPLE_NESTED = <<<JSX
// <div>
//   <Home />
//   <Admin />
// </div>
// JSX;
// assertEqual(compile(MULTIPLE_NESTED), "React.createElement('div', null, React.createElement(Home, null), React.createElement(Admin, null));", "Should handle multple child");
//
// const BASIC_HTML = <<<JSX
// <div class-name="App">
//   <div class-name="App-header">
//     <a href="/">Home</a>
//   </div>
//   <div class-name="App-body">
//     <Home />
//   </div>
// </div>
// JSX;
// const BASIC_HTML_COMPILED = <<<STR
// React.createElement(
//   'div',
//   { class-name: 'App' },
//   React.createElement(
//     'div',
//     { class-name: 'App-header' },
//     React.createElement(
//       'a',
//       { href: '/' },
//       'Home'
//     )
//   ),
//   React.createElement(
//     'div',
//     { class-name: 'App-body' },
//     React.createElement(Home, null)
//   )
// );
// STR;
// assertEqual(
//   preg_replace('/\s+/', '', compile(BASIC_HTML)),
//   preg_replace('/\s+/', '', BASIC_HTML_COMPILED),
//   "Should handle html"
// );
//

?>
