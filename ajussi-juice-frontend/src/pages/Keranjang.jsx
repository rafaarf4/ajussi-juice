// src/pages/Keranjang.jsx
import { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";
import UserLayout from "../layouts/UserLayout";

export default function Keranjang() {
  const [cartItems, setCartItems] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    const cart = JSON.parse(localStorage.getItem("cart") || "[]");
    setCartItems(cart);
  }, []);

  const handleRemove = (id_produk) => {
    const cart = JSON.parse(localStorage.getItem("cart") || "[]");
    const updatedCart = cart.filter((item) => item.id_produk !== id_produk);
    localStorage.setItem("cart", JSON.stringify(updatedCart));
    setCartItems(updatedCart);
  };

  const handleCheckout = async () => {
    if (cartItems.length === 0) {
      alert("Keranjang masih kosong!");
      return;
    }

    try {
      const API_URL = import.meta.env.VITE_API_URL || "http://127.0.0.1:8000";
      const user = JSON.parse(localStorage.getItem("user"));

      if (!user) {
        alert("Kamu harus login terlebih dahulu!");
        navigate("/login");
        return;
      }

      // data yang dikirim ke backend
 const payload = {
  id_user: user.id,

  items: cartItems.map(item => ({
    id_produk: item.id_produk,                         // ← FIX
    jumlah: item.quantity || 1,
    subtotal: item.harga * (item.quantity || 1),
  })),

  total_harga: cartItems.reduce(
    (sum, item) => sum + item.harga * (item.quantity || 1),
    0
  ),
};


      console.log("Payload dikirim:", payload);
      // console.log(cartItems);

      console.log("Kirim data:", payload);

      const res = await fetch(`${API_URL}/api/pesanan-user`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            "Accept": "application/json"
          },
          body: JSON.stringify(payload),
        });


      const data = await res.json();
      console.log("Respon:", data);

      if (!res.ok) throw new Error(data.message || "Gagal membuat pesanan");

      localStorage.removeItem("cart");
      alert("Pesanan berhasil dibuat!");
      navigate("/pesanan-user");
    } catch (err) {
      console.error("Gagal membuat pesanan:", err);
      alert("Terjadi kesalahan saat membuat pesanan: " + err.message);
    }
  };

  const total = cartItems.reduce(
    (sum, item) => sum + item.harga * (item.quantity || 1),
    0
  );

  return (
    <UserLayout>
      <div
        style={{
          fontFamily: "Poppins, sans-serif",
          backgroundColor: "#f9f9f9",
          minHeight: "100vh",
          padding: "2rem",
        }}
      >
        <h1
          style={{
            color: "#e74c3c",
            fontSize: "1.8rem",
            textAlign: "center",
            marginBottom: "1rem",
          }}
        >
          Keranjang Belanja 🛒
        </h1>

        {cartItems.length === 0 ? (
          <div
            style={{
              textAlign: "center",
              fontSize: "1.2rem",
              marginTop: "3rem",
              color: "#555",
            }}
          >
            <p>Keranjangmu masih kosong 😢</p>
            <button
              onClick={() => navigate("/katalog")}
              style={{
                backgroundColor: "#e74c3c",
                color: "white",
                border: "none",
                padding: "0.75rem 1.5rem",
                borderRadius: "25px",
                fontWeight: "bold",
                cursor: "pointer",
                fontSize: "1rem",
                marginTop: "1rem",
                boxShadow: "0 3px 8px rgba(0,0,0,0.1)",
                transition: "0.3s",
              }}
              onMouseEnter={(e) =>
                (e.currentTarget.style.backgroundColor = "#c0392b")
              }
              onMouseLeave={(e) =>
                (e.currentTarget.style.backgroundColor = "#e74c3c")
              }
            >
              Belanja Sekarang
            </button>
          </div>
        ) : (
          <div
            style={{
              backgroundColor: "white",
              borderRadius: "12px",
              boxShadow: "0 3px 10px rgba(0,0,0,0.08)",
              padding: "1.5rem",
              maxWidth: "900px",
              margin: "2rem auto",
            }}
          >
            <table
              style={{
                width: "100%",
                borderCollapse: "collapse",
                fontSize: "0.95rem",
              }}
            >
              <thead>
                <tr
                  style={{
                    backgroundColor: "#ffeaea",
                    color: "#c0392b",
                    textAlign: "left",
                  }}
                >
                  <th style={thStyle}>Produk</th>
                  <th style={thStyle}>Harga</th>
                  <th style={thStyle}>Jumlah</th>
                  <th style={thStyle}>Total</th>
                  <th style={thStyle}>Aksi</th>
                </tr>
              </thead>
              <tbody>
                {cartItems.map((item) => (
                  <tr
                    key={item.id_produk}
                    style={{
                      borderBottom: "1px solid #f4cccc",
                      transition: "0.2s",
                    }}
                    onMouseEnter={(e) =>
                      (e.currentTarget.style.backgroundColor = "#fff6f6")
                    }
                    onMouseLeave={(e) =>
                      (e.currentTarget.style.backgroundColor = "white")
                    }
                  >
                    <td style={tdStyle}>{item.nama_produk}</td>
                    <td style={tdStyle}>
                      Rp{item.harga.toLocaleString("id-ID")}
                    </td>
                    <td style={tdStyle}>{item.quantity || 1}</td>
                    <td style={{ ...tdStyle, color: "#e74c3c" }}>
                      Rp
                      {(item.harga * (item.quantity || 1)).toLocaleString(
                        "id-ID"
                      )}
                    </td>
                    <td style={{ ...tdStyle, textAlign: "center" }}>
                      <button
                        onClick={() => handleRemove(item.id_produk)}
                        style={{
                          background: "none",
                          border: "none",
                          color: "#e74c3c",
                          cursor: "pointer",
                          fontWeight: "bold",
                          fontSize: "0.9rem",
                          transition: "0.2s",
                        }}
                        onMouseEnter={(e) =>
                          (e.currentTarget.style.color = "#c0392b")
                        }
                        onMouseLeave={(e) =>
                          (e.currentTarget.style.color = "#e74c3c")
                        }
                      >
                        Hapus
                      </button>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>

            <div
              style={{
                display: "flex",
                justifyContent: "space-between",
                alignItems: "center",
                marginTop: "1.5rem",
                fontSize: "1.1rem",
                fontWeight: "bold",
              }}
            >
              <span>Total:</span>
              <span style={{ color: "#e74c3c" }}>
                Rp{total.toLocaleString("id-ID")}
              </span>
            </div>

            <button
              onClick={handleCheckout}
              style={{
                width: "100%",
                padding: "0.9rem",
                backgroundColor: "#e74c3c",
                color: "white",
                border: "none",
                borderRadius: "8px",
                fontWeight: "bold",
                cursor: "pointer",
                fontSize: "1rem",
                marginTop: "1.5rem",
                boxShadow: "0 3px 10px rgba(0,0,0,0.1)",
                transition: "0.3s",
              }}
              onMouseEnter={(e) =>
                (e.currentTarget.style.backgroundColor = "#c0392b")
              }
              onMouseLeave={(e) =>
                (e.currentTarget.style.backgroundColor = "#e74c3c")
              }
            >
              Lanjut ke Pembayaran
            </button>
          </div>
        )}
      </div>
    </UserLayout>
  );
}

const thStyle = {
  padding: "0.9rem 1rem",
  borderBottom: "2px solid #f4cccc",
};

const tdStyle = {
  padding: "0.9rem 1rem",
  color: "#333",
};
