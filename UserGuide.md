If this page doesn't help, please post a question on our [Google group](http://groups.google.com/group/minify).

# Installing Minify for the first time #

  1. Clone the [minify git repository](https://github.com/mrclay/minify). Alternatively, you may [download](http://code.google.com/p/minify/downloads/list) the latest release and unzip it into a new "minify" directory.
  1. The distribution contains a folder "min". Copy this into your DOCUMENT\_ROOT so it is a **direct child** of DOCUMENT\_ROOT (e.g. `http://example.com/min/`). Document roots are usually named `htdocs`, `public_html`, or `www`.
  1. If you want to use the BuilderApp, you must enable it in your [config file](https://code.google.com/p/minify/source/browse/min/config.php#13).

Note: The BuilderApp will not function properly in subdirectories, but it's not necessary for Minify's functionality.

Done!

(Optional) See TestingMinify if you'd like to run unit tests.

### Hosting on Lighttpd ###

Minify comes with Apache mod\_rewrite rules, but this does the same for Lighttpd:

```
url.rewrite-once = ( "^/min/([a-z]=.*)" => "/min/index.php?$1" )
```

## Upgrading Minify from 2.1.x ##

See the [Upgrade Guide](http://code.google.com/p/minify/source/browse/tags/release_2.1.2/UPGRADING.txt)

# Usage #

Enable the BuilderApp via your [config file](https://code.google.com/p/minify/source/browse/min/config.php#13). The default password is "admin", but even if no password is used there's very little server information disclosed.

Browse to http://example.com/min/

The Minify URI Builder will help you create URIs you can use to minify existing files on your site. You can see screenshots and get a feel for this process from this [walkthrough on mrclay.org](http://mrclay.org/index.php/2008/09/19/minify-21-on-mrclayorg/)

Browse to [http://example.com/min/README.txt](http://code.google.com/p/minify/source/browse/min/README.txt) for more complete documentation.

You may want to disable the BuilderApp when not in use.

# Configuration #

[min/config.php](http://code.google.com/p/minify/source/browse/min/config.php) holds general config options.

[min/groupsConfig.php](http://code.google.com/p/minify/source/browse/min/groupsConfig.php) holds preset groups of files to minify. (The builder application can help with this).

CookBook shows how to customize settings between production/development environments, and between groups.

CustomSource shows how to set some file/source-specific options, or serve content from a PHP script or URL.

# Problems? #

See CommonProblems and [Debugging](Debugging.md). You might also try TestingMinify (running `test_environment.php` in particular).