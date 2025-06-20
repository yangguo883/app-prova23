import React from 'react';
import { BrowserRouter as Router, Routes, Route, Navigate, NavLink } from 'react-router-dom';
import Register from './pages/Register';
import Login from './pages/Login';
import GuestBook from './pages/GuestBook';

function App() {
  return (
    <Router>
      <div className="min-h-screen flex flex-col">
        {/* Header */}
        <header className="bg-white shadow-md">
          <div className="container mx-auto px-6 py-4 flex justify-between items-center">
            <div className="text-2xl font-bold text-gray-800">MyGuestBook</div>
            <nav className="space-x-6">
              <NavLink to="/register" className="text-gray-600 hover:text-blue-600">Register</NavLink>
              <NavLink to="/login" className="text-gray-600 hover:text-blue-600">Login</NavLink>
              <NavLink to="/guestbook" className="text-gray-600 hover:text-blue-600">Guest Book</NavLink>
            </nav>
          </div>
        </header>

        {/* Main Content */}
        <main className="flex-grow container mx-auto px-6 py-10">
          <Routes>
            {/* Redirect dalla root a /login se non ci sono route */}
            <Route path="/" element={<Navigate to="/login" replace />} />
            <Route path="/register" element={<Register />} />
            <Route path="/login" element={<Login />} />
            <Route path="/guestbook" element={<GuestBook />} />
          </Routes>
        </main>

        {/* Footer */}
        <footer className="bg-gray-200">
          <div className="container mx-auto px-6 py-4 text-center text-gray-600 text-sm">
            © {new Date().getFullYear()} MyGuestBook. All rights reserved.
          </div>
        </footer>
      </div>
    </Router>
  );
}

export default App;

