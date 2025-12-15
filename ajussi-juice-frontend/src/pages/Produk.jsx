import { useQuery, useMutation, useQueryClient } from '@tanstack/react-query';
import { Link, useNavigate } from 'react-router-dom';
import SidebarAdmin from '../components/SidebarAdmin';

const fetchProducts = async () => {
  const res = await fetch('http://127.0.0.1:8000/api/produk');
  if (!res.ok) throw new Error('Gagal mengambil data produk');
  return res.json();
};

const deleteProduct = async (id) => {
  const res = await fetch(`http://127.0.0.1:8000/api/produk/${id}`, {
    method: 'DELETE',
  });
  if (!res.ok) throw new Error('Gagal menghapus produk');
};

function Produk() {
  const navigate = useNavigate();
  const queryClient = useQueryClient();

  const { data: products, isLoading, error } = useQuery({
    queryKey: ['products'],
    queryFn: fetchProducts,
    staleTime: 5 * 60 * 1000,
  });

  const { mutate: deleteMutate, isPending: isDeleting } = useMutation({
    mutationFn: deleteProduct,
    onSuccess: () => {
      queryClient.invalidateQueries({ queryKey: ['products'] });
      alert('Produk berhasil dihapus!');
    },
    onError: (err) => {
      alert('Gagal menghapus produk: ' + err.message);
    },
  });

  const handleDelete = (id) => {
    if (window.confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
      deleteMutate(id);
    }
  };

  if (isLoading) {
    return (
      <div style={{ textAlign: 'center', padding: '3rem', fontSize: '1.2rem' }}>
        🍹 Memuat daftar produk...
      </div>
    );
  }

  if (error) {
    return (
      <div style={{ textAlign: 'center', padding: '3rem', color: 'red' }}>
        ❌ {error.message}
      </div>
    );
  }

  return (
    <div
      style={{
        fontFamily: 'Arial, sans-serif',
        backgroundColor: '#fff6f5',
        minHeight: '100vh',
        display: 'flex',
      }}
    >
      <SidebarAdmin />

      <div
        style={{
          marginLeft: '250px',
          width: 'calc(100% - 250px)',
          padding: '2rem',
          backgroundColor: '#f9f9f9',
        }}
      >
        {/* Header */}
        <div
          style={{
            display: 'flex',
            justifyContent: 'space-between',
            alignItems: 'center',
            marginBottom: '2rem',
          }}
        >
          <h1 style={{ color: '#e74c3c', fontSize: '1.8rem', fontWeight: 'bold' }}>
            Daftar Produk
          </h1>

          <button
            onClick={() => navigate('/produk/tambah')}
            style={{
              backgroundColor: '#e74c3c',
              color: 'white',
              border: 'none',
              padding: '0.7rem 1.2rem',
              borderRadius: '10px',
              fontWeight: 'bold',
              cursor: 'pointer',
              fontSize: '0.95rem',
              boxShadow: '0 4px 10px rgba(231, 76, 60, 0.3)',
              transition: '0.3s',
            }}
            onMouseOver={(e) => (e.target.style.backgroundColor = '#c0392b')}
            onMouseOut={(e) => (e.target.style.backgroundColor = '#e74c3c')}
          >
            + Tambah Produk
          </button>
        </div>

        {/* Card Wrapper */}
        <div
          style={{
            backgroundColor: 'white',
            borderRadius: '12px',
            boxShadow: '0 4px 15px rgba(0,0,0,0.08)',
            overflowX: 'auto',
            border: '2px solid #ffe0dc',
          }}
        >
          <table
            style={{
              width: '100%',
              borderCollapse: 'collapse',
              fontSize: '0.95rem',
            }}
          >
            <thead>
              <tr style={{ backgroundColor: '#ffebe8', textAlign: 'left' }}>
                {['ID', 'Nama Produk', 'Kategori', 'Harga', 'Gambar', 'Aksi'].map(
                  (title) => (
                    <th
                      key={title}
                      style={{
                        padding: '0.9rem 1.2rem',
                        borderBottom: '2px solid #ffd0c8',
                        fontWeight: 'bold',
                        color: '#c0392b',
                      }}
                    >
                      {title}
                    </th>
                  )
                )}
              </tr>
            </thead>

            <tbody>
              {products?.map((product) => (
                <tr
                  key={product.id_produk}
                  style={{
                    borderBottom: '1px solid #ffe0dc',
                    transition: '0.25s',
                  }}
                  onMouseOver={(e) => (e.currentTarget.style.backgroundColor = '#fff2f0')}
                  onMouseOut={(e) => (e.currentTarget.style.backgroundColor = 'white')}
                >
                  <td style={{ padding: '0.9rem 1.2rem' }}>
                    {product.id_produk}
                  </td>

                  <td style={{ padding: '0.9rem 1.2rem' }}>
                    {product.nama_produk}
                  </td>

                  <td style={{ padding: '0.9rem 1.2rem' }}>{product.kategori}</td>

                  <td style={{ padding: '0.9rem 1.2rem', fontWeight: 'bold', color: '#c0392b' }}>
                    Rp{parseFloat(product.harga).toLocaleString('id-ID')}
                  </td>

                  <td style={{ padding: '0.9rem 1.2rem', textAlign: 'center' }}>
                    {product.gambar ? (
                      <img
                        src={`http://127.0.0.1:8000/${product.gambar}`}
                        alt={product.nama_produk}
                        onError={(e) => {
                          e.target.src =
                            'https://via.placeholder.com/60x60?text=No+Image';
                        }}
                        style={{
                          width: '60px',
                          height: '60px',
                          objectFit: 'cover',
                          borderRadius: '8px',
                          border: '2px solid #ffcbc2',
                        }}
                      />
                    ) : (
                      <span>—</span>
                    )}
                  </td>

                  <td style={{ padding: '0.9rem 1.2rem', textAlign: 'center' }}>
                    <Link
                      to={`/produk/edit/${product.id_produk}`}
                      style={{
                        color: '#2980b9',
                        textDecoration: 'none',
                        marginRight: '0.75rem',
                        fontWeight: 'bold',
                      }}
                    >
                      Edit
                    </Link>

                    |

                    <button
                      onClick={() => handleDelete(product.id_produk)}
                      disabled={isDeleting}
                      style={{
                        background: 'none',
                        border: 'none',
                        color: '#e74c3c',
                        marginLeft: '0.75rem',
                        cursor: isDeleting ? 'not-allowed' : 'pointer',
                        fontWeight: 'bold',
                      }}
                    >
                      Hapus
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>

        <footer
          style={{
            textAlign: 'center',
            padding: '1rem',
            borderTop: '1px solid #ffd8d3',
            color: '#777',
            fontSize: '0.8rem',
            marginTop: '2rem',
          }}
        >
          © {new Date().getFullYear()} Ajussi Juice — UMKM Lokal Indonesia
        </footer>
      </div>
    </div>
  );
}

export default Produk;
