/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.enterMode = CKEDITOR.ENTER_BR;
    config.extraPlugins = 'youtube';
    config.allowedContent = true;
    //config.protectedSource.push(/<i\s*class=[\"\'].*?[\"\']\s*>\s*<\/i>/gis);
    //CKEDITOR.dtd.$removeEmpty['i'] = false;
    CKEDITOR.dtd.$removeEmpty.i = 0;
    //config.extraPlugins = 'lineutils,widget,mathjax';
};