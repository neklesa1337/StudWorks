import React from 'react';
import { convertStatus } from '../../../Orders/Settings';

export default class OrderLine extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            order: props.order
        };
        console.log(convertStatus)
    }

    convertDate(stringDate) {
        const d = new Date(stringDate);
        const date = d.toLocaleDateString();
        const time = d.toLocaleTimeString();
        return `${date} ${time}`
    }

    render() {
        let order = this.state.order;
        return (
            <tr className="bg-light-blue color-palette">
                <td>{ order.id }</td>
                <td>{ convertStatus(order.status) }</td>
                <td>{ this.convertDate(order.updateAt) }</td>
            </tr>
        )
    }
}
