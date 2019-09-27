import React from 'react';
import ReactDOM from 'react-dom';
import ModerPage from './ModerPage';

'use strict';

const domContainer = document.querySelector('#mode_order_moderation');
if (domContainer) {
    ReactDOM.render(React.createElement(ModerPage), domContainer);
}