// src/pages/Register.jsx
import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';

function Register() {
  const [formData, setFormData] = useState({
    nama: '',
    email: '',
    password: '',
    password_confirmation: ''
  });
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState('');
  const [titleText, setTitleText] = useState('');
  const fullTitle = "Daftar Akun Ajussi Juice";

  const navigate = useNavigate();

  // 🔠 Efek Text Writer
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
      const response = await fetch(`${API_URL}/api/register`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData),
      });

      const result = await response.json();

      if (!response.ok) {
        const errorMsg =
          result.message ||
          (result.errors && Object.values(result.errors).flat()[0]) ||
          'Gagal mendaftar.';
        throw new Error(errorMsg);
      }

      localStorage.setItem('user', JSON.stringify(result.user));
      alert('✅ Pendaftaran berhasil!');
      navigate('/login');
    } catch (err) {
      setError(err.message);
    } finally {
      setLoading(false);
    }
  };

  return (
    <div
      style={{
        fontFamily: 'Arial, sans-serif',
        backgroundColor: '#fff4f4',
        minHeight: '100vh',
        display: 'flex',
        justifyContent: 'center',
        alignItems: 'center',
        padding: '2rem'
      }}
    >
      <div
        style={{
          backgroundColor: 'white',
          padding: '3rem',
          borderRadius: '16px',
          boxShadow: '0 6px 25px rgba(255, 0, 0, 0.15)',
          width: '100%',
          maxWidth: '480px',
          border: '1px solid #ffd6d6'
        }}
      >
        {/* Text Writer Title */}
        <h2
          style={{
            color: '#e63946',
            textAlign: 'center',
            fontSize: '1.8rem',
            marginBottom: '1.5rem',
            letterSpacing: '1px',
            minHeight: '32px'
          }}
        >
          {titleText}
        </h2>

        {error && (
          <div
            style={{
              backgroundColor: '#ffe3e3',
              color: '#c92a2a',
              padding: '0.8rem',
              borderRadius: '10px',
              marginBottom: '1rem',
              textAlign: 'center',
              fontWeight: '500',
              border: '1px solid #ffc9c9'
            }}
          >
            {error}
          </div>
        )}

        <form onSubmit={handleSubmit}>
          <div style={{ marginBottom: '1rem' }}>
            <label
              style={{
                display: 'block',
                marginBottom: '0.4rem',
                fontWeight: '600',
                color: '#b80000'
              }}
            >
              Nama Lengkap
            </label>
            <input
              type="text"
              name="nama"
              value={formData.nama}
              onChange={handleChange}
              required
              style={{
                width: '100%',
                padding: '0.8rem',
                borderRadius: '10px',
                border: '1px solid #ffb3b3',
                fontSize: '1rem',
                transition: '0.2s'
              }}
              onFocus={(e) => (e.target.style.border = '1px solid #ff4d4d')}
            />
          </div>

          <div style={{ marginBottom: '1rem' }}>
            <label
              style={{
                display: 'block',
                marginBottom: '0.4rem',
                fontWeight: '600',
                color: '#b80000'
              }}
            >
              Email
            </label>
            <input
              type="email"
              name="email"
              value={formData.email}
              onChange={handleChange}
              required
              style={{
                width: '100%',
                padding: '0.8rem',
                borderRadius: '10px',
                border: '1px solid #ffb3b3',
                fontSize: '1rem'
              }}
              onFocus={(e) => (e.target.style.border = '1px solid #ff4d4d')}
            />
          </div>

          <div style={{ marginBottom: '1rem' }}>
            <label
              style={{
                display: 'block',
                marginBottom: '0.4rem',
                fontWeight: '600',
                color: '#b80000'
              }}
            >
              Password
            </label>
            <input
              type="password"
              name="password"
              value={formData.password}
              onChange={handleChange}
              required
              minLength="8"
              style={{
                width: '100%',
                padding: '0.8rem',
                borderRadius: '10px',
                border: '1px solid #ffb3b3',
                fontSize: '1rem'
              }}
              onFocus={(e) => (e.target.style.border = '1px solid #ff4d4d')}
            />
          </div>

          <div style={{ marginBottom: '1.5rem' }}>
            <label
              style={{
                display: 'block',
                marginBottom: '0.4rem',
                fontWeight: '600',
                color: '#b80000'
              }}
            >
              Konfirmasi Password
            </label>
            <input
              type="password"
              name="password_confirmation"
              value={formData.password_confirmation}
              onChange={handleChange}
              required
              minLength="8"
              style={{
                width: '100%',
                padding: '0.8rem',
                borderRadius: '10px',
                border: '1px solid #ffb3b3',
                fontSize: '1rem'
              }}
              onFocus={(e) => (e.target.style.border = '1px solid #ff4d4d')}
            />
          </div>

          <button
            type="submit"
            disabled={loading}
            style={{
              width: '100%',
              padding: '0.9rem',
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
            onMouseEnter={(e) =>
              (e.target.style.backgroundColor = '#d00017')
            }
            onMouseLeave={(e) =>
              (e.target.style.backgroundColor = '#e63946')
            }
          >
            {loading ? 'Sedang mendaftar...' : 'Daftar Sekarang'}
          </button>
        </form>
      </div>
    </div>
  );
}

export default Register;
