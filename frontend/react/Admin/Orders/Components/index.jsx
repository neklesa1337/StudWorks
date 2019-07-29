import React from 'react';
import ReactDOM from 'react-dom';
import OrderLine from './OrderLine';
import OrderIds from '../../../Orders/Settings';
import OrderService from '../Service/OrderService';

'use strict';

const e = React.createElement;

class AdminOrders extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            orderStatusId: 3,
            orders: []
        };
    }

    render() {
        return (
            <div className="row">
                <hr/>
                <div className="col-xs-12">
                    <div className="box">
                        <div className="box-header">
                            <div className="row">
                                <div className="col-xs-1">
                                    <h3 className="box-title">Orders Table</h3>
                                </div>
                                <div className="form-group col-xs-3">
                                    <select
                                        className="form-control"
                                        defaultValue={ this.state.orderStatusId }
                                    >
                                        { OrderIds.map((item) => {
                                            return <option
                                                value={ item.id }
                                            >{ item.label }</option>;
                                        }) }
                                    </select>
                                </div>
                            </div>
                        </div>
                        { this.renderTable() }
                    </div>
                </div>
            </div>
        )
    }

    renderTable() {
        return (
            <div className="box-body table-responsive no-padding">
                <table className="table table-hover">
                    <tbody>
                        { this.renderTableHeader() }
                        { this.state.orders.map((order) => {
                            return <OrderLine
                                key={ order.id }
                                order={ order }
                            />
                        })}
                    </tbody>
                </table>
            </div>
        )
    }

    renderTableHeader() {
        return (
            <tr>
                <th>ID</th>
                <th>Статус</th>
                <th>Последние обновление</th>
            </tr>
        )
    }

    async componentDidMount() {
        this.setState({
            orders: (await OrderService.getOrdersByStatus(
                this.state.orderStatusId
            )).data
        })
    }
}

const domContainer = document.querySelector('#admin_order_administration');
if (domContainer) {
    ReactDOM.render(e(AdminOrders), domContainer);
}