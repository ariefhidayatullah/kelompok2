const mongoose = require('mongoose');

const NotifikasiSchema = mongoose.Schema({
    mitra: String,
    pelanggan: String,
    perbaikan: String,
    untuk: String,
    jenis: String,
    keterangan: String,
    keterangan_mitra: String,
    dibaca: String,
    tanggal: String,
    barang: String
}, {
    timestamps: true
});

module.exports = mongoose.model('Notifikasi', NotifikasiSchema, 'notifikasi')