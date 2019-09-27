import React from 'react';
import ReactDOM from 'react-dom';
import CorrectorPage from './CorrectorPage';

'use strict';

const domContainer = document.querySelector('#corrector_order_check');
if (domContainer) {
    ReactDOM.render(React.createElement(CorrectorPage), domContainer);
}