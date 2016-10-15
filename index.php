<?php
require_once './model/index.php';
require_once './lib/TemplateEngine.php';

require_once '../dbinfo.php';
$db = new DB($DB_host, $DB_port, $DB_name, $DB_user, $DB_pass); // From dbinfo.php

$items = json_encode($db->getItems());
$saleItems = json_encode($db->getSaleItems());

echo TemplateEngine::page("<Home items='$items' saleItems='$saleItems' />");

























































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
