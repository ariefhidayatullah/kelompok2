const mongoose = require('mongoose');

const PerbaikanSchema = mongoose.Schema({
    mitra :String,
    pelanggan:String,
    jenis_barang:String,
    merk:String,
    tipe:String,
    kerusakan:String,
    keterangan_lain:String,
    tanggal:String,
    lama_perkiraan: String,
    status: String,
    harga: String,
    keterangan_lain: String,
    voucher : String,
    keterangan_mitra: String
}, {
    timestamps: true
});

const KeteranganSchema = mongoose.Schema({
    email: String,
    keterangan_lain: String,
}, {
    timestamps: true
});

module.exports = {
	Perbaikan: mongoose.model('Perbaikan', PerbaikanSchema, 'perbaikan'),
    Keterangan: mongoose.model('Keterangan', KeteranganSchema, 'keterangan'),
}
