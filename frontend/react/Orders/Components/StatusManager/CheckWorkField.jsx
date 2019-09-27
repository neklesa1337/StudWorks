import React, { Fragment } from 'react';
import OrderService from '../../Service/OrderService';
import { OrderStatus } from  '../../Settings';

export default class CheckWorkField extends React.Component {
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
                        onClick={ this.correctOrder.bind(this) }
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
                        onClick={ this.unCorrectOrder.bind(this) }
                    >Коментировать</button>
                </div>
            </Fragment>
        );
    }

    correctOrder() {
        let { order } = this.state;

        let newOrderState = OrderService.correctOrder(order);
        this.state.changeStatus(newOrderState);
    }

    async unCorrectOrder() {
        let { order, comment } = this.state;
        let newOrderState = await OrderService.unCorrectOrder(order, comment);
        this.state.changeStatus(newOrderState);
    }
}
