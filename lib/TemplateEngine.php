<?php

class TemplateEngine {
  /**
   * All components will be autoresolved out of /view
   */
  private static function pathForComponent($name) {
    return getcwd() . "/view/{$name}.php";
  }

  /**
   * Check to see if there is an element in the components path which matches
   */
  private static function isCustomElement($name) {
    // return preg_match('/^((?:[A-Z]\w*)|(?:[a-zA-Z]+-[\w-]*)*)$/', $name);
    return file_exists(self::pathForComponent($name));
  }

  /**
   * Recursively find all the child nodes which are in the components directory
   */
  private static function findCustomChildrenOfNode($domNode) {
    $customElements = [];
    foreach ($domNode->childNodes as $node) {
      if (self::isCustomElement($node->localName)) {
        $customElements[] = $node;
      }
      if($node->hasChildNodes()) {
        $recursivelyResolvedChildren = self::findCustomChildrenOfNode($node);
        if (count($recursivelyResolvedChildren)) {
          array_push($customElements, ...$recursivelyResolvedChildren);
        }
      }
    }
    return $customElements;
  }

  /**
  * Recursively resolvses all template
  *
  * note: Mutates param
  */
  private static function compile($root) {
    $children = self::findCustomChildrenOfNode($root->documentElement);
    foreach ($children as $child) {
      $attributes = [];
      foreach ($child->attributes as $attribute) {
        $attributes[$attribute->localName] = $attribute->value;
      }
      $tmp = new DomDocument();
      $tmp->loadXML(self::mount($child->localName, $attributes));
      $node = $root->importNode($tmp->documentElement, true);
      $child->parentNode->replaceChild($node, $child);
    }
    return $root;
  }

  /**
   * Will take a component name and it's attributes then return the shallow rendered result.
   */
  public static function shallowRender($name, $attributes) {
    include_once(self::pathForComponent($name));
    return call_user_func($name, $attributes);
  }

  /**
   * Will take JSX-like markup as a string and deep render all to static markup
   *
   * See test.php for example usages.
   *
   * Differences from JSX:
   *   1) Don't have to use DOMAPI this means you don't have to use `className`
   *   2) is no {} to escape to javascript. Must use normal PHP mechinisms for building markup
   */
  public static function render($jsx) {
    $dom = new DomDocument();
    // The XML parser expects some wrapping nodes.
    $dom->loadXML("<xml>$jsx</xml>");
    self::compile($dom);
    // Strip added XML
    return preg_replace('/<.?xml(?:[^>])*>/', '', $dom->saveXML());
  }

  /**
   * Will take a component name and it's attributes and return the deep rendered result.
   * compose(self::render, self::shallowRender)
   */
  public static function mount($name, $attributes) {
    return self::render(self::shallowRender($name, $attributes));
  }

  /**
   * Will Render given jsx into a valid html5 page
   */
  public static function page($jsx, $pageSlug = '', $title='RIT Shirts') {
    $body = self::render(<<<TEMPLATE
      <div id="$pageSlug">
        <Toolbar />
        $jsx
      </div>
TEMPLATE
    );

    return <<<PAGE
      <!doctype html>
      <html lang="en">
        <head>
          <meta charset="utf-8">
          <title>$title</title>
          <meta name="description" content="ISTE-341-Project">
          <meta name="author" content="Brett Lamy">
          <link rel="stylesheet" href="public/index.css" />
        </head>
        <body>
          $body
          <script src="public/scripts.js"></script>
        </body>
      </html>
PAGE;
  }
}
