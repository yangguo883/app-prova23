import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000', // Utilizza sempre "localhost" per la coerenza
  withCredentials: true,            // Mantiene eventuali cookie (utile per la sessione)
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
});

export default api;
