import React, { useState } from 'react';
import axios from 'axios';
import { useNavigate } from 'react-router-dom';

function Register() {
  const [formData, setFormData] = useState({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  });
  const [errors, setErrors] = useState({});
  const navigate = useNavigate();

  const handleChange = e => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
  };

  const handleSubmit = async e => {
    e.preventDefault();
    try {
      await axios.get('http://localhost:8000/sanctum/csrf-cookie', { withCredentials: true });
      await axios.post('http://localhost:8000/register', formData, { withCredentials: true });
      navigate('/guestbook');
    } catch (err) {
      setErrors(err.response?.data?.errors || { general: 'Errore durante la registrazione' });
    }
  };

  return (
    <div className="bg-gray-100 min-h-screen flex items-center justify-center p-4">
      <div className="bg-white rounded-lg shadow-lg max-w-md w-full p-8">
        <h2 className="text-3xl font-extrabold text-center mb-6 text-gray-900">Registrati</h2>
        {errors.general && <div className="mb-4 text-red-600">{errors.general}</div>}
        <form onSubmit={handleSubmit} className="space-y-5">
          <div>
            <label className="block mb-1 font-semibold">Nome</label>
            <input
              name="name"
              type="text"
              value={formData.name}
              onChange={handleChange}
              required
              className="w-full border p-3 rounded"
            />
          </div>
          <div>
            <label className="block mb-1 font-semibold">Email</label>
            <input
              name="email"
              type="email"
              value={formData.email}
              onChange={handleChange}
              required
              className="w-full border p-3 rounded"
            />
          </div>
          <div>
            <label className="block mb-1 font-semibold">Password</label>
            <input
              name="password"
              type="password"
              value={formData.password}
              onChange={handleChange}
              required
              className="w-full border p-3 rounded"
            />
          </div>
          <div>
            <label className="block mb-1 font-semibold">Conferma Password</label>
            <input
              name="password_confirmation"
              type="password"
              value={formData.password_confirmation}
              onChange={handleChange}
              required
              className="w-full border p-3 rounded"
            />
          </div>
          <button type="submit" className="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded">
            Registrati
          </button>
        </form>
        <div className="mt-4 text-center">
          <a href="/" className="text-green-600 hover:underline">Hai già un account? Accedi</a>
        </div>
      </div>
    </div>
  );
}

export default Register;
