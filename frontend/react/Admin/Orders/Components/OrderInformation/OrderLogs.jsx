import React from 'react';
import OrderService from '../../Service/OrderService';
import { convertStatus } from '../../../../Orders/Settings';

export default class OrderLogs extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            order: props.order,
        };
    }

    render() {
        let { order } = this.state;
        return <div className="box-body">
            <div className="box box-primary">
                <div className="box-body box-profile">

                    <table className="table table-striped">
                        <tbody>
                            <tr>
                                <th>Task</th>
                                <th>Progress</th>
                                <th>Label</th>
                            </tr>

                            { this.renderLines() }

                        </tbody>
                    </table>

                </div>
            </div>
        </div>;
    }

    renderLines() {
        return this.state.order.logs.map((log) => {
            return <tr>
                <td>
                    { log.description }
                </td>
                <td>
                    { log.createAt }
                </td>
                <td>
                    { log.userName }
                </td>
            </tr>
        })
    }
}
