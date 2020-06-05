const mongoose = require('mongoose');

const MitraSchema = mongoose.Schema({
    nama: String,
    nama_usaha: String,

}, {
    timestamps: true
});

module.exports = mongoose.model('Mitra', MitraSchema, 'mitra');