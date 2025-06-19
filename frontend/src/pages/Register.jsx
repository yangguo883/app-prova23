import React, { useState } from 'react';
import api from '../api/axios';

const Register = () => {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  });
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);

  const handleChange = (e) => {
    setFormData({ 
      ...formData, 
      [e.target.name]: e.target.value 
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');
    setLoading(true);

    try {
      // "users/register" sarà concatenato al baseURL, risultando in
      // http://localhost:8000/api/users/register
      const response = await api.post('users/register', formData);
      console.log('Registrazione completata:', response.data);
      // Qui potresti gestire redirezioni o notifiche di successo
    } catch (err) {
      console.error('Errore durante la registrazione:', err);
      setError(err.response?.data?.message || 'Errore durante la registrazione.');
    }

    setLoading(false);
  };

  return (
    <div className="max-w-md mx-auto p-6">
      <h2 className="text-2xl font-bold mb-4">Registrazione</h2>
      {error && <p className="text-red-600 mb-4">{error}</p>}
      <form onSubmit={handleSubmit}>
        <div className="mb-4">
          <label htmlFor="name" className="block mb-1">Nome:</label>
          <input
            type="text"
            id="name"
            name="name"
            className="w-full p-2 border rounded"
            value={formData.name}
            onChange={handleChange}
            required
          />
        </div>
        <div className="mb-4">
          <label htmlFor="email" className="block mb-1">Email:</label>
          <input
            type="email"
            id="email"
            name="email"
            className="w-full p-2 border rounded"
            value={formData.email}
            onChange={handleChange}
            required
          />
        </div>
        <div className="mb-4">
          <label htmlFor="password" className="block mb-1">Password:</label>
          <input
            type="password"
            id="password"
            name="password"
            className="w-full p-2 border rounded"
            value={formData.password}
            onChange={handleChange}
            required
          />
        </div>
        <div className="mb-4">
          <label htmlFor="password_confirmation" className="block mb-1">Conferma Password:</label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            className="w-full p-2 border rounded"
            value={formData.password_confirmation}
            onChange={handleChange}
            required
          />
        </div>
        <button
          type="submit"
          disabled={loading}
          className="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 disabled:opacity-50"
        >
          {loading ? 'Registrazione in corso...' : 'Registrati'}
        </button>
      </form>
    </div>
  );
};

export default Register;

