/**
 * Form Editors
 */

'use strict';

(function () {
  // Snow Theme
  // --------------------------------------------------------------------  
  const editorElement = document.querySelector('#editor');
  if (editorElement) {
    const quill = new Quill('#editor', {
      theme: 'snow'
    });
  }
})();