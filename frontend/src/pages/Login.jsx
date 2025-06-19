import { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

function Login() {
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');
  const [errors, setErrors] = useState(null);
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    try {
      await axios.get('http://localhost:8000/sanctum/csrf-cookie', { withCredentials: true });
      await axios.post('http://localhost:8000/login', { email, password }, { withCredentials: true });
      navigate('/guestbook');
    } catch (err) {
      setErrors('Credenziali non valide');
    }
  };

  return (
    <div className="bg-gray-100 min-h-screen flex items-center justify-center p-4">
      <div className="bg-white rounded-lg shadow-lg max-w-md w-full p-8">
        <h2 className="text-3xl font-extrabold text-center mb-6 text-gray-900">Login</h2>
        {errors && <div className="mb-4 text-red-600">{errors}</div>}
        <form onSubmit={handleSubmit} className="space-y-5">
          <div>
            <label className="block mb-1 font-semibold">Email</label>
            <input
              type="email"
              required
              value={email}
              onChange={e => setEmail(e.target.value)}
              className="w-full border p-3 rounded"
            />
          </div>
          <div>
            <label className="block mb-1 font-semibold">Password</label>
            <input
              type="password"
              required
              value={password}
              onChange={e => setPassword(e.target.value)}
              className="w-full border p-3 rounded"
            />
          </div>
          <button type="submit" className="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded">
            Accedi
          </button>
        </form>
        <div className="mt-4 text-center">
          <a href="/register" className="text-green-600 hover:underline">Non hai un account? Registrati</a>
        </div>
      </div>
    </div>
  );
}

export default Login;
