import React from 'react';
import OrderService from '../../Service/OrderService';
import { convertStatus } from '../../../../Orders/Settings';
import OrderEditor from './OrderEditor';
import OrderLogs from './OrderLogs';

export default class OrderInformation extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            orderId: props.orderId,
            order: null,
            close: props.close,
            status: {}
        };
    }
    async componentDidMount() {
        let order = await OrderService.getOrderInformationById(
            this.state.orderId
        );

        this.setState({
            order: order,
            status: convertStatus(order.status - 1)
        });
    }

    render() {
        let { order, status } = this.state;

        return (
            <div className="box">
                <div className="box-header">
                    <div className="row">
                        <div className="col-xs-1">
                            <h3 className="box-title">
                                <i
                                    className="fa fa-fw fa-mail-reply-all"
                                    style={{
                                        fontSize: '30px',
                                        cursor: 'pointer'
                                    }}
                                    onClick={ this.closeEditor.bind(this) }
                                />
                            </h3>
                        </div>
                        <div className="form-group col-xs-3">
                            <div
                                className={ 'callout ' + status.className }
                                style={{
                                    padding: '5px'
                                }}
                            >
                                <span> { status.label }</span>
                            </div>
                        </div>
                    </div>
                </div>

                {this.renderInformationModule()}

            </div>
        );
    }

    renderInformationModule() {
        if ( !this.state.order ) {
            return;
        }

        return (
            <div className="row">
                <div className="col-lg-5">
                    <OrderEditor
                        order={ this.state.order }
                    />
                </div>
                <div className="col-lg-7">
                    <OrderLogs
                        order={ this.state.order }
                    />
                </div>
            </div>
        );
    }

    closeEditor() {
        this.state.close();
    }
}
