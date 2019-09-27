import React from 'react';
import OrderFileItem from '../../Files/Components/OrderFileItem';
import OrderService from '../../Orders/Service/OrderService';

export default class OrderEditor extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            order: props.order,
            editMod: false,
            tempDescription: null
        };
    }

    render() {
        let { order } = this.state;
        return <div className="box-body">
            <div className="box box-primary">
                <div className="box-body box-profile">

                    <ul className="list-group list-group-unbordered">
                        <li className="list-group-item">

                            <div className="form-group">
                                <label>
                                    <b>Описание</b> <a
                                        onClick={ this.startEdit.bind(this) }
                                    >edit</a>
                                </label>
                                { this.renderDescription() }
                            </div>
                        </li>
                        <li className="list-group-item">

                            <div className="form-group">
                                <label>
                                    <b>Файлы запроса</b>
                                </label>
                                <div>
                                    <ul>
                                        { order.customerFiles.map((file) => {
                                            return <OrderFileItem
                                                file={ file }
                                            />
                                        }) }
                                    </ul>
                                </div>
                            </div>

                            <div className="form-group">
                                <label>
                                    <b>Результирующие файлы</b>
                                </label>
                                <div>
                                    <ul>
                                        { order.resultFiles.map((file) => {
                                            return <OrderFileItem
                                                file={ file }
                                            />
                                        }) }
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>;
    }

    renderDescription() {
        let { editMod, order, tempDescription } = this.state;

        if ( !editMod ) {
            return <div>
                { order.description }
            </div>;
        }

        return <div className="form-group">
            <textarea
                className="form-control"
                value={ tempDescription }
                onChange={ event => {
                    this.setState({
                        tempDescription: event.target.value
                    });
                } }
            ></textarea>
            <button
                className="btn btn-success btn-sm"
                onClick={ this.saveOrder.bind(this) }
            >save</button>
        </div>;
    }

    startEdit() {
        let { order } = this.state;
        this.setState({
            editMod: true,
            tempDescription: order.description
        });
    }

    saveOrder() {
        let { order, tempDescription } = this.state;
        order.description = tempDescription;

        this.setState({
            editMod: false,
            order: order
        });

        OrderService.updateOrder(order);
    }
}
