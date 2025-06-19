import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api/', // Importante terminare con la barra
  // Se non usi cookie o sessioni, puoi anche omettere withCredentials
  withCredentials: true,
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
});

export default api;
