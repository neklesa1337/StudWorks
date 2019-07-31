const statusesData = [
    {
        label: 'Создан',
        id: 1,
        className: 'bg-green'
    },
    {
        label: 'Отмодерирован',
        id: 2,
        className: 'bg-yellow'
    },
    {
        label: 'В работе',
        id: 3,
        className: 'bg-gray'
    },
    {
        label: 'Проверяется',
        id: 4,
        className: ''
    },
    {
        label: 'Выполнен',
        id: 5,
        className: 'bg-green'
    },
    {
        label: 'Одобрен клиентом',
        id: 6,
        className: 'bg-black'
    },
    {
        label: 'Проблемы',
        id: 7,
        className: 'bg-red-active'
    },
];

export const OrderStatus = {
     STATUS_CREATED : 1,
     STATUS_MODERATED : 2,
     STATUS_IN_PROGRESS : 3,
     STATUS_CHECK : 4,
     STATUS_DONE : 5,
     STATUS_APPROVE : 6,
     STATUS_PROBLEM : 7
};

export function convertStatus(id) {
    return statusesData[id];
}

export default statusesData;
