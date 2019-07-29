import OrderRepository from '../Repository/OrderRepository.js';

export default {
    getOrdersByStatus(orderStatus) {
        return OrderRepository.getOrdersByStatus(orderStatus);
    }
}