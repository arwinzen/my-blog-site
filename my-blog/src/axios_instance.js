import axios from 'axios';

const BASE_URL = 'http://eadd-49-124-200-218.ngrok.io'
const API_URL = `${BASE_URL}/api`

export const thumbnail_URL = `${BASE_URL}/storage`;

const instance = axios.create({
    baseURL: API_URL
});

export default instance;