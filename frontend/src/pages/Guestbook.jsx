import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';
import api from '../api/axios';

function Guestbook() {
  const [posts, setPosts] = useState([]);
  const [message, setMessage] = useState('');
  const [errors, setErrors] = useState('');
  const navigate = useNavigate();

  // Controlla se l'utente è autenticato
  useEffect(() => {
    api.get('/api/user')
      .then(() => {
        // Autenticato, carica i post
        loadPosts();
      })
      .catch(() => {
        navigate('/'); // Reindirizza al login
      });
  }, []);

  const loadPosts = () => {
    api.get('/api/posts')
      .then(res => setPosts(res.data))
      .catch(() => setErrors('Errore nel caricamento dei messaggi.'));
  };

  const handleSubmit = async e => {
    e.preventDefault();
    try {
      await api.post('/api/posts', { message });
      loadPosts();
      setMessage('');
    } catch (err) {
      setErrors("Errore durante l'invio del messaggio.");
    }
  };

  return (
    <div className="p-6 max-w-3xl mx-auto">
      <h1 className="text-2xl font-bold mb-4">Guestbook</h1>
      {errors && <p className="text-red-600 mb-4">{errors}</p>}
      
      <form onSubmit={handleSubmit} className="mb-6">
        <textarea
          value={message}
          onChange={e => setMessage(e.target.value)}
          required
          placeholder="Scrivi un messaggio..."
          className="w-full border rounded p-3 mb-2"
        />
        <button
          type="submit"
          className="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded"
        >
          Invia
        </button>
      </form>

      <ul className="space-y-4">
        {posts.map(post => (
          <li key={post.id} className="border rounded p-4 bg-white shadow">
            <p><strong>{post.user?.name || 'Utente'}:</strong></p>
            <p>{post.message}</p>
            <p className="text-gray-500 text-sm">
              {new Date(post.created_at).toLocaleString()}
            </p>
          </li>
        ))}
      </ul>
    </div>
  );
}

export default Guestbook;
