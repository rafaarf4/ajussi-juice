// src/layouts/UserLayout.jsx
import { Link, useNavigate } from "react-router-dom";

export default function UserLayout({ children }) {
  const user = JSON.parse(localStorage.getItem("user"));
  const navigate = useNavigate();

  const handleLogout = () => {
    localStorage.removeItem("user");
    navigate("/");
  };

  return (
    <div style={{ fontFamily: "Poppins, sans-serif", backgroundColor: "#f9f9f9", minHeight: "100vh" }}>
      {/* Navbar */}
      <nav
        style={{
          backgroundColor: "#e74c3c",
          padding: "0.8rem 2rem",
          display: "flex",
          justifyContent: "space-between",
          alignItems: "center",
          position: "sticky",
          top: 0,
          zIndex: 10,
          boxShadow: "0 2px 8px rgba(0,0,0,0.1)",
        }}
      >
        {/* Left links */}
        <div style={{ display: "flex", gap: "1.5rem" }}>
          <Link to="/" style={{ color: "white", fontWeight: "bold", textDecoration: "none", fontSize: "1.1rem" }}>
            Home
          </Link>
          <Link to="/keranjang" style={navLink}>Keranjang</Link>
          <Link to="/pesanan-user" style={navLink}>Pesanan</Link>
          <Link to="/payment" style={navLink}>Payment</Link>
        </div>

        {/* Right buttons */}
        {!user ? (
          <div style={{ display: "flex", gap: "0.8rem" }}>
            <Link to="/login" style={btnPrimary}>Login</Link>
            <Link to="/register" style={btnOutline}>Daftar</Link>
          </div>
        ) : (
          <button onClick={handleLogout} style={btnPrimary}>Logout</button>
        )}
      </nav>

      <main>{children}</main>

      <footer
        style={{
          textAlign: "center",
          padding: "1.5rem",
          borderTop: "1px solid #eee",
          color: "#777",
          fontSize: "0.85rem",
          marginTop: "2rem",
        }}
      >
        © {new Date().getFullYear()} Ajussi Juice — UMKM Lokal Indonesia
      </footer>
    </div>
  );
}

const navLink = {
  color: "white",
  fontWeight: "500",
  textDecoration: "none",
  fontSize: "1rem",
  transition: "0.2s",
};

const btnPrimary = {
  backgroundColor: "white",
  color: "#e74c3c",
  border: "none",
  padding: "0.5rem 1.2rem",
  borderRadius: "20px",
  fontWeight: "bold",
  cursor: "pointer",
  textDecoration: "none",
  boxShadow: "0 2px 8px rgba(0,0,0,0.1)",
};

const btnOutline = {
  backgroundColor: "transparent",
  color: "white",
  border: "2px solid white",
  padding: "0.5rem 1.2rem",
  borderRadius: "20px",
  fontWeight: "bold",
  cursor: "pointer",
  textDecoration: "none",
  transition: "0.3s",
};
