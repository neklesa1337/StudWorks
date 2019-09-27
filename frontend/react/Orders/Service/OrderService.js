import OrderRepository from '../Repository/OrderRepository.js';
import { OrderStatus } from  '../Settings';
export default {
    async getOrdersByStatus(orderStatus) {
        return (await OrderRepository.getOrdersByStatus(orderStatus)).data;
    },

    async getOrderInformationById(orderId) {
        return (await OrderRepository.getOrderInformationById(orderId)).data;
    },

    async updateOrder(order) {
        return (await OrderRepository.updateOrder(order)).data;
    },
    moderateOrder(order) {
        order.status = OrderStatus.STATUS_MODERATED;
        this.updateOrder(order);
        return order
    },
    async unModerateOrder(order, comment) {
        await OrderRepository.unModerateOrder(order, comment);
    },

    setPerformer(order, performerId) {
        order.performerId = performerId;
        order.status = OrderStatus.STATUS_IN_PROGRESS;
        this.updateOrder(order);
        return order;
    },

    correctOrder(order) {
        order.status = OrderStatus.STATUS_MODERATED;
        this.updateOrder(order);
        return order
    },

    async unCorrectOrder(order, comment) {
        console.log('blet')
        await OrderRepository.unCorrectOrder(order, comment);
    },
}
