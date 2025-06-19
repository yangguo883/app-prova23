// 📁 src/App.jsx
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Login from './pages/Login';
import Register from './pages/Register';
import Guestbook from './pages/Guestbook';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Login />} />
        <Route path="/register" element={<Register />} />
        <Route path="/guestbook" element={<Guestbook />} />
      </Routes>
    </Router>
  );
}

export default App;
