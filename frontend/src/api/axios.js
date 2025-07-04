import axios from 'axios';

const api = axios.create({
  // Importante: non includere "api/" qui per poter chiamare correttamente il CSRF cookie
  baseURL: 'http://127.0.0.1:8000/',
  withCredentials: true,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
});

export default api;
