const mongoose = require('mongoose');

const PerbaikanSchema = mongoose.Schema({
    mitra :String,
    pelanggan:String,
    jenis_barang:String,
    merk:String,
    tipe:String,
    kerusakan:String,
    keterangan_lain:String,
    tanggal:String
}, {
    timestamps: true
});

module.exports = {
	Perbaikan: mongoose.model('Perbaikan', PerbaikanSchema, 'perbaikan'),
}
