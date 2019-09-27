import React from 'react';
import OrderLine from '../../../Lib/Components/OrderLine';
import OrderService from '../../../Orders/Service/OrderService';
import OrderInformation from './OrderInformation/OrderInformation';
import { OrderStatus } from '../../../Orders/Settings';

export default class ModerPage extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            orderStatusId: OrderStatus.STATUS_FIRST_PAYMENT_DONE,
            orders: [],
            selectedOrderId: null
        };
        console.log(this.state);
    }

    render() {
        return (
            <div className="row">
                <hr/>
                <div className="col-xs-12">
                    { this.renderLogicBlock() }
                </div>
            </div>
        )
    }

    renderLogicBlock() {
        let { selectedOrderId } = this.state;

        if ( selectedOrderId ) {
            return <OrderInformation
                orderId={ selectedOrderId }
                close={ this.closeOrderEditor.bind(this) }
            />
        }

        return this.renderOrderTable();
    }

    renderOrderTable() {
        return (
            <div className="box">
                <div className="box-header">
                    <div className="row">
                        <div className="col-xs-1">
                            <h3 className="box-title">Orders Table</h3>
                        </div>
                    </div>
                </div>
                { this.renderTableLines() }
            </div>
        )
    }

    renderTableLines() {
        return (
            <div className="box-body table-responsive no-padding">
                <table className="table table-hover">
                    <tbody>
                    { this.renderTableHeader() }
                    { this.state.orders.map((order) => {
                        return <OrderLine
                            key={ order.id }
                            order={ order }
                            selectOrder={ this.selectOrder.bind(this) }
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
                <th style={{
                    width: '100px'
                }}>Действия</th>
            </tr>
        )
    }

    async componentDidMount() {
        await this.updateOrders(this.state.orderStatusId);
    }

    async updateOrders(orderId) {
        this.setState({
            orders: await OrderService.getOrdersByStatus(orderId),
            orderStatusId: orderId
        })
    }

    changeOrderId(event) {
        this.updateOrders(event.target.value);
    }

    selectOrder(id) {
        this.setState({
            selectedOrderId: id
        });
    }

    closeOrderEditor() {
        this.setState({
            selectedOrderId: null,
        });
        this.updateOrders(this.state.orderStatusId)
    }
}
