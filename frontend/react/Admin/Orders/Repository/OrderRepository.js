import axios from 'axios/index'

export default {
    getOrdersByStatus(orderStatus) {
        return axios.get(`/api/admin/orders/status/${orderStatus}`, {});
    }
}
