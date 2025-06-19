import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000', // Assicurati che venga usato "localhost" in modo coerente
  withCredentials: true,            // Serve per mantenere eventuali cookie (es. session), anche se ora il CSRF non si applica
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
});

export default api;
