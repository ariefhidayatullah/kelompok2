const mongoose = require('mongoose');

const NotifikasiSchema = mongoose.Schema({
    mitra: String,
    pelanggan: String,
    perbaikan: String,
    jenis: String,
    keterangan: String,
    keterangan_mitra: String
}, {
    timestamps: true
});

module.exports = mongoose.model('Notifikasi', NotifikasiSchema, 'notifikasi')