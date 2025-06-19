import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api/', // Assicurati di terminare con la barra
  withCredentials: true,                // Abilita se usi cookie/sessions (altrimenti puoi rimuoverlo)
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
});

export default api;
