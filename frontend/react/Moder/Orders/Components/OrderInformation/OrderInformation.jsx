import React from 'react';
import OrderService from '../../../../Orders/Service/OrderService';
import OrderEditor from '../../../../Lib/Components/OrderEditor';
import ModerateOrderField from  '../../../../Orders/Components/StatusManager/ModerateOrderField';
import { convertStatus } from "../../../../Orders/Settings";


export default class OrderInformation extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            orderId: props.orderId,
            order: null,
            close: props.close,
        };
    }

    async componentDidMount() {
        let order = await OrderService.getOrderInformationById(
            this.state.orderId
        );

        this.setState({
            order: order
        });
    }

    render() {
        let { order } = this.state;

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

                        { order ? (
                            <ModerateOrderField
                                order={ order }
                                changeStatus={ this.changeStatus.bind(this) }
                            />
                        ) : '' }

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
                <OrderEditor
                    order={ this.state.order }
                />
            </div>
        );
    }

    closeEditor() {
        this.state.close();
    }

    changeStatus(order) {
        this.setState({
            status: convertStatus(order.status),
        });
        this.state.close();
    }
}
