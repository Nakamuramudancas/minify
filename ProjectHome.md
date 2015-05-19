## News ##

**2013-07-23 [Minify 2.1.7](http://code.google.com/p/minify/downloads/list) is released in response to a [serious vulnerability](https://groups.google.com/d/msg/minify/cpN-ncKPFZE/kwYVpLMkfDwJ) discovered in all previous versions. You are strongly urged to follow the instructions in the [report](https://groups.google.com/d/msg/minify/cpN-ncKPFZE/kwYVpLMkfDwJ) to secure your installation, and to upgrade to Minify 2.1.7.**

2013-07-19 [Minify 2.1.6](http://code.google.com/p/minify/downloads/list) released. This fixes several JSMin bugs. Check the [history](http://code.google.com/p/minify/source/browse/HISTORY.txt?name=2.1.6#3) for more details.

## About ##

Minify is a PHP5 app that helps you follow several of Yahoo!'s [Rules for High Performance Web Sites](http://developer.yahoo.com/performance/index.html#rules).

It combines multiple CSS or Javascript files, removes unnecessary whitespace and comments, and serves them with gzip encoding and optimal client-side cache headers.

### [Support List](http://groups.google.com/group/minify) ###

## Minify in Use ##

| **Before** | ![http://mrclay.org/wp-content/uploads/2008/09/fiddler_before.png](http://mrclay.org/wp-content/uploads/2008/09/fiddler_before.png) |
|:-----------|:------------------------------------------------------------------------------------------------------------------------------------|
| **After**  | ![http://mrclay.org/wp-content/uploads/2008/09/fiddler_after.png](http://mrclay.org/wp-content/uploads/2008/09/fiddler_after.png)   |

The stats above are from a [brief walkthrough](http://mrclay.org/index.php/2008/09/19/minify-21-on-mrclayorg/) which shows how easy it is to set up Minify on an existing site. It eliminated 5 HTTP requests and reduced JS/CSS bandwidth by 70%.

The design is somewhat similar to Yahoo's [Combo Handler Service](http://yuiblog.com/blog/2008/07/16/combohandler/), except that Minify can combine _any_ local JS/CSS files you need for your page.

## Minify integrated into other Projects/Plugins ##

  * WordPress: [WP-Minify](http://wordpress.org/extend/plugins/wp-minify/)
  * WordPress: [W3 Total Cache](http://wordpress.org/extend/plugins/w3-total-cache/)
  * Zend Framework: [View helpers for links/scripts](https://github.com/bubba-h57/zf-helpers)
  * Yii: [minscript Extension](https://bitbucket.org/limi7less/minscript/wiki/Home)

## Features ##

  * Combines and minifies multiple CSS or JavaScript files into a single download
  * Uses an [enhanced port](http://code.google.com/p/minify/source/browse/trunk/min/lib/JSMin.php) of Douglas Crockford's [JSMin library](http://www.crockford.com/javascript/jsmin.html) and custom classes to minify [CSS](http://code.google.com/p/minify/source/browse/trunk/min/lib/Minify/CSS.php) and [HTML](http://code.google.com/p/minify/source/browse/trunk/min/lib/Minify/HTML.php)
  * Caches server-side (files/apc/memcache) to avoid doing unnecessary work
  * Responds with an HTTP 304 (Not Modified) response when the browser has an up-to-date cache copy
  * Most modules are lazy-loaded as needed (304 responses use minimal code)
  * Automatically rewrites relative URIs in combined CSS files to point to valid locations
  * With caching enabled, Minify is capable of handling hundreds of requests per second on a moderately powerful server.
  * Content-Encoding: gzip, based on request headers. Caching allows it so serve gzipped files faster than Apache's mod\_deflate option!
  * Test cases for most components
  * Easy integration of 3rd-party minifiers
  * Separate utility classes for HTTP encoding and cache control

## Requirements ##

  * PHP 5.1.6 / command-line tools require 5.3
  * The commonly installed [zlib extension](http://us3.php.net/manual/en/zlib.installation.php) is recommended for HTTP encoding functionality.
  * Version 1.0.1 required PHP 5.2.1+.

## Installation ##

See the UserGuide.

## [Support List](http://groups.google.com/group/minify) ##

## PHP5 Component Classes ##

Minify is based on several [PHP5 classes](ComponentClasses.md) that may be useful in other projects (all BSD licensed).

## Warnings ##

  * Minify is designed for efficiency, but, for very high traffic sites, Minify may serve files slower than your HTTPd due to the CGI overhead of PHP. See the [FAQ](FAQ.md) and CookBook for more info.
  * If you combine a lot of CSS, watch out for [IE's 4096 selectors-per-file limit](http://www.thecssdiv.co.uk/2009/08/28/another-weird-ie6-bug/). This bug has been verified in IE versions 6 through 8 (so far).

## Problem Domain ##

Pages that refer to multiple CSS or JavaScript files often suffer from slower page loads, due to the browser requesting each file individually. Many browsers also are limited to a few simultaneous requests per domain. The wait for a series of requests and the transfer of unoptimized files can dramatically reduce the client-side performance of your site.

Here are some of Yahoo!'s best practices that are addressed by the use of Minify.

  * [Make Fewer HTTP Requests](http://developer.yahoo.com/performance/rules.html#num_http)
  * [Add an Expires or a Cache-Control Header](http://developer.yahoo.com/performance/rules.html#expires)
  * [Gzip Components](http://developer.yahoo.com/performance/rules.html#gzip)
  * [Minify JavaScript and CSS](http://developer.yahoo.com/performance/rules.html#minify)
  * [Configure ETags](http://developer.yahoo.com/performance/rules.html#etags)
  * [Keep Components under 25K](http://developer.yahoo.com/performance/rules.html#under25)

## Security Disclosures ##

Please report any security vulnerabilities directly to [steve@mrclay.org](mailto:steve@mrclay.org). Do not post them in the bug tracker.

### Acknowledgments ###

Minify was inspired by [jscsscomp](http://code.google.com/p/jscsscomp/) by Maxim Martynyuk and by the article '[Supercharged JavaScript](http://www.hunlock.com/blogs/Supercharged_Javascript)' by Patrick Hunlock.

The [JSMin library](http://www.crockford.com/javascript/jsmin.html) used for JavaScript minification was originally written by Douglas Crockford and was [ported to PHP](http://code.google.com/p/jsmin-php) by Ryan Grove specifically for use in Minify.

You may contact Steve Clay (steve@mrclay.org) or Ryan (ryan@wonko.com) if you're interested in joining the project.