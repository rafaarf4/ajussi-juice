// src/pages/Login.jsx
import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';

function Login() {
  const [formData, setFormData] = useState({
    email: '',
    password: ''
  });
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();

  // 🔥 Text Writer
  const [titleText, setTitleText] = useState('');
  const fullTitle = "Login Ajussi Juice";
  
  useEffect(() => {
    let i = 0;
    const interval = setInterval(() => {
      setTitleText(fullTitle.slice(0, i));
      i++;
      if (i > fullTitle.length) clearInterval(interval);
    }, 80);
    return () => clearInterval(interval);
  }, []);

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

    const API_URL = import.meta.env.VITE_API_URL;

    try {
      const response = await fetch(`${API_URL}/api/login`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData),
      });

      const data = await response.json();

      if (!response.ok) {
        throw new Error(data.message || 'Login gagal');
      }

      localStorage.setItem('user', JSON.stringify(data.user));

      if (data.user.role === 'admin') navigate('/dashboard');
      else navigate('/');
    } catch (err) {
      setError(err.message);
    } finally {
      setLoading(false);
    }
  };

  return (
    <div style={{
      display: 'flex',
      justifyContent: 'center',
      alignItems: 'center',
      minHeight: '100vh',
      backgroundColor: '#fff4f4',
      padding: '2rem'
    }}>
      <div style={{
        backgroundColor: 'white',
        padding: '3rem',
        borderRadius: '16px',
        boxShadow: '0 6px 25px rgba(255, 0, 0, 0.15)',
        width: '100%',
        maxWidth: '420px',
        border: '1px solid #ffdbdb'
      }}>
        
        {/* Judul dengan Text Writer */}
        <h2 style={{
          color: '#e63946',
          fontSize: '1.8rem',
          marginBottom: '1.5rem',
          textAlign: 'center',
          letterSpacing: '1px',
          minHeight: '32px'
        }}>
          {titleText}
        </h2>

        {error && (
          <div style={{
            backgroundColor: '#ffe3e3',
            color: '#c92a2a',
            padding: '0.8rem',
            borderRadius: '10px',
            marginBottom: '1rem',
            textAlign: 'center',
            fontWeight: '500',
            border: '1px solid #ffc9c9'
          }}>
            {error}
          </div>
        )}

        <form onSubmit={handleSubmit}>
          {/* Email */}
          <div style={{ marginBottom: '1rem' }}>
            <label style={{
              display: 'block',
              marginBottom: '0.4rem',
              fontWeight: '600',
              color: '#b80000'
            }}>
              Email
            </label>
            <input
              type="email"
              name="email"
              value={formData.email}
              onChange={handleChange}
              required
              placeholder="user@gmail.com"
              style={{
                width: '100%',
                padding: '0.8rem',
                borderRadius: '10px',
                border: '1px solid #ffb3b3',
                fontSize: '1rem',
                transition: '0.2s',
              }}
              onFocus={(e) => e.target.style.border = '1px solid #ff4d4d'}
            />
          </div>

          {/* Password */}
          <div style={{ marginBottom: '1.5rem' }}>
            <label style={{
              display: 'block',
              marginBottom: '0.4rem',
              fontWeight: '600',
              color: '#b80000'
            }}>
              Password
            </label>
            <input
              type="password"
              name="password"
              value={formData.password}
              onChange={handleChange}
              required
              placeholder="••••••"
              style={{
                width: '100%',
                padding: '0.8rem',
                borderRadius: '10px',
                border: '1px solid #ffb3b3',
                fontSize: '1rem',
                transition: '0.2s',
              }}
              onFocus={(e) => e.target.style.border = '1px solid #ff4d4d'}
            />
          </div>

          {/* Tombol Login */}
          <button
            type="submit"
            disabled={loading}
            style={{
              width: '100%',
              padding: '0.85rem',
              backgroundColor: '#e63946',
              color: 'white',
              border: 'none',
              borderRadius: '10px',
              fontWeight: 'bold',
              cursor: 'pointer',
              fontSize: '1.1rem',
              letterSpacing: '0.5px',
              transition: '0.2s',
              opacity: loading ? 0.7 : 1
            }}
            onMouseEnter={(e) => e.target.style.backgroundColor = '#d00017'}
            onMouseLeave={(e) => e.target.style.backgroundColor = '#e63946'}
          >
            {loading ? 'Memproses...' : 'Login'}
          </button>
        </form>
      </div>
    </div>
  );
}

export default Login;
