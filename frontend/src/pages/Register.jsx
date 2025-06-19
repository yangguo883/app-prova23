import React, { useState, useEffect } from 'react';
import api from '../api/axios';  // Assicurati di importare la configurazione Axios creata

const Register = () => {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  });
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);

  useEffect(() => {
    // Pre-carica il cookie CSRF
    const fetchCsrf = async () => {
      try {
        await api.get('/sanctum/csrf-cookie');
        console.log("CSRF cookie ottenuto");
      } catch (err) {
        console.error("Errore nell'ottenere il CSRF cookie:", err);
      }
    };

    fetchCsrf();
  }, []);

  const handleChange = (e) => {
    setFormData({
      ...formData,
      [e.target.name]: e.target.value,
    });
  };

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');
    setLoading(true);

    try {
      // Rinnova il cookie CSRF (opzionale se già impostato in useEffect)
      await api.get('/sanctum/csrf-cookie');

      // Invia la richiesta di registrazione al backend
      const response = await api.post('/register', formData);
      console.log("Registrazione completata:", response.data);
    } catch (err) {
      console.error("Errore durante la registrazione:", err);
      setError(
        err.response && err.response.data && err.response.data.message
          ? err.response.data.message
          : "Errore durante la registrazione."
      );
    }

    setLoading(false);
  };

  return (
    <div style={{ maxWidth: '400px', margin: 'auto', padding: '20px' }}>
      <h2>Registrazione</h2>
      {error && <p style={{ color: 'red' }}>{error}</p>}
      <form onSubmit={handleSubmit}>
        <div style={{ marginBottom: '1rem' }}>
          <label htmlFor="name">Nome:</label>
          <input
            type="text"
            id="name"
            name="name"
            value={formData.name}
            onChange={handleChange}
            required
            style={{ width: '100%', padding: '8px', marginTop: '4px' }}
          />
        </div>
        <div style={{ marginBottom: '1rem' }}>
          <label htmlFor="email">Email:</label>
          <input
            type="email"
            id="email"
            name="email"
            value={formData.email}
            onChange={handleChange}
            required
            style={{ width: '100%', padding: '8px', marginTop: '4px' }}
          />
        </div>
        <div style={{ marginBottom: '1rem' }}>
          <label htmlFor="password">Password:</label>
          <input
            type="password"
            id="password"
            name="password"
            value={formData.password}
            onChange={handleChange}
            required
            style={{ width: '100%', padding: '8px', marginTop: '4px' }}
          />
        </div>
        <div style={{ marginBottom: '1rem' }}>
          <label htmlFor="password_confirmation">Conferma Password:</label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            value={formData.password_confirmation}
            onChange={handleChange}
            required
            style={{ width: '100%', padding: '8px', marginTop: '4px' }}
          />
        </div>
        <button type="submit" disabled={loading} style={{ padding: '10px 15px', cursor: loading ? 'not-allowed' : 'pointer' }}>
          {loading ? 'Registrazione in corso...' : 'Registrati'}
        </button>
      </form>
    </div>
  );
};

export default Register;
