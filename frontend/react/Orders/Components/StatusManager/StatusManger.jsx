import React from 'react';
import { convertStatus, OrderStatus } from '../../Settings';
import AssignOrderPerformerField from './AssignOrderPerformerField';
import ModerateOrderField from './ModerateOrderField';
import CheckWorkField from './CheckWorkField';

export default class StatusManger extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            order: props.order,
            status: convertStatus(props.order.status - 1),
        };
    }

    render() {
        let { status } = this.state;
        return (
            <div className="form-group col-xs-11">
                <div className="row">
                    <div className="col-xs-2">
                        <div
                            className={ 'callout ' + status.className }
                            style={{
                                padding: '5px'
                            }}
                        >
                            <span> { status.label }</span>
                        </div>
                    </div>

                    { this.renderStatusInterface() }
                </div>

            </div>
        );
    }

    renderStatusInterface() {
        let { status, order} = this.state;

        if ( status.id === OrderStatus.STATUS_FIRST_PAYMENT_DONE ) {
            return <ModerateOrderField
                order={ order }
                changeStatus={ this.changeStatus.bind(this) }
            />;
        }


        if ( status.id === OrderStatus.STATUS_MODERATED ) {
            return <AssignOrderPerformerField
                order={ order }
                changeStatus={ this.changeStatus.bind(this) }
            />;
        }

        if ( status.id === OrderStatus.STATUS_ON_CHECK ) {
            return <CheckWorkField
                order={ order }
                changeStatus={ this.changeStatus.bind(this) }
            />;
        }
    }

    changeStatus(order) {
        this.setState({
            status: convertStatus(order.status),
        });
    }
}
