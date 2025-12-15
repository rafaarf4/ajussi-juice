import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';

function Katalog() {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchProducts = async () => {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/produk');
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
        const data = await response.json();
        setProducts(data);
        setLoading(false);
      } catch (err) {
        console.error('Gagal mengambil data produk:', err);
        setError(err.message);
        setLoading(false);
      }
    };

    fetchProducts();
  }, []);

  const handleBeli = (product) => {
    const cart = JSON.parse(localStorage.getItem('cart') || '[]');
    const existingItem = cart.find(item => item.id_produk === product.id_produk);
    
    if (existingItem) {
      existingItem.quantity = (existingItem.quantity || 1) + 1;
    } else {
      cart.push({ ...product, quantity: 1 });
    }
    
    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`✅ ${product.nama_produk} ditambahkan ke keranjang!`);
  };

  if (loading) {
    return (
      <div style={{ textAlign: 'center', padding: '3rem', fontSize: '1.2rem' }}>
        🍹 Memuat katalog menu...
      </div>
    );
  }

  return (
    <div style={{ fontFamily: 'Arial, sans-serif', backgroundColor: '#f9f9f9', minHeight: '100vh', padding: '2rem' }}>

      {/* Header */}
      <div style={{ display: 'flex', justifyContent: 'space-between', alignItems: 'center', marginBottom: '2rem' }}>
        <h1 style={{ color: '#e74c3c', fontSize: '2rem' }}>
          Katalog Menu Ajussi Juice
        </h1>
        <Link
          to="/"
          style={{
            backgroundColor: '#e74c3c',
            color: 'white',
            padding: '0.5rem 1.5rem',
            borderRadius: '20px',
            textDecoration: 'none',
            fontWeight: 'bold'
          }}
        >
          ← Kembali ke Home
        </Link>
      </div>

      {/* Semua Produk */}
      {products.length === 0 ? (
        <p style={{ textAlign: 'center', color: '#777', fontSize: '1.2rem' }}>
          Tidak ada produk tersedia.
        </p>
      ) : (
        <div style={{
          display: 'grid',
          gridTemplateColumns: 'repeat(auto-fill, minmax(240px, 1fr))',
          gap: '2rem',
          justifyContent: 'center'
        }}>
          {products.map((product) => (
            <div
              key={product.id_produk}
              style={{
                backgroundColor: 'white',
                borderRadius: '12px',
                overflow: 'hidden',
                boxShadow: '0 2px 12px rgba(0,0,0,0.1)',
                transition: 'transform 0.2s',
                cursor: 'pointer',
                maxWidth: '260px',
                width: '100%'
              }}
              onMouseEnter={(e) => (e.currentTarget.style.transform = 'scale(1.03)')}
              onMouseLeave={(e) => (e.currentTarget.style.transform = 'scale(1)')}
            >
              <img
                src={
                  product.gambar
                    ? `http://127.0.0.1:8000/${product.gambar}`
                    : 'https://via.placeholder.com/260x180?text=No+Image'
                }
                alt={product.nama_produk}
                onError={(e) => {
                  e.target.src = 'https://via.placeholder.com/260x180?text=Gambar+Tidak+Ditemukan';
                }}
                style={{
                  width: '100%',
                  height: '180px',
                  objectFit: 'cover'
                }}
              />
              <div style={{ padding: '1.2rem' }}>
                <h3 style={{
                  margin: '0 0 0.4rem 0',
                  fontSize: '1.1rem',
                  fontWeight: 'bold',
                  color: '#333'
                }}>
                  {product.nama_produk}
                </h3>
                <p style={{
                  margin: '0.4rem 0',
                  color: '#e74c3c',
                  fontWeight: 'bold',
                  fontSize: '1rem'
                }}>
                  Rp{product.harga.toLocaleString('id-ID')}
                </p>
                <div style={{
                  display: 'flex',
                  alignItems: 'center',
                  justifyContent: 'center',
                  gap: '0.3rem',
                  fontSize: '0.85rem',
                  color: '#777'
                }}>
                  ⭐ 4.9 / 5 (256)
                </div>
                <div style={{ marginTop: '1rem' }}>
                  <button
                    onClick={() => handleBeli(product)}
                    style={{
                      backgroundColor: '#e74c3c',
                      color: 'white',
                      border: 'none',
                      padding: '0.5rem 1rem',
                      borderRadius: '8px',
                      fontWeight: 'bold',
                      cursor: 'pointer',
                      fontSize: '0.9rem',
                      width: '100%'
                    }}
                  >
                    🛒 Beli
                  </button>
                </div>
              </div>
            </div>
          ))}
        </div>
      )}

      <div style={{
        position: 'fixed',
        bottom: '20px',
        right: '20px',
        backgroundColor: '#e74c3c',
        width: '55px',
        height: '55px',
        borderRadius: '50%',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        boxShadow: '0 4px 12px rgba(0,0,0,0.25)',
        cursor: 'pointer',
        zIndex: 1000
      }}>
        <Link to="/keranjang" style={{ color: 'white', fontSize: '1.6rem', textDecoration: 'none' }}>
          🛒
        </Link>
      </div>
    </div>
  );
}

export default Katalog;