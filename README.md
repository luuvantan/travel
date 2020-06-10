npm install quill@1.3.6

//quill.js
import Quill from 'quill/core';

import Toolbar from 'quill/modules/toolbar';
import Snow from 'quill/themes/snow';

import Bold from 'quill/formats/bold';
import Italic from 'quill/formats/italic';
import Header from 'quill/formats/header';


Quill.register({
  'modules/toolbar': Toolbar,
  'themes/snow': Snow,
  'formats/bold': Bold,
  'formats/italic': Italic,
  'formats/header': Header
});


export default Quill;


// app.js
require('./quill.js');

window.Quill = require('Quill');

// app.sass
@import '~quill/dist/quill.core.css';

@import '~quill/dist/quill.snow.css';
