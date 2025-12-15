import { useLocation, Link } from 'react-router-dom';

function SidebarAdmin() {
  const location = useLocation();

  const isActive = (path) => {
    return location.pathname === path;
  };

  return (
    <div style={{
      width: '250px',
      backgroundColor: 'white',
      boxShadow: '0 2px 8px rgba(0,0,0,0.1)',
      height: '100vh',
      position: 'fixed',
      left: 0,
      top: 0,
      overflowY: 'auto'
    }}>
      <div style={{
        padding: '1rem',
        borderBottom: '1px solid #eee',
        display: 'flex',
        alignItems: 'center',
        gap: '0.5rem'
      }}>
        <h3 style={{ margin: 0, color: '#e74c3c' }}>Admin Ajussi Juice</h3>
      </div>

      <nav style={{ padding: '1rem 0' }}>
        <Link
          to="/dashboard"
          style={{
            display: 'block',
            padding: '0.75rem 1.5rem',
            color: '#333',
            textDecoration: 'none',
            backgroundColor: isActive('/dashboard') ? '#f0f0f0' : 'transparent',
            fontWeight: isActive('/dashboard') ? 'bold' : 'normal',
            marginBottom: '0.5rem'
          }}
        >
          Dashboard
        </Link>

        <Link
          to="/produk"
          style={{
            display: 'block',
            padding: '0.75rem 1.5rem',
            color: '#333',
            textDecoration: 'none',
            backgroundColor: isActive('/produk') ? '#f0f0f0' : 'transparent',
            fontWeight: isActive('/produk') ? 'bold' : 'normal',
            marginBottom: '0.5rem'
          }}
        >
          Produk
        </Link>

        <Link
          to="/pesanan"
          style={{
            display: 'block',
            padding: '0.75rem 1.5rem',
            color: '#333',
            textDecoration: 'none',
            backgroundColor: isActive('/pesanan') ? '#f0f0f0' : 'transparent',
            fontWeight: isActive('/pesanan') ? 'bold' : 'normal',
            marginBottom: '0.5rem'
          }}
        >
          Pesanan
        </Link>

        <Link
          to="/user"
          style={{
            display: 'block',
            padding: '0.75rem 1.5rem',
            color: '#333',
            textDecoration: 'none',
            backgroundColor: isActive('/user') ? '#f0f0f0' : 'transparent',
            fontWeight: isActive('/user') ? 'bold' : 'normal',
            marginBottom: '0.5rem'
          }}
        >
          User
        </Link>
      </nav>
    </div>
  );
}

export default SidebarAdmin;