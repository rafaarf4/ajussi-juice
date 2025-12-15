import { useState, useEffect } from 'react';
import { Link } from 'react-router-dom';
import SidebarAdmin from '../components/SidebarAdmin';

// === IMPORT PDF LIBRARY ===
import { jsPDF } from "jspdf";
import autoTable from "jspdf-autotable";

function Pesanan() {
  const [pesanan, setPesanan] = useState([]);
  const [filtered, setFiltered] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  const [statusFilter, setStatusFilter] = useState('Semua');
  const [bulanFilter, setBulanFilter] = useState('');

  useEffect(() => {
    const fetchPesanan = async () => {
      try {
        const response = await fetch('http://127.0.0.1:8000/api/pesanan');
        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
        const data = await response.json();
        setPesanan(data);
        setFiltered(data);
        setLoading(false);
      } catch (err) {
        setError(err.message);
        setLoading(false);
      }
    };

    fetchPesanan();
  }, []);

  // === FILTER FUNCTION ===
  useEffect(() => {
    let result = [...pesanan];

    if (statusFilter !== 'Semua') {
      result = result.filter((p) => p.status === statusFilter);
    }

    if (bulanFilter !== '') {
      const [tahun, bulan] = bulanFilter.split("-");
      result = result.filter((p) => {
        if (!p.created_at) return false;
        const tanggal = new Date(p.created_at);
        return (
          tanggal.getFullYear() === parseInt(tahun) &&
          tanggal.getMonth() + 1 === parseInt(bulan)
        );
      });
    }

    setFiltered(result);
  }, [statusFilter, bulanFilter, pesanan]);


  // === UPDATE STATUS ===
  const handleStatusChange = async (id, newStatus) => {
    try {
      const response = await fetch(`http://127.0.0.1:8000/api/pesanan/${id}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ status: newStatus }),
      });

      if (!response.ok) throw new Error('Gagal memperbarui status');

      setPesanan((prev) =>
        prev.map((p) => (p.id === id ? { ...p, status: newStatus } : p))
      );
    } catch (err) {
      alert('Gagal memperbarui status: ' + err.message);
    }
  };


  // === DOWNLOAD PDF (MERAH AJUSSI) ===
  const handleDownloadPDF = () => {
    const doc = new jsPDF();

    doc.setFontSize(18);
    doc.setTextColor(214, 48, 49);
    doc.text("Laporan Pesanan Ajussi Juice", 14, 15);

    const tableColumn = ["ID", "User", "Tanggal", "Total Harga", "Status"];
    const tableRows = [];

    filtered.forEach((p) => {
      const row = [
        p.id,
        p.user?.nama ?? "—",
        p.created_at ? new Date(p.created_at).toLocaleString("id-ID") : "-",
        "Rp " + (p.total_harga?.toLocaleString("id-ID") ?? "0"),
        p.status,
      ];
      tableRows.push(row);
    });

    autoTable(doc, {
      head: [tableColumn],
      body: tableRows,
      startY: 25,
      theme: "grid",
      styles: { fontSize: 10 },
      headStyles: {
        fillColor: [214, 48, 49],
        textColor: 255,
        fontSize: 11,
      },
      alternateRowStyles: {
        fillColor: [255, 240, 240]
      }
    });

    doc.save("laporan-pesanan.pdf");
  };


  if (loading) {
    return (
      <div style={{ textAlign: 'center', padding: '3rem', fontSize: '1.2rem' }}>
        Memuat daftar pesanan...
      </div>
    );
  }


  return (
    <div
      style={{
        fontFamily: 'Arial, sans-serif',
        backgroundColor: '#f9f9f9',
        minHeight: '100vh',
        display: 'flex',
      }}
    >
      <SidebarAdmin />

      <div style={{ marginLeft: '250px', padding: '2rem', width: '100%' }}>
        
        {/* JUDUL */}
        <h1 style={{ color: '#e74c3c', fontSize: '1.8rem', fontWeight: 'bold' }}>
            Daftar Pesanan
          </h1>

        {/* FILTER SECTION */}
        <div
          style={{
            background: 'white',
            padding: '1.2rem',
            borderRadius: '12px',
            marginBottom: '1.5rem',
            display: 'flex',
            gap: '1rem',
            alignItems: 'center',
            boxShadow: '0 3px 10px rgba(255,80,80,0.15)',
            border: '1px solid #ffd2d2',
          }}
        >
          
          {/* Filter Status */}
          <select
            value={statusFilter}
            onChange={(e) => setStatusFilter(e.target.value)}
            style={{
              padding: '0.7rem',
              borderRadius: '8px',
              border: '1px solid #ffbaba',
              background: '#fff0f0',
            }}
          >
            <option>Semua</option>
            <option>Menunggu</option>
            <option>Diproses</option>
            <option>Siap Diambil</option>
            <option>Selesai</option>
          </select>

          {/* Filter Bulan */}
          <input
            type="month"
            value={bulanFilter}
            onChange={(e) => setBulanFilter(e.target.value)}
            style={{
              padding: '0.7rem',
              borderRadius: '8px',
              border: '1px solid #ffbaba',
              background: '#fff0f0',
            }}
          />

          {/* Download PDF */}
          <button
            onClick={handleDownloadPDF}
            style={{
              marginLeft: 'auto',
              padding: '0.7rem 1.2rem',
              background: 'linear-gradient(90deg, #d63031, #ff4d4d)',
              color: 'white',
              border: 'none',
              borderRadius: '8px',
              cursor: 'pointer',
              fontWeight: 'bold',
              letterSpacing: '0.5px',
            }}
          >
            Download PDF
          </button>
        </div>

        {/* TABLE */}
        <div
          style={{
            backgroundColor: 'white',
            borderRadius: '12px',
            boxShadow: '0 5px 15px rgba(0,0,0,0.08)',
            overflowX: 'auto',
            border: '1px solid #ffe0e0'
          }}
        >
          <table style={{ width: '100%', borderCollapse: 'collapse' }}>
            <thead>
              <tr style={{ backgroundColor: '#ffecec', textAlign: 'left' }}>
                <th style={{ padding: '1rem' }}>ID</th>
                <th style={{ padding: '1rem' }}>User</th>
                <th style={{ padding: '1rem' }}>Tanggal Pesan</th>
                <th style={{ padding: '1rem' }}>Total Harga</th>
                <th style={{ padding: '1rem' }}>Status</th>
                <th style={{ padding: '1rem' }}>Aksi</th>
              </tr>
            </thead>

            <tbody>
              {filtered.map((p) => (
                <tr key={p.id} style={{ borderBottom: '1px solid #f4caca' }}>
                  <td style={{ padding: '1rem' }}>{p.id}</td>

                  <td style={{ padding: '1rem' }}>
                    {p.user?.nama ?? '—'}
                  </td>

                  <td style={{ padding: '1rem' }}>
                    {p.created_at
                      ? new Date(p.created_at).toLocaleString('id-ID')
                      : '-'}
                  </td>

                  <td style={{ padding: '1rem' }}>
                    Rp {p.total_harga?.toLocaleString('id-ID')}
                  </td>

                  <td style={{ padding: '1rem' }}>
                    <select
                      value={p.status}
                      onChange={(e) => handleStatusChange(p.id, e.target.value)}
                      style={{
                        padding: '0.5rem',
                        borderRadius: '6px',
                        border: '1px solid #ffbaba',
                        background: '#fff0f0',
                      }}
                    >
                      <option>Menunggu</option>
                      <option>Diproses</option>
                      <option>Siap Diambil</option>
                      <option>Selesai</option>
                    </select>
                  </td>

                  <td style={{ padding: '1rem' }}>
                    <Link
                      to={`/pesanan/detail/${p.id}`}
                      style={{
                        color: '#d63031',
                        fontWeight: 'bold',
                      }}
                    >
                      Detail
                    </Link>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>

        <footer
          style={{
            marginTop: '2rem',
            textAlign: 'center',
            color: '#777',
            fontSize: '14px',
          }}
        >
          © {new Date().getFullYear()} Ajussi Juice — UMKM Lokal Indonesia
        </footer>
      </div>
    </div>
  );
}

export default Pesanan;
