import { useState, useEffect } from "react";
import { useParams, useNavigate } from "react-router-dom";

function DetailPesanan() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [pesanan, setPesanan] = useState(null);
  const [status, setStatus] = useState("");
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchPesanan = async () => {
      try {
        const res = await fetch(`http://127.0.0.1:8000/api/pesanan/${id}`);
        const data = await res.json();

        setPesanan(data);
        setStatus(data.status);
        setLoading(false);
      } catch (err) {
        console.error(err);
        setLoading(false);
      }
    };

    fetchPesanan();
  }, [id]);

  const handleSave = async () => {
    try {
      const res = await fetch(`http://127.0.0.1:8000/api/pesanan/${id}`, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ status }),
      });

      if (!res.ok) throw new Error("Gagal update status");

      alert("Status berhasil diperbarui!");
      navigate("/pesanan");
    } catch (error) {
      alert(error.message);
    }
  };

  if (loading) return <div style={{ padding: "2rem" }}>Memuat data...</div>;
  if (!pesanan)
    return <div style={{ padding: "2rem" }}>Pesanan tidak ditemukan</div>;

  return (
    <div
      style={{
        padding: "3rem",
        maxWidth: "950px",
        margin: "0 auto",
      }}
    >
      {/* JUDUL */}
      <h1
        style={{
          fontSize: "2rem",
          background: "linear-gradient(90deg, #d63031, #ff7675)",
          WebkitBackgroundClip: "text",
          color: "transparent",
          marginBottom: "1rem",
          fontWeight: "800",
        }}
      >
        Detail Pesanan #{pesanan.id}
      </h1>

      {/* CARD */}
      <div
        style={{
          background: "white",
          padding: "2.5rem",
          borderRadius: "16px",
          boxShadow: "0 10px 20px rgba(0,0,0,0.12)",
          border: "1px solid #ffe0e0",
        }}
      >
        {/* DATA USER */}
        <div style={{ marginBottom: "1.8rem" }}>
          <p style={{ margin: "0.6rem 0", fontSize: "1.05rem" }}>
            <strong style={{ color: "#d63031" }}>User: </strong>
            {pesanan.user?.nama ?? "Tidak ada nama"}
          </p>

          <p style={{ margin: "0.6rem 0", fontSize: "1.05rem" }}>
            <strong style={{ color: "#d63031" }}>Tanggal Pesanan: </strong>
            {new Date(pesanan.created_at).toLocaleString("id-ID")}
          </p>

          <p
            style={{
              margin: "0.6rem 0",
              fontSize: "1.3rem",
              fontWeight: "700",
            }}
          >
            <strong style={{ color: "#d63031" }}>Total Harga: </strong>
            <span
              style={{
                color: "#d63031",
                fontWeight: "900",
              }}
            >
              Rp{pesanan.total_harga.toLocaleString("id-ID")}
            </span>
          </p>
        </div>

        {/* STATUS */}
        <div>
          <label
            style={{
              fontWeight: "bold",
              marginBottom: "0.6rem",
              display: "block",
              fontSize: "1.05rem",
              color: "#b80000",
            }}
          >
            Status Pesanan
          </label>

          <select
            value={status}
            onChange={(e) => setStatus(e.target.value)}
            style={{
              padding: "12px",
              width: "100%",
              borderRadius: "10px",
              border: "1px solid #ffbaba",
              fontSize: "1.05rem",
              background: "#fff5f5",
            }}
          >
            <option value="Selesai">Selesai</option>
            <option value="Menunggu">Menunggu</option>
            <option value="Diproses">Diproses</option>
            <option value="Siap Diambil">Siap Diambil</option>
          </select>

          <button
            onClick={handleSave}
            style={{
              marginTop: "1.7rem",
              width: "100%",
              padding: "14px",
              background:
                "linear-gradient(90deg, #d63031, #ff4d4d, #ff7675)",
              color: "white",
              borderRadius: "10px",
              border: "none",
              fontSize: "1.15rem",
              fontWeight: "800",
              cursor: "pointer",
              letterSpacing: "0.5px",
              transition: "0.2s",
            }}
            onMouseOver={(e) =>
              (e.target.style.opacity = "0.85")
            }
            onMouseOut={(e) => (e.target.style.opacity = "1")}
          >
            Simpan Perubahan
          </button>
        </div>
      </div>
    </div>
  );
}

export default DetailPesanan;
