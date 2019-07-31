import UserRepository from '../Repository/UserRepository';

export default {
    async getPerformers() {
        return (await UserRepository.getPerformers()).data;
    }
}