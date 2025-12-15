// src/pages/Home.jsx
import { useState, useEffect } from "react";
import { Link } from "react-router-dom";

export default function Home() {
  const [products, setProducts] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetch("http://127.0.0.1:8000/api/produk")
      .then((res) => res.json())
      .then((data) => {
        setProducts(data);
        setLoading(false);
      })
      .catch((err) => console.error(err));
  }, []);

  const renderStars = (rating) =>
    Array.from({ length: 5 }).map((_, i) => (
      <span key={i} style={{ color: i < rating ? "#FFD700" : "#ccc" }}>★</span>
    ));

  if (loading)
    return <div style={{ textAlign: "center", padding: "3rem" }}>🍹 Memuat menu...</div>;

  return (
    <div style={{ backgroundColor: "#f9f9f9", minHeight: "100vh" }}>

      {/* Hero Section */}
        <section
        style={{
            backgroundColor: "white",
            borderRadius: "12px",
            padding: "3rem 2rem",
            textAlign: "center",
            margin: "2rem auto 1rem",
            width: "90%",                // 🔹 Sesuai dengan promo
            maxWidth: "3500px",           // 🔹 Batasi lebar agar tidak terlalu panjang di layar besar
            boxShadow: "0 4px 12px rgba(0,0,0,0.05)",
        }}
        >
        <h1
            style={{
            color: "#e74c3c",
            fontSize: "2rem",
            marginBottom: "0.8rem",
            }}
        >
            Selamat Datang di Ajussi Juice 🍓
        </h1>
        <p
            style={{
            color: "#666",
            fontSize: "1rem",
            marginBottom: "1.5rem",
            maxWidth: "600px",
            margin: "0 auto 1.5rem", // rata tengah
            lineHeight: "1.6",
            }}
        >
            Segarkan harimu dengan jus alami dan camilan kekinian buatan kami!
        </p>
        <Link
            to="/katalog"
            style={{
            backgroundColor: "#e74c3c",
            color: "white",
            border: "none",
            padding: "0.7rem 1.8rem",
            borderRadius: "25px",
            fontWeight: "bold",
            textDecoration: "none",
            boxShadow: "0 2px 6px rgba(0,0,0,0.1)",
            }}
        >
            Lihat Menu
        </Link>
        </section>

        {/* Promo Bar */}
        <div
        style={{
            backgroundColor: "#ffeaea",
            color: "#e74c3c",
            textAlign: "center",
            fontWeight: "bold",
            padding: "1rem",
            borderRadius: "6px",
            margin: "0 auto 2rem",
            width: "90%",                // 🔹 Sama persis dengan hero di atas
            maxWidth: "3500px",           // 🔹 Biar rata dan seimbang
            boxShadow: "0 2px 6px rgba(0,0,0,0.05)",
        }}
        >
        🍯 Promo Hari Ini: Beli 2 Jus Gratis 1!
        </div>


      {/* Menu Terfavorit */}
      <section style={{ padding: "2rem 4rem", textAlign: "center" }}>
        <h2 style={{ color: "#e74c3c", fontSize: "1.8rem", marginBottom: "1.5rem" }}>
          Menu Terfavorit
        </h2>

        <div
          style={{
            display: "grid",
            gridTemplateColumns: "repeat(auto-fit, minmax(240px, 1fr))",
            gap: "2rem",
          }}
        >
          {products.slice(0, 4).map((p) => (
            <div
              key={p.id_produk}
              style={{
                backgroundColor: "white",
                borderRadius: "12px",
                boxShadow: "0 2px 10px rgba(0,0,0,0.1)",
                overflow: "hidden",
                transition: "transform 0.2s",
              }}
              onMouseEnter={(e) => (e.currentTarget.style.transform = "scale(1.03)")}
              onMouseLeave={(e) => (e.currentTarget.style.transform = "scale(1)")}
            >
              <img
                src={
                  p.gambar
                    ? `http://127.0.0.1:8000/${p.gambar}`
                    : "https://via.placeholder.com/260x180?text=No+Image"
                }
                alt={p.nama_produk}
                style={{ width: "100%", height: "180px", objectFit: "cover" }}
              />
              <div style={{ padding: "1rem" }}>
                <h3 style={{ margin: "0.5rem 0", color: "#333" }}>{p.nama_produk}</h3>
                <p style={{ color: "#e74c3c", fontWeight: "bold" }}>
                  Rp{p.harga.toLocaleString("id-ID")}
                </p>
                <div style={{ fontSize: "0.85rem", color: "#777" }}>
                  {renderStars(5)} / 5 (256)
                </div>
              </div>
            </div>
          ))}
        </div>
      </section>
    </div>
  );
}
