import { useEffect, useState } from "react";
import UserLayout from "../layouts/UserLayout";
import { useNavigate } from "react-router-dom";

export default function PesananUser() {
  const [orders, setOrders] = useState([]);
  const [filter, setFilter] = useState("semua");
  const [loading, setLoading] = useState(true);
  const [ulasan, setUlasan] = useState({});
  const navigate = useNavigate();

  useEffect(() => {
    const user = JSON.parse(localStorage.getItem("user"));
    if (!user) {
      navigate("/login");
      return;
    }

    const fetchOrders = async () => {
      try {
        const API_URL = import.meta.env.VITE_API_URL || "http://127.0.0.1:8000";
        const res = await fetch(`${API_URL}/api/pesanan-user/${user.id}`);
        const data = await res.json();
        console.log("Data Pesanan:", data);
        setOrders(Array.isArray(data) ? data : []);
      } catch (err) {
        console.error("Gagal memuat pesanan:", err);
      } finally {
        setLoading(false);
      }
    };

    fetchOrders();
  }, [navigate]);

  const filteredOrders =
    filter === "semua"
      ? orders
      : orders.filter(
          (p) => p.status && p.status.toLowerCase() === filter.toLowerCase()
        );

  if (loading) {
    return (
      <UserLayout>
        <div style={{ textAlign: "center", padding: "3rem" }}>
          🍹 Memuat riwayat pesanan...
        </div>
      </UserLayout>
    );
  }

  const getStatusStyle = (status) => {
    switch (status?.toLowerCase()) {
      case "menunggu":
        return { bg: "#f8d7da", color: "#721c24", msg: "Pesananmu menunggu pembayaran 💳" };
      case "diproses":
        return { bg: "#fff3cd", color: "#856404", msg: "Pesanan sedang diproses oleh tim kami 👨‍🍳" };
      case "siap diambil":
        return { bg: "#d4edda", color: "#155724", msg: "Pesanan sudah siap diambil di gerai! 🍹" };
      case "selesai":
        return { bg: "#d1ecf1", color: "#0c5460", msg: "Pesanan telah selesai 🎉 Terima kasih sudah berbelanja!" };
      default:
        return { bg: "#e2e3e5", color: "#383d41", msg: "Status tidak diketahui." };
    }
  };

  return (
    <UserLayout>
      <div
        style={{
          padding: "2rem",
          backgroundColor: "#f9f9f9",
          minHeight: "100vh",
          fontFamily: "Poppins, sans-serif",
        }}
      >
        <h1
          style={{
            textAlign: "center",
            color: "#e74c3c",
            fontSize: "1.8rem",
            marginBottom: "1.5rem",
          }}
        >
          Riwayat Pesanan Kamu
        </h1>

        {/* Filter status */}
        <div
          style={{
            display: "flex",
            justifyContent: "center",
            flexWrap: "wrap",
            gap: "1rem",
            marginBottom: "2rem",
          }}
        >
          {["semua", "menunggu", "diproses", "siap diambil", "selesai"].map(
            (f) => (
              <button
                key={f}
                onClick={() => setFilter(f)}
                style={{
                  padding: "0.5rem 1.2rem",
                  borderRadius: "20px",
                  border: "none",
                  backgroundColor: filter === f ? "#e74c3c" : "white",
                  color: filter === f ? "white" : "#e74c3c",
                  fontWeight: "bold",
                  cursor: "pointer",
                  boxShadow: "0 2px 6px rgba(0,0,0,0.1)",
                  transition: "0.2s",
                }}
              >
                {f === "semua"
                  ? "Semua Pesanan"
                  : f.charAt(0).toUpperCase() + f.slice(1)}
              </button>
            )
          )}
        </div>

        {/* List Pesanan */}
        {filteredOrders.length === 0 ? (
          <p style={{ textAlign: "center", color: "#777" }}>
            Belum ada pesanan.
          </p>
        ) : (
          filteredOrders.map((order, index) => {
            const statusInfo = getStatusStyle(order.status);
            return (
              <div
                key={order.id}
                style={{
                  backgroundColor: "white",
                  borderRadius: "12px",
                  boxShadow: "0 2px 10px rgba(0,0,0,0.08)",
                  marginBottom: "2rem",
                  padding: "1rem",
                  border: "2px solid #f5b7b1",
                }}
              >
                {/* Header */}
                <div
                  style={{
                    display: "flex",
                    justifyContent: "space-between",
                    alignItems: "center",
                    backgroundColor: "#e74c3c",
                    color: "white",
                    padding: "0.6rem 1rem",
                    borderRadius: "8px 8px 0 0",
                  }}
                >
                  <span>Pesanan #{index + 1}</span>
                  <span
                    style={{
                      backgroundColor:
                        order.status === "selesai"
                          ? "#3498db"
                          : order.status === "siap diambil"
                          ? "#27ae60"
                          : order.status === "diproses"
                          ? "#f1c40f"
                          : "#e74c3c",
                      padding: "0.3rem 1rem",
                      borderRadius: "20px",
                      fontSize: "0.85rem",
                      fontWeight: "bold",
                    }}
                  >
                    {order.status?.toUpperCase()}
                  </span>
                </div>

                {/* Detail Item */}
                {Array.isArray(order.details) && order.details.length > 0 ? (
                  <table
                    style={{
                      width: "100%",
                      borderCollapse: "collapse",
                      marginTop: "1rem",
                    }}
                  >
                    <thead>
                      <tr
                        style={{
                          backgroundColor: "#ffeaea",
                          textAlign: "left",
                          color: "#e74c3c",
                        }}
                      >
                        <th style={thStyle}>Produk</th>
                        <th style={thStyle}>Jumlah</th>
                        <th style={thStyle}>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      {order.details.map((item) => (
                        <tr
                          key={item.id}
                          style={{
                            borderBottom: "1px solid #f4cccc",
                          }}
                        >
                          <td style={tdStyle}>
                            {item.produk?.nama_produk || "Produk dihapus"}
                          </td>
                          <td style={tdStyle}>{item.jumlah}</td>
                          <td style={{ ...tdStyle, color: "#e74c3c" }}>
                            Rp
                            {Number(item.subtotal || 0).toLocaleString("id-ID")}
                          </td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                ) : (
                  <p style={{ color: "#999", padding: "0.5rem" }}>
                    Tidak ada detail produk.
                  </p>
                )}

                {/* Banner status */}
                <div
                  style={{
                    backgroundColor: statusInfo.bg,
                    color: statusInfo.color,
                    padding: "0.8rem 1rem",
                    borderRadius: "8px",
                    marginTop: "1rem",
                    fontSize: "0.9rem",
                    fontWeight: "500",
                  }}
                >
                  {statusInfo.msg}
                </div>

                {/* Total & tombol bayar */}
                <div
                  style={{
                    display: "flex",
                    justifyContent: "space-between",
                    alignItems: "center",
                    marginTop: "1rem",
                  }}
                >
                  <strong style={{ color: "#e74c3c" }}>
                    Total: Rp
                    {Number(order.total_harga || 0).toLocaleString("id-ID")}
                  </strong>
                  {order.status?.toLowerCase() === "menunggu" && (
                    <button
                      onClick={() => navigate(`/payment/${order.id}`)}
                      style={{
                        backgroundColor: "#e74c3c",
                        color: "white",
                        border: "none",
                        borderRadius: "6px",
                        padding: "0.6rem 1rem",
                        cursor: "pointer",
                        fontWeight: "bold",
                      }}
                    >
                      Bayar Sekarang
                    </button>
                  )}
                </div>

                {/* Form ulasan */}
                {order.status?.toLowerCase() === "selesai" && (
                  <div
                    style={{
                      marginTop: "1rem",
                      padding: "1rem",
                      borderTop: "1px solid #eee",
                    }}
                  >
                    <h4 style={{ color: "#3498db", marginBottom: "0.5rem" }}>
                      ✍️ Ulasan Kamu
                    </h4>
                    <textarea
                      placeholder="Tulis ulasan kamu di sini..."
                      value={ulasan[order.id] || ""}
                      onChange={(e) =>
                        setUlasan({ ...ulasan, [order.id]: e.target.value })
                      }
                      style={{
                        width: "100%",
                        borderRadius: "8px",
                        border: "1px solid #ccc",
                        padding: "0.6rem",
                        fontSize: "0.9rem",
                      }}
                    />
                    <button
                      style={{
                        backgroundColor: "#3498db",
                        color: "white",
                        border: "none",
                        padding: "0.5rem 1rem",
                        borderRadius: "6px",
                        marginTop: "0.5rem",
                        cursor: "pointer",
                      }}
                      onClick={() => alert("Ulasan dikirim!")}
                    >
                      Kirim Ulasan
                    </button>
                  </div>
                )}
              </div>
            );
          })
        )}
      </div>
    </UserLayout>
  );
}

const thStyle = {
  padding: "0.7rem 1rem",
  borderBottom: "2px solid #f4cccc",
};

const tdStyle = {
  padding: "0.7rem 1rem",
};
