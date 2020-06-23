const mongoose = require('mongoose');

const PelangganSchema = mongoose.Schema({
    _id: String,
    nama: String,
    no_tlp: String,
    alamat: String,
    foto_profile: String
}, {
    timestamps: true
});

module.exports = mongoose.model('Pelanggan', PelangganSchema, 'pelanggan');