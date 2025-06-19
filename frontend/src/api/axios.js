import axios from 'axios';

const api = axios.create({
  baseURL: 'http://127.0.0.1:8000/api/', // Usa 127.0.0.1 per evitare problemi di risoluzione con "localhost"
  withCredentials: true,                // Abilita se usi cookie o sessioni; altrimenti puoi ometterlo
  headers: {
    'Content-Type': 'application/json',
    'Accept': 'application/json'
  },
});

export default api;
