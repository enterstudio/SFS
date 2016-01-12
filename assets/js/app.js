import fastClick from 'fastclick';
import $ from 'jquery';

import skipLinks from './utils/skipLinks';
import widont from './utils/widont';
import iframer from './utils/iframer';
import equalHeight from './utils/equalHeight';

function globals () {

	// FastClick
    fastClick(document.body);

    // EqualHeight
    equalHeight('#panels-parent', '.panel');
    $(window).resize(function equalHeightOnResize () {
        equalHeight('#panels-parent', '.panel');
    });
}

$(function run () {
    console.log('ᕕ( ᐛ )ᕗ Running...');
    globals();
});
