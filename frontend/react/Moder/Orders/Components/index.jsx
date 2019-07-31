import React from 'react';
import ReactDOM from 'react-dom';
import AdminOrders from './AdminOrders.jsx';

'use strict';

const domContainer = document.querySelector('#mode_order_moderation');
if (domContainer) {
    ReactDOM.render(React.createElement(AdminOrders), domContainer);
}