import axios from 'axios/index'

export default {
    getOrdersByStatus(orderStatus) {
        return axios.get(`/api/admin/orders/status/${orderStatus}`, {});
    },

    getOrderInformationById(orderId) {
        return axios.get(`/api/admin/orders/${orderId}`, {});
    },

    updateOrder(order) {
        return axios.put(`/api/admin/orders/${ order.id }`, order);
    },

    unModerateOrder(order, comment) {
        return axios.post(`/api/admin/orders/${ order.id }/unmoderate`, {
            comment: comment
        });
    },
    unCorrectOrder(order, comment) {
        return axios.post(`/api/admin/orders/${ order.id }/uncorrect`, {
            comment: comment
        });
    }
}
