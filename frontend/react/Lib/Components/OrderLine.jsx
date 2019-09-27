import React from 'react';
import { convertStatus } from '../../Orders/Settings';

export default class OrderLine extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            order: props.order,
            status: convertStatus(props.order.status - 1),
            selectOrder: props.selectOrder
        };
    }

    convertDate(stringDate) {
        const d = new Date(stringDate);
        const date = d.toLocaleDateString();
        const time = d.toLocaleTimeString();
        return `${date} ${time}`
    }

    render() {
        let { order, status } = this.state;
        return (
            <tr className={ status.className }>
                <td
                    style={{
                        cursor: 'pointer'
                    }}
                    onClick={ this.selectOrder.bind(this) }
                >{ order.id }</td>
                <td>{ status.label }</td>
                <td>{ this.convertDate(order.updateAt) }</td>
                <td>
                    <button
                        type="button"
                        className="btn btn-block btn-default"
                        onClick={ this.selectOrder.bind(this) }
                    >Подробнее</button>
                </td>
            </tr>
        )
    }

    selectOrder() {
        this.state.selectOrder(
            this.state.order.id
        );
    }
}
