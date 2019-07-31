import axios from 'axios/index'

export default {
    getPerformers() {
        return axios.get(`/api/admin/users/performer`, {});
    }
}
