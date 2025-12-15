import React from 'react';
import ReactDOM from 'react-dom/client';
import { BrowserRouter, Routes, Route } from 'react-router-dom';
import { QueryClient, QueryClientProvider } from '@tanstack/react-query';

import ProtectedRoute from './components/ProtectedRoute';

import App from './App';
import Login from './pages/Login';
import Register from './pages/Register';
import Katalog from './pages/Katalog';
import DashboardAdmin from './pages/DashboardAdmin';
import Produk from './pages/Produk';
import TambahProduk from './pages/TambahProduk';
import EditProduk from './pages/EditProduk';
import Pesanan from './pages/Pesanan';
import DetailPesanan from './pages/DetailPesanan';
import User from './pages/User';
import Keranjang from './pages/Keranjang';
import Payment from './pages/Payment';
import PesananUser from './pages/PesananUser';

import './index.css';

const queryClient = new QueryClient();

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <QueryClientProvider client={queryClient}>
      <BrowserRouter>
        <Routes>

          {/* HOME */}
          <Route path="/" element={<App />} />

          {/* AUTH */}
          <Route path="/login" element={<Login />} />
          <Route path="/register" element={<Register />} />

          {/* USER PROTECTED ROUTE */}
          <Route
            path="/keranjang"
            element={
              <ProtectedRoute>
                <Keranjang />
              </ProtectedRoute>
            }
          />

          <Route
            path="/payment/:id"
            element={
              <ProtectedRoute>
                <Payment />
              </ProtectedRoute>
            }
          />

          <Route
            path="/pesanan-user"
            element={
              <ProtectedRoute>
                <PesananUser />
              </ProtectedRoute>
            }
          />

          {/* ADMIN AREA */}
          <Route
            path="/dashboard"
            element={
              <ProtectedRoute>
                <DashboardAdmin />
              </ProtectedRoute>
            }
          />

          <Route
            path="/produk"
            element={
              <ProtectedRoute>
                <Produk />
              </ProtectedRoute>
            }
          />

          <Route
            path="/produk/tambah"
            element={
              <ProtectedRoute>
                <TambahProduk />
              </ProtectedRoute>
            }
          />

          <Route
            path="/produk/edit/:id"
            element={
              <ProtectedRoute>
                <EditProduk />
              </ProtectedRoute>
            }
          />

          <Route
            path="/pesanan"
            element={
              <ProtectedRoute>
                <Pesanan />
              </ProtectedRoute>
            }
          />

          <Route
            path="/pesanan/detail/:id"
            element={
              <ProtectedRoute>
                <DetailPesanan />
              </ProtectedRoute>
            }
          />

          <Route
            path="/user"
            element={
              <ProtectedRoute>
                <User />
              </ProtectedRoute>
            }
          />

          {/* LAINNYA */}
          <Route path="/katalog" element={<Katalog />} />

        </Routes>
      </BrowserRouter>
    </QueryClientProvider>
  </React.StrictMode>,
);
