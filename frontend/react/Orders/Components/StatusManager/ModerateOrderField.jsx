import React from 'react';
import OrderService from '../../Service/OrderService';

export default class ModerateOrderField extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            order: props.order,
            changeStatus: props.changeStatus
        };
    }

    render() {
        return (
            <div className="form-group col-xs-2">
                <button
                    type="button"
                    className="btn btn-block btn-success btn-sm"
                    onClick={ this.updatePerformer.bind(this) }
                >Принять</button>
            </div>
        );
    }

    updatePerformer(event) {
        let { order } = this.state;

        order.status += 1;
        OrderService.updateOrder(order);
        this.state.changeStatus(order.status);
    }
}
