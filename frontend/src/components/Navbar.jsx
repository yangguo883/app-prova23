import React from 'react';
import api from '../api/axios';
import { useNavigate } from 'react-router-dom';

function Navbar({ user }) {
  const navigate = useNavigate();

  const handleLogout = async () => {
    await api.post('/api/logout');
    navigate('/login');
  };

  return (
    <div className="bg-white shadow p-4 flex justify-between">
      <div>Ciao, {user.name}</div>
      <button onClick={handleLogout} className="text-red-600 font-semibold hover:underline">
        Logout
      </button>
    </div>
  );
}

export default Navbar;
