const statusesData = [
    {
        label: 'Заказ создан',
        id: 1,
        className: 'bg-green'
    },
    {
        label: 'Оплата прошла',
        id: 2,
        className: 'bg-green'
    },
    {
        label: 'Отмодерирован',
        id: 3,
        className: 'bg-yellow'
    },
    {
        label: 'Не отмодерирован',
        id: 4,
        className: 'bg-green'
    },
    {
        label: 'В работе',
        id: 5,
        className: 'bg-gray'
    },
    {
        label: 'Проверяется',
        id: 6,
        className: ''
    },
    {
        label: 'Выполнен',
        id: 7,
        className: 'bg-green'
    },
    {
        label: 'Вторая оплата прошла',
        id: 8,
        className: 'bg-green'
    },
    {
        label: 'Клиент не доволен',
        id: 9,
        className: 'bg-green'
    },
    {
        label: 'Закрытые заказы',
        id: 10,
        className: 'bg-black'
    },
    {
        label: 'Проблемы',
        id: 11,
        className: 'bg-red-active'
    },
];

export const OrderStatus = {
     STATUS_CREATED : 1,
     STATUS_FIRST_PAYMENT_DONE : 2,
     STATUS_MODERATED : 3,
     STATUS_NOT_MODERATED : 4,
     STATUS_IN_PROGRESS : 5,
     STATUS_ON_CHECK : 6,
     STATUS_WORK_DONE : 7,
     STATUS_SECOND_PAYMENT_DONE : 8,
     STATUS_CLIENT_PROBLEM : 9,
     STATUS_APPROVE : 10,
     STATUS_PROBLEM : 11
};

export function convertStatus(id) {
    return statusesData[id];
}

export default statusesData;
