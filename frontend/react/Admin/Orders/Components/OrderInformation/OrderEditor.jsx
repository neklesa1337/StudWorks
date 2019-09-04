import React from 'react';
import OrderFileItem from '../../../../Files/Components/OrderFileItem';

export default class OrderEditor extends React.Component {
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

                    <ul className="list-group list-group-unbordered">
                        <li className="list-group-item">

                            <div className="form-group">
                                <label>
                                    <b>Описание</b>
                                </label>
                                <div>
                                    { order.description }
                                </div>
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
                        </li>
                    </ul>

                </div>
            </div>
        </div>;
    }
}
