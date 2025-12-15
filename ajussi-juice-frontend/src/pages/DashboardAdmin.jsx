import { useState, useEffect } from 'react';
import { useNavigate } from 'react-router-dom';
import SidebarAdmin from '../components/SidebarAdmin';

function DashboardAdmin() {
  const [stats, setStats] = useState({
    totalProduk: 0,
    totalPesanan: 0,
    totalUser: 0,
    pesananBelumProses: []
  });

  const [loading, setLoading] = useState(true);
  const navigate = useNavigate();

  const BASE_URL = import.meta.env.VITE_API_URL;

  useEffect(() => {
    const fetchStats = async () => {
      try {
        const produkRes = await fetch(`${BASE_URL}/api/produk`);
        const pesananRes = await fetch(`${BASE_URL}/api/pesanan`);
        const userRes = await fetch(`${BASE_URL}/api/users`);

        if (!produkRes.ok || !pesananRes.ok || !userRes.ok) {
          throw new Error('Gagal mengambil data');
        }

        const produkData = await produkRes.json();
        const pesananData = await pesananRes.json();
        const userData = await userRes.json();

        const pendingPesanan = pesananData
        .filter((p) => p.status?.toLowerCase().includes("menunggu"))
        .slice(0, 5);


        setStats({
          totalProduk: produkData.length,
          totalPesanan: pesananData.length,
          totalUser: Array.isArray(userData)
            ? userData.length
            : userData.users?.length ?? 0,
          pesananBelumProses: pendingPesanan
        });

        setLoading(false);
      } catch (err) {
        console.error('Gagal mengambil statistik:', err);
        setLoading(false);
      }
    };

    fetchStats();
  }, []);

  if (loading) {
    return (
      <div style={{ textAlign: 'center', padding: '3rem', fontSize: '1.2rem' }}>
        🍹 Memuat dashboard...
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
      <SidebarAdmin />

      {/* Main Content */}
      <div style={{
        marginLeft: '250px',
        width: 'calc(100% - 250px)',
        padding: '2rem',
      }}>

        {/* Header */}
        <div style={{
          display: 'flex',
          justifyContent: 'space-between',
          alignItems: 'center',
          marginBottom: '2rem'
        }}>
          <h1 style={{ color: '#e63946', fontSize: '1.7rem', fontWeight: 'bold' }}>
            Dashboard Admin
          </h1>
          <button
            onClick={() => {
              localStorage.removeItem('user');
              navigate('/');
            }}
            style={{
              backgroundColor: '#e63946',
              color: 'white',
              border: 'none',
              padding: '0.5rem 1rem',
              borderRadius: '10px',
              fontWeight: 'bold',
              cursor: 'pointer',
              boxShadow: '0 3px 6px rgba(230,57,70,0.25)'
            }}
          >
            Logout
          </button>
        </div>

        {/* Statistik Cards */}
        <div style={{
          display: 'grid',
          gridTemplateColumns: 'repeat(3, 1fr)',
          gap: '1.5rem',
          marginBottom: '2rem'
        }}>

          <div style={{
            backgroundColor: '#ffe3e3',
            padding: '1.5rem',
            borderRadius: '15px',
            boxShadow: '0 3px 10px rgba(230,57,70,0.15)',
            borderLeft: '8px solid #d90429',
            textAlign: 'center'
          }}>
            <h3 style={{ color: '#d90429', fontSize: '1.3rem', fontWeight: 'bold' }}>Total Produk</h3>
            <p style={{ fontSize: '2.2rem', color: '#9d0208', fontWeight: 'bold' }}>
              {stats.totalProduk}
            </p>
          </div>

          <div style={{
            backgroundColor: '#ffe3e3',
            padding: '1.5rem',
            borderRadius: '15px',
            boxShadow: '0 3px 10px rgba(230,57,70,0.15)',
            borderLeft: '8px solid #e63946',
            textAlign: 'center'
          }}>
            <h3 style={{ color: '#e63946', fontSize: '1.3rem', fontWeight: 'bold' }}>Total Pesanan</h3>
            <p style={{ fontSize: '2.2rem', color: '#ba181b', fontWeight: 'bold' }}>
              {stats.totalPesanan}
            </p>
          </div>

          <div style={{
            backgroundColor: '#ffe3e3',
            padding: '1.5rem',
            borderRadius: '15px',
            boxShadow: '0 3px 10px rgba(230,57,70,0.15)',
            borderLeft: '8px solid #9d0208',
            textAlign: 'center'
          }}>
            <h3 style={{ color: '#9d0208', fontSize: '1.3rem', fontWeight: 'bold' }}>Total User</h3>
            <p style={{ fontSize: '2.2rem', color: '#660708', fontWeight: 'bold' }}>
              {stats.totalUser}
            </p>
          </div>
        </div>

        {/* Pesanan Belum Diproses */}
        <div style={{
          backgroundColor: '#ffffff',
          padding: '1.8rem',
          borderRadius: '15px',
          boxShadow: '0 4px 12px rgba(230,57,70,0.15)',
          borderLeft: '8px solid #e63946'
        }}>
          <div style={{
            display: 'flex',
            justifyContent: 'space-between',
            alignItems: 'center',
            marginBottom: '1rem'
          }}>
            <h2 style={{ color: '#e63946', fontWeight: 'bold' }}>
              Pesanan Belum Diproses
            </h2>
            <button
              onClick={() => navigate('/pesanan')}
              style={{
                backgroundColor: '#e63946',
                color: 'white',
                border: 'none',
                padding: '0.4rem 0.8rem',
                borderRadius: '8px',
                cursor: 'pointer',
                fontSize: '0.85rem',
                boxShadow: '0 3px 6px rgba(230,57,70,0.25)'
              }}
            >
              Lihat Semua
            </button>
          </div>

          {stats.pesananBelumProses.length === 0 ? (
            <p style={{ color: '#777', textAlign: 'center', padding: '1rem' }}>
              Tidak ada pesanan 
            </p>
          ) : (
            <div>
              {stats.pesananBelumProses.map((item) => (
                <div key={item.id}
                  style={{
                    padding: '1rem',
                    borderRadius: '12px',
                    border: '1px solid #ffcccc',
                    backgroundColor: '#fff1f1',
                    marginBottom: '1rem',
                    display: 'flex',
                    justifyContent: 'space-between',
                    alignItems: 'center',
                    transition: '0.2s',
                    cursor: 'pointer'
                  }}
                  onClick={() => navigate(`/pesanan/detail/${item.id}`)}
                >
                  <div>
                    <p style={{ margin: 0, fontWeight: 'bold', color: '#d90429' }}>
                      #{item.id} • {item.user?.nama ?? 'User'}
                    </p>
                    <p style={{ margin: 0, color: '#555', fontSize: '0.9rem' }}>
                      {new Date(item.created_at).toLocaleDateString()}
                    </p>
                  </div>

                  <span style={{
                    backgroundColor: '#e63946',
                    color: 'white',
                    padding: '5px 10px',
                    borderRadius: '8px',
                    fontSize: '0.8rem'
                  }}>
                    Detail
                  </span>
                </div>
              ))}
            </div>
          )}
        </div>

        {/* Footer */}
        <footer style={{
          textAlign: 'center',
          padding: '1rem',
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

export default DashboardAdmin;
