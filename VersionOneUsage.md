# Installation #

Installing Minify is super easy:

  1. Make sure you have [PHP](http://www.php.net/) 5.2.1 or higher.
  1. Download version 1.0.1 of Minify.
  1. Extract the contents of the archive into a web-accessible directory on your server.
  1. Use one of the methods described below to call Minify from your web pages.

# Usage #

There are several ways to use Minify. Each works equally well, so feel free to use whichever method you prefer.

## The quick & dirty way ##

Modify your HTML pages to load CSS and JavaScript files by calling `minify.php` directly as demonstrated below.

**Before Minify**
```
<html>
  <head>
    <title>Example Page</title>
    <link rel="stylesheet" type="text/css" href="css/example.css" />
    <link rel="stylesheet" type="text/css" href="css/monkeys.css" />
    <link rel="stylesheet" type="text/css" href="foo/bar/baz.css" />
    <script type="text/javascript" src="js/prototype.js"></script>
    <script type="text/javascript" src="js/example.js"></script>
  </head>
  <body>
    <p>
      Blah.
    </p>
  </body>
</html>
```

**After Minify**
```
<html>
  <head>
    <title>Example Page</title>
    <link rel="stylesheet" type="text/css" href="minify.php?files=css/example.css,css/monkeys.css,foo/bar/baz.css" />
    <script type="text/javascript" src="minify.php?files=js/prototype.js,js/example.js"></script>
  </head>
  <body>
    <p>
      Blah.
    </p>
  </body>
</html>
```

## The mod\_rewrite way ##

If you're using Apache with the mod\_rewrite module enabled, you can have Minify automatically handle all requests for .css or .js files by adding the following rules to your site's `.htaccess` file:

```
RewriteEngine on

# Combine and minify JavaScript and CSS with Minify.
RewriteRule ^(.*\.(css|js))$ /minify.php?files=$1 [L,NC]
```

This will cause all CSS and JavaScript files to be served by Minify, even when you don't modify your HTML pages to call `minify.php` directly.

Just like in the quick & dirty example, you can still combine multiple files by separating their names with commas, like so:

```
<script type="text/javascript" src="firstfile.js,secondfile.js"></script>
```

## The PHP way ##

If you want more fine-grained control over Minify's options and execution, you can include it in your PHP scripts and call it directly. This takes a little more work than the previous methods, but in return you get more flexibility:

```
<?php
// Load the Minify library.
require 'minify.php';

// Create new Minify objects.
$minifyCSS = new Minify(Minify::TYPE_CSS);
$minifyJS  = new Minify(Minify::TYPE_JS);

// Specify the files to be minified. Full URLs are allowed as long as they point
// to the same server running Minify.
$minifyCSS->addFile(array(
  'css/example.css',
  'css/monkeys.css',
  'http://example.com/foo/bar/baz.css'
));

$minifyJS->addFile(array(
  'js/prototype.js',
  'js/example.js'
));
?>
<html>
  <head>
    <title>Example Page</title>
    <style type="text/css">
      <?php echo $minifyCSS->combine(); ?>
    </style>
    <script type="text/javascript>
      <?php echo $minifyJS->combine(); ?>
    </script>
  </head>
  <body>
    <p>
      Blah.
    </p>
  </body>
</html>
```