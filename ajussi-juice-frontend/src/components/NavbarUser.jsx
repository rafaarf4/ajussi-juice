// src/components/NavbarUser.jsx
import { Link, useNavigate } from 'react-router-dom';
import { useState, useEffect } from 'react';

export default function NavbarUser() {
  const navigate = useNavigate();
  const [isUserLoggedIn, setIsUserLoggedIn] = useState(false);

  useEffect(() => {
    const user = localStorage.getItem('user');
    if (user) setIsUserLoggedIn(true);
  }, []);

  const handleLogout = () => {
    localStorage.removeItem('user');
    setIsUserLoggedIn(false);
    navigate('/');
  };

  return (
    <nav style={{ backgroundColor: '#e74c3c', padding: '1rem 2rem', display: 'flex', justifyContent: 'space-between', alignItems: 'center' }}>
      <div style={{ display: 'flex', gap: '1.5rem' }}>
        <Link to="/" style={{ color: 'white', fontWeight: 'bold', fontSize: '1.2rem', textDecoration: 'none' }}>Home</Link>
        <Link to="/keranjang" style={{ color: 'white', textDecoration: 'none' }}>Keranjang</Link>
        <Link to="/pesanan-user" style={{ color: 'white', textDecoration: 'none' }}>Pesanan</Link>
        <Link to="/payment" style={{ color: 'white', textDecoration: 'none' }}>Payment</Link>
      </div>

      <div>
        {!isUserLoggedIn ? (
          <Link to="/login" style={{ backgroundColor: 'white', color: '#e74c3c', padding: '0.5rem 1rem', borderRadius: '20px', fontWeight: 'bold', textDecoration: 'none' }}>Login</Link>
        ) : (
          <button onClick={handleLogout} style={{ backgroundColor: 'white', color: '#e74c3c', padding: '0.5rem 1rem', borderRadius: '20px', fontWeight: 'bold', cursor: 'pointer' }}>Logout</button>
        )}
      </div>
    </nav>
  );
}
