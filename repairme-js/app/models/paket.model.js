const mongoose = require('mongoose');

const PaketSchema = mongoose.Schema({
    paket: String,
    harga: String
}, {
    timestamps: true
});

const VerifikasiSchema = mongoose.Schema({
    nama_paket: String,
    bukti_pembayaran: String,
    email: String,
    status: String
}, {
    timestamps: true
});

module.exports = {
    Paket: mongoose.model('Paket', PaketSchema, 'paket'),
    Verifikasi: mongoose.model('Verifikasi', VerifikasiSchema, 'verifikasi')
};