import React from 'react';
import OrderService from '../../Service/OrderService';
import { convertStatus } from '../../../../Orders/Settings';

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
                                        <li className="list-group-item">
                                            <b>Имя файла</b> <a className="pull-right">Скачать</a>
                                        </li>
                                        <li className="list-group-item">
                                            <b>Имя файла</b> <a className="pull-right">Скачать</a>
                                        </li>
                                        <li className="list-group-item">
                                            <b>Имя файла</b> <a className="pull-right">Скачать</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li className="list-group-item">
                            <b>Итоговый Архив</b> <a className="pull-right">Скачать</a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>;
    }
}
