// src/pages/User.jsx
import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';

function User() {
  const [users, setUsers] = useState([]);
  const [loading, setLoading] = useState(true);
  const navigate = useNavigate();

  useEffect(() => {
    const fetchUsers = async () => {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/users');
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

        const data = await response.json();
        setUsers(Array.isArray(data) ? data : data.users);

        setLoading(false);
      } catch (err) {
        console.error('Gagal mengambil data user:', err);
        setLoading(false);
      }
    };

    fetchUsers();
  }, []);

  if (loading) {
    return (
      <div style={{ textAlign: 'center', padding: '3rem', fontSize: '1.2rem' }}>
        🍹 Memuat daftar user...
      </div>
    );
  }

  return (
    <div style={{
      fontFamily: 'Arial, sans-serif',
      backgroundColor: '#f9f9f9',
      minHeight: '100vh',
      display: 'flex'
    }}>

      {/* Sidebar */}
      <div style={{
        width: '250px',
        backgroundColor: '#ffffff',
        boxShadow: '2px 0 10px rgba(231, 76, 60, 0.15)',
        height: '100vh',
        position: 'fixed',
        left: 0,
        top: 0,

      }}>
        <div style={{
          padding: '1rem',
          borderBottom: '1px solid #f7d1d1',
          display: 'flex',
          alignItems: 'center',
          gap: '0.5rem'
        }}>
          {/* <span style={{ fontSize: '1.3rem', color: '#e74c3c' }}>🍹</span> */}
          <h3 style={{ margin: 0, color: '#e74c3c' }}>Admin Ajussi Juice</h3>
        </div>

        <nav style={{ padding: '1rem 0' }}>
          <a href="/dashboard" style={linkStyle}>Dashboard</a>
          <a href="/produk" style={linkStyle}>Produk</a>
          <a href="/pesanan" style={linkStyle}>Pesanan</a>
          <a href="/user" style={{
            ...linkStyle,
            fontWeight: 'bold',
            color: '#000',
            backgroundColor: '#f9f9f9'
          }}>User</a>
        </nav>
      </div>

      {/* Main Content */}
      <div style={{
        marginLeft: '250px',
        width: 'calc(100% - 250px)',
        padding: '2rem'
      }}>

        <h1 style={{ color: '#e74c3c', fontSize: '1.8rem', marginBottom: '1.5rem' }}>
          Daftar User
        </h1>

        <div style={{
          backgroundColor: 'white',
          borderRadius: '12px',
          boxShadow: '0 2px 12px rgba(231, 76, 60, 0.15)',
          overflowX: 'auto',
          borderLeft: '5px solid #e74c3c'
        }}>
          <table style={{
            width: '100%',
            borderCollapse: 'collapse',
            fontSize: '0.95rem'
          }}>
            <thead>
              <tr style={{
                backgroundColor: '#ffe0e0',
                textAlign: 'left',
                color: '#c0392b'
              }}>
                <th style={thStyle}>ID</th>
                <th style={thStyle}>Nama</th>
                <th style={thStyle}>Email</th>
                <th style={thStyle}>Role</th>
              </tr>
            </thead>
            <tbody>
              {users.map((user) => (
                <tr
                  key={user.id}
                  style={{
                    borderBottom: '1px solid #f2bcbc',
                    backgroundColor: '#fff',
                    transition: '0.2s'
                  }}
                  onMouseEnter={(e) => e.currentTarget.style.backgroundColor = '#fff5f5'}
                  onMouseLeave={(e) => e.currentTarget.style.backgroundColor = '#fff'}
                >
                  <td style={tdStyle}>{user.id}</td>
                  <td style={tdStyle}>{user.nama ?? "-"}</td>
                  <td style={tdStyle}>{user.email}</td>
                  <td style={tdStyle}>{user.role ?? "user"}</td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>

        <footer style={{
          textAlign: 'center',
          padding: '1rem',
          borderTop: '1px solid #eee',
          color: '#777',
          fontSize: '0.8rem',
          marginTop: '2rem'
        }}>
          © {new Date().getFullYear()} Ajussi Juice — UMKM Lokal Indonesia
        </footer>
      </div>
    </div>
  );
}

const linkStyle = {
  display: 'block',
  padding: '0.75rem 1.5rem',
  color: '#444',
  textDecoration: 'none',
  transition: '0.2s',
};

const thStyle = {
  padding: '0.9rem 1rem',
  borderBottom: '2px solid #f8b4b4',
};

const tdStyle = {
  padding: '0.8rem 1rem',
};

export default User;
