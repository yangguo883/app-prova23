import React, { useState, useEffect } from 'react';
import api from '../api/axios';

const GuestBook = () => {
  const [messages, setMessages] = useState([]);
  const [newMessage, setNewMessage] = useState('');
  const [error, setError] = useState('');
  const token = localStorage.getItem('token');

  useEffect(() => {
    const fetchMessages = async () => {
      try {
        // Chiamata all'endpoint dei messaggi (usando "api/" come prefisso)
        const res = await api.get('api/messages', {
          headers: { Authorization: `Bearer ${token}` },
        });
        setMessages(res.data);
      } catch (err) {
        console.error('Error fetching messages:', err);
        setError('Impossibile recuperare i messaggi');
      }
    };
    fetchMessages();
  }, [token]);

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError('');
    try {
      const res = await api.post(
        'api/messages',
        { message: newMessage },
        { headers: { Authorization: `Bearer ${token}` } }
      );
      setMessages([res.data.data, ...messages]);
      setNewMessage('');
    } catch (err) {
      console.error('Error posting message:', err);
      setError('Errore nel pubblicare il messaggio');
    }
  };

  return (
    <div className="flex flex-col items-center min-h-screen bg-gray-100 py-8">
      <div className="w-full max-w-4xl bg-white rounded-lg shadow-lg p-8">
        <h2 className="text-3xl font-bold text-center text-gray-800 mb-6">Guest Book</h2>
        {error && <div className="mb-4 text-center text-red-500">{error}</div>}
        <form onSubmit={handleSubmit} className="mb-8">
          <textarea
            placeholder="Scrivi il tuo messaggio..."
            required
            value={newMessage}
            onChange={(e) => setNewMessage(e.target.value)}
            className="w-full border border-gray-300 rounded p-4 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
          ></textarea>
          <button type="submit" className="mt-4 w-full bg-blue-600 text-white py-3 rounded hover:bg-blue-700 transition">
            Posta il Messaggio
          </button>
        </form>
        <div className="grid grid-cols-1 gap-6 sm:grid-cols-2">
          {messages.map((msg) => (
            <div key={msg.id} className="p-4 border border-gray-200 rounded shadow-sm hover:shadow-md transition">
              <div className="flex justify-between items-center mb-2">
                <h3 className="font-semibold text-gray-700">{msg.user ? msg.user.name : 'Anonimo'}</h3>
                <span className="text-xs text-gray-500">{new Date(msg.created_at).toLocaleString()}</span>
              </div>
              <p className="text-gray-800">{msg.message}</p>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default GuestBook;
