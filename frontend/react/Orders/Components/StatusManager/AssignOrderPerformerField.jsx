import React from 'react';
import UserService from '../../../User/Service/UserService';
import OrderService from '../../Service/OrderService';

export default class AssignOrderPerformerField extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            order: props.order,
            performers: [],
            changeStatus: props.changeStatus
        };
    }

    render() {
        let { performers } = this.state;
        return (
            <div className="form-group col-xs-10">
                <div className="form-horizontal">
                    <div className="form-group">
                        <label className="col-sm-1 control-label">Назначить:</label>
                        <div className="col-sm-10">
                            <select
                                className="form-control"
                                onChange={ this.updatePerformer.bind(this) }
                            >
                                <option value={ null }> Null</option>
                                { performers.map((user) => {
                                    return <option
                                        value={ user.id }
                                        key={ user.id }
                                    >{ user.userName }</option>
                                }) }

                            </select>
                        </div>
                    </div>
                </div>
            </div>
        );
    }

    async componentDidMount() {
        this.setState({
            performers: await UserService.getPerformers()
        });
    }

    updatePerformer(event) {
        let { order } = this.state;

        order.status += 1;
        order.performerId = event.target.value;
        OrderService.updateOrder(order);
        this.state.changeStatus(order.status);
    }
}
