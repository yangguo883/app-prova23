import axios from 'axios';

// Permette di usare i cookie per l'autenticazione
axios.defaults.withCredentials = true;

// Imposta l'URL base dell'API
axios.defaults.baseURL = 'http://localhost:8000';

// Recupera il token CSRF
async function fetchCsrfToken() {
  await axios.get('/sanctum/csrf-cookie');
}

// Recupera i post (solo se sei autenticato)
export async function fetchPosts() {
  await fetchCsrfToken();

  try {
    const response = await axios.get('/api/posts');
    console.log('POSTS:', response.data);
    return response.data;
  } catch (error) {
    console.error('Errore nel recupero dei post:', error.response?.data || error.message);
    throw error;
  }
}

// Invia un nuovo messaggio (autenticato)
export async function sendMessage(message) {
  await fetchCsrfToken();

  try {
    const response = await axios.post('/api/posts', { message });
    console.log('Messaggio inviato:', response.data);
    return response.data;
  } catch (error) {
    console.error('Errore durante l\'invio:', error.response?.data || error.message);
    throw error;
  }
}
