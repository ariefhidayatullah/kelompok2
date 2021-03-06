const mongoose = require('mongoose');

const MitraSchema = mongoose.Schema({
    _id: String,
    nama: String,
    no_tlp: String,
    jenis_usaha: String,
    nama_usaha: String,
    alamat: String,
    lat: String,
    lng: String,
    foto_ktp: String,
    foto_usaha: String,
    verifikasi: String,
    deskripsi: String,
    rating: Number

}, {
    timestamps: true
});

module.exports = {
    Mitra: mongoose.model('Mitra', MitraSchema, 'mitra')
};