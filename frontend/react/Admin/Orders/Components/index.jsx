import React from 'react';
import ReactDOM from 'react-dom';
import AdminPage from './AdminPage';

'use strict';

const domContainer = document.querySelector('#admin_order_administration');
if (domContainer) {
    ReactDOM.render(React.createElement(AdminPage), domContainer);
}