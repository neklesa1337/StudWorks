import React, { Fragment } from 'react';
import OrderService from '../../Service/OrderService';
import { OrderStatus } from  '../../Settings';

export default class ModerateOrderField extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            order: props.order,
            changeStatus: props.changeStatus,
            comment: ''
        };
    }

    render() {
        return (
            <Fragment>
                <div className="form-group col-xs-2">
                    <button
                        type="button"
                        className="btn btn-block btn-success btn-sm"
                        onClick={ this.moderateOrder.bind(this) }
                    >Принять</button>
                </div>
                <div className="form-group col-xs-4">
                    <input
                        className="form-control"
                        type="text"
                        value={ this.state.comment }
                        onChange={ event => {
                            this.setState({
                                comment: event.target.value
                            });
                        } }
                    />
                </div>
                <div className="form-group col-xs-2">
                    <button
                        type="button"
                        className="btn btn-block btn-warning btn-sm"
                        onClick={ this.unModerateOrder.bind(this) }
                    >Коментировать</button>
                </div>
            </Fragment>
        );
    }

    moderateOrder() {
        let { order } = this.state;

        let newOrderState = OrderService.moderateOrder(order);
        this.state.changeStatus(newOrderState);
    }

    async unModerateOrder() {
        let { order, comment } = this.state;
        let newOrderState = await OrderService.unModerateOrder(order, comment);
    }
}
