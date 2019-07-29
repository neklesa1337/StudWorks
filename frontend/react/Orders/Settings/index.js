const statuses = [
    {
        label: 'Создан',
        id: 1
    },
    {
        label: 'Отмодерирован',
        id: 2
    },
    {
        label: 'В работе',
        id: 3
    },
    {
        label: 'Проверяется',
        id: 4
    },
    {
        label: 'Выполнен',
        id: 5
    },
    {
        label: 'Одобрен клиентом',
        id: 6
    },
    {
        label: 'Проблемы',
        id: 7
    },
];

export function convertStatus(id) {
    for (let i = 0; i < statuses.length; i++) {
        if (statuses[i].id === id) {
            return statuses[i].label;
        }
    }
    return '';
}

export default statuses;
