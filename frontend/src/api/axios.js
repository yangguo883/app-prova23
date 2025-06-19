import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000', // Assicurati che l'hostname sia "localhost" per far corrispondere i cookie
  withCredentials: true,            // Importante per inviare e ricevere i cookie (incluso XSRF-TOKEN)
  headers: {
    'Content-Type': 'application/json', 
    'Accept': 'application/json'
  },
  xsrfCookieName: 'XSRF-TOKEN',       // Nome del cookie impostato da Laravel Sanctum
  xsrfHeaderName: 'X-XSRF-TOKEN'        // Nome dell'header che Axios invierà (lettura automatica dal cookie)
});

export default api;
