const statuses = [
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

export function convertStatus(id) {
    return statuses[id];
}

export default statuses;
