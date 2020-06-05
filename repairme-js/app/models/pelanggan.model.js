const mongoose = require('mongoose');

const PelangganSchema = mongoose.Schema({
    nama: String

}, {
    timestamps: true
});

module.exports = mongoose.model('Pelanggan', PelangganSchema, 'pelanggan');