
# Thesigner WordPress boilerplate  [![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/thesign3r/boilterplate)
Starter theme for simple and painless wordpress developement

  

# Installation

```bash

git clone https://github.com/thesign3r/boilerplate.git newProjectName

cd newProjectName

php installer.php (only works on windows machines for now)

  

cd wp-content/theme/thesigner && npm install

  

>> build the project

gulp build

  

>> run developement

gulp

```  
# Livereload
This project uses [livereload](https://www.npmjs.com/package/livereload). Be sure you have that installed.
```bash
npm install -g livereload
```


# Project information
**SRC** directory contains all the assets - gulp with watch this directory and listen for changes.
When you save a file inside **SRC** folder gulp will recognize changes and rebuild the project  to your **DIST** directory.

# Core features
- Wordpress Downloader & Installer
- Livereload (hotswap css, reload when JS or HTML is compiled/saved)
- Gulp
- HTML Output compressor
- Purged unncessary WP stuff

# Gulp packages
- ES6 compiler
- Sass compiler
- Autoprefixer
- Assets merging
- Assets minification (css/js/img)


## Inluded Plugins

| Plugin | Description |
| ------ | ------ |
| ACF PRO | [Fields manager](https://www.advancedcustomfields.com/resources/)|
| Contacf form 7 | [Form bulder](https://wordpress.org/support/plugin/contact-form-7)|
| Duplicator | [Backup and migration](https://snapcreek.com/support/)|

  

## Included PHP functions (more docs to come)

asset() **Return url of asset**
svg() **Inject inline SVG**


## Included SCSS Mixins (more docs to come)

View src/lib/_helpers.scss
