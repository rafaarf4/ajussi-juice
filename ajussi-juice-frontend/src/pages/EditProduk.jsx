// src/pages/EditProduk.jsx
import { useState, useEffect } from 'react';
import { useNavigate, useParams } from 'react-router-dom';

function EditProduk() {
  const { id } = useParams();
  const [formData, setFormData] = useState({
    nama_produk: '',
    kategori: '',
    harga: '',
    deskripsi: '',
    gambar: ''
  });
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState('');

  const navigate = useNavigate();

  useEffect(() => {
    const fetchProduk = async () => {
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/produk/${id}`);
        if (!response.ok) throw new Error('Gagal mengambil data produk');

        const data = await response.json();
        setFormData({
          nama_produk: data.nama_produk,
          kategori: data.kategori,
          harga: data.harga,
          deskripsi: data.deskripsi,
          gambar: data.gambar
        });
        setLoading(false);
      } catch (err) {
        console.error('Gagal mengambil data produk:', err);
        setError(err.message);
        setLoading(false);
      }
    };

    fetchProduk();
  }, [id]);

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

    try {
      const payload = {
        ...formData,
        harga: parseFloat(formData.harga) // ✅ Konversi ke number
      };

      const response = await fetch(`http://127.0.0.1:8000/api/produk/${id}`, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(payload),
      });

      if (!response.ok) {
        throw new Error('Gagal memperbarui produk');
      }

      alert('Produk berhasil diperbarui!');
      navigate('/produk');
    } catch (err) {
      setError(err.message);
    } finally {
      setLoading(false);
    }
  };

  if (loading) {
    return (
      <div style={{ textAlign: 'center', padding: '3rem', fontSize: '1.2rem' }}>
        🍹 Memuat data produk...
      </div>
    );
  }

  return (
    <div style={{
      fontFamily: 'Arial, sans-serif',
      backgroundColor: '#f9f9f9',
      minHeight: '100vh',
      padding: '2rem'
    }}>
      <div style={{
        backgroundColor: 'white',
        padding: '2rem',
        borderRadius: '8px',
        boxShadow: '0 2px 8px rgba(0,0,0,0.1)',
        maxWidth: '600px',
        margin: '0 auto'
      }}>
        <h2 style={{ color: '#e74c3c', marginBottom: '1.5rem' }}>
          Edit Produk
        </h2>

        {error && (
          <div style={{
            backgroundColor: '#fadbd8',
            color: '#d35400',
            padding: '0.75rem',
            borderRadius: '8px',
            marginBottom: '1rem',
            textAlign: 'center'
          }}>
            {error}
          </div>
        )}

        <form onSubmit={handleSubmit}>
          <div style={{ marginBottom: '1rem' }}>
            <label style={{
              display: 'block',
              marginBottom: '0.5rem',
              fontWeight: 'bold'
            }}>
              Nama Produk
            </label>
            <input
              type="text"
              name="nama_produk"
              value={formData.nama_produk}
              onChange={handleChange}
              required
              style={{
                width: '100%',
                padding: '0.75rem',
                borderRadius: '8px',
                border: '1px solid #ddd',
                fontSize: '1rem'
              }}
            />
          </div>

          <div style={{ marginBottom: '1rem' }}>
            <label style={{
              display: 'block',
              marginBottom: '0.5rem',
              fontWeight: 'bold'
            }}>
              Kategori
            </label>
            <select
              name="kategori"
              value={formData.kategori}
              onChange={handleChange}
              required
              style={{
                width: '100%',
                padding: '0.75rem',
                borderRadius: '8px',
                border: '1px solid #ddd',
                fontSize: '1rem'
              }}
            >
              <option value="">Pilih Kategori</option>
              <option>Jus</option>
              <option>Camilan</option>
              <option>Makanan</option>
              <option>Minuman</option>
            </select>
          </div>

          <div style={{ marginBottom: '1rem' }}>
            <label style={{
              display: 'block',
              marginBottom: '0.5rem',
              fontWeight: 'bold'
            }}>
              Harga
            </label>
            <input
              type="number"
              name="harga"
              value={formData.harga}
              onChange={handleChange}
              required
              min="0"
              step="0.01"
              style={{
                width: '100%',
                padding: '0.75rem',
                borderRadius: '8px',
                border: '1px solid #ddd',
                fontSize: '1rem'
              }}
            />
          </div>

          <div style={{ marginBottom: '1rem' }}>
            <label style={{
              display: 'block',
              marginBottom: '0.5rem',
              fontWeight: 'bold'
            }}>
              Deskripsi
            </label>
            <textarea
              name="deskripsi"
              value={formData.deskripsi}
              onChange={handleChange}
              required
              rows="4"
              style={{
                width: '100%',
                padding: '0.75rem',
                borderRadius: '8px',
                border: '1px solid #ddd',
                fontSize: '1rem'
              }}
            />
          </div>

          <div style={{ marginBottom: '1rem' }}>
            <label style={{
              display: 'block',
              marginBottom: '0.5rem',
              fontWeight: 'bold'
            }}>
              URL Gambar
            </label>
            <input
              type="text"
              name="gambar"
              value={formData.gambar}
              onChange={handleChange}
              placeholder="Contoh: produk/jus-mangga.jpg"
              style={{
                width: '100%',
                padding: '0.75rem',
                borderRadius: '8px',
                border: '1px solid #ddd',
                fontSize: '1rem'
              }}
            />
          </div>

          <button
            type="submit"
            disabled={loading}
            style={{
              width: '100%',
              padding: '0.75rem',
              backgroundColor: '#e74c3c',
              color: 'white',
              border: 'none',
              borderRadius: '8px',
              fontWeight: 'bold',
              cursor: 'pointer',
              fontSize: '1rem',
              opacity: loading ? 0.7 : 1
            }}
          >
            {loading ? 'Menyimpan...' : 'Perbarui Produk'}
          </button>
        </form>
      </div>
    </div>
  );
}

export default EditProduk;