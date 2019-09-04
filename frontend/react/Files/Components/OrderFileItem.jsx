import React from 'react';

export default function OrderFileItem(props) {
    let { file } = props;
    return (
        <li className="list-group-item">
            <a
                className="pull-right"
                href={ '/api/admin/file/download/' + file.id }
                target="_blank"
            >Скачать</a> { file .path }
        </li>
    );
}
