// src/pages/Payment.jsx
import { useState, useEffect } from "react";
import { useParams, useNavigate } from "react-router-dom";
import Swal from "sweetalert2";
import UserLayout from "../layouts/UserLayout";

export default function Payment() {
  const { id } = useParams();
  const navigate = useNavigate();

  const [order, setOrder] = useState(null);
  const [selectedMethod, setSelectedMethod] = useState("BCA");
  const [buktiTransfer, setBuktiTransfer] = useState(null);
  const [loading, setLoading] = useState(false);

  const API_URL = import.meta.env.VITE_API_URL || "http://127.0.0.1:8000";

  // Ambil detail pesanan
  useEffect(() => {
    const fetchOrder = async () => {
      try {
        const res = await fetch(`${API_URL}/api/pesanan/${id}`);
        const data = await res.json();

        // cek struktur
        const orderData = data.data ? data.data : data;
        setOrder(orderData);
      } catch (err) {
        console.error("Gagal ambil data pesanan:", err);
      }
    };
    fetchOrder();
  }, [id]);

  const handleFileChange = (e) => {
    setBuktiTransfer(e.target.files[0]);
  };

  const handleSubmit = async (e) => {
    e.preventDefault();

    if (!buktiTransfer) {
      Swal.fire({
        icon: "warning",
        title: "Unggah bukti transfer terlebih dahulu!",
        toast: true,
        timer: 1500,
        position: "top-end",
        showConfirmButton: false,
      });
      return;
    }

    setLoading(true);

    try {
      const formData = new FormData();
      formData.append("status", "diproses");
      formData.append("metode_pembayaran", selectedMethod);
      formData.append("bukti_transfer", buktiTransfer);

      const res = await fetch(`${API_URL}/api/pesanan/${id}/payment`, {
        method: "POST",
        body: formData,
      });

      const result = await res.json();
      console.log("Respons pembayaran:", result);

      if (!res.ok) {
        throw new Error(result.message || "Gagal mengunggah bukti pembayaran");
      }

      Swal.fire({
        icon: "success",
        title: "Pembayaran berhasil dikirim!",
        toast: true,
        timer: 2000,
        position: "top-end",
        showConfirmButton: false,
      });

      setTimeout(() => navigate("/pesanan-user"), 1200);
    } catch (err) {
      console.error("Error pembayaran:", err);
      Swal.fire({
        icon: "error",
        title: "Gagal mengirim pembayaran",
        text: err.message,
      });
    } finally {
      setLoading(false);
    }
  };

  if (!order) {
    return (
      <UserLayout>
        <div style={{ textAlign: "center", padding: "3rem" }}>
          Memuat detail pesanan...
        </div>
      </UserLayout>
    );
  }

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
        <div
          style={{
            backgroundColor: "white",
            borderRadius: "10px",
            boxShadow: "0 2px 10px rgba(0,0,0,0.08)",
            maxWidth: "600px",
            margin: "0 auto",
            padding: "2rem",
          }}
        >
          <h2 style={{ color: "#e74c3c", textAlign: "center" }}>
            Pembayaran Pesanan #{id}
          </h2>

          <p style={{ textAlign: "center", color: "#777" }}>
            Total Pembayaran:
          </p>

          <h3 style={{ color: "#e74c3c", textAlign: "center" }}>
            Rp{parseInt(order.total_harga).toLocaleString("id-ID")}
          </h3>

          {/* metode pembayaran */}
          <div style={{ margin: "1.5rem 0" }}>
            <strong>Pilih Metode Pembayaran:</strong>
            <div style={{ display: "flex", gap: "0.5rem", marginTop: "0.5rem" }}>
              {["BCA", "BRI", "QRIS"].map((m) => (
                <button
                  key={m}
                  onClick={() => setSelectedMethod(m)}
                  style={{
                    flex: 1,
                    backgroundColor: selectedMethod === m ? "#e74c3c" : "#f0f0f0",
                    color: selectedMethod === m ? "white" : "#333",
                    border: "none",
                    borderRadius: "6px",
                    padding: "0.6rem",
                    fontWeight: "bold",
                    cursor: "pointer",
                  }}
                >
                  {m}
                </button>
              ))}
            </div>
          </div>

          {/* upload bukti */}
          <div style={{ margin: "1.5rem 0" }}>
            <strong>Upload Bukti Transfer:</strong>
            <input
              type="file"
              onChange={handleFileChange}
              style={{
                width: "100%",
                marginTop: "0.5rem",
                border: "1px solid #ddd",
                borderRadius: "8px",
                padding: "0.5rem",
              }}
            />
          </div>

          <button
            onClick={handleSubmit}
            disabled={loading}
            style={{
              width: "100%",
              backgroundColor: "#e74c3c",
              color: "white",
              border: "none",
              borderRadius: "8px",
              padding: "0.8rem",
              fontWeight: "bold",
              cursor: "pointer",
              fontSize: "1rem",
              opacity: loading ? 0.7 : 1,
            }}
          >
            {loading ? "Mengirim..." : "Kirim Pembayaran"}
          </button>
        </div>
      </div>
    </UserLayout>
  );
}
