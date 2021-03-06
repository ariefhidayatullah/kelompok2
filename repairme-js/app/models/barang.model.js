const mongoose = require('mongoose');

const MerkSchema = mongoose.Schema({
    merk: String,
    jenis: String
}, {
    timestamps: true
});

const LaptopSchema = mongoose.Schema({
    tipe: String,
    merk: String,
    keterangan: String
}, {
    timestamps: true
});

const HpSchema = mongoose.Schema({
    tipe: String,
    merk: String,
    keterangan_hp: String
}, {
    timestamps: true
});

const KerusakanSchema = mongoose.Schema({
    kerusakan: String,
    jenis: String,
}, {
    timestamps: true
});

module.exports = {
    Merk: mongoose.model('Merk', MerkSchema, 'merk_barang'),
    Laptop: mongoose.model('Laptop', LaptopSchema, 'laptop'),
    Hp: mongoose.model('Hp', HpSchema, 'hp'),
    Kerusakan: mongoose.model('Kerusakan', KerusakanSchema, 'kerusakan'),
}