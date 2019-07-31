import OrderRepository from '../Repository/OrderRepository.js';

export default {
    async getOrdersByStatus(orderStatus) {
        return (await OrderRepository.getOrdersByStatus(orderStatus)).data;
    },

    async getOrderInformationById(orderId) {
        return (await OrderRepository.getOrderInformationById(orderId)).data;
    },

    async updateOrder(order) {
        return (await OrderRepository.updateOrder(order)).data;
    }
}
