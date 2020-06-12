const Barang = require('../../models/barang.model.js');

exports.insertMerk = (req, res) => {
    const merk = new Barang.Merk({
        merk: req.body.merk,
        jenis: req.body.jenis
    })

    merk.save()
    .then(response => {
        res.send({
            response: response,
            status: "success",
            message: "Berhasil Ditambahkan"
        });
    }).catch(err => {
        res.send({
            response: err,
            status: "error",
            message: "Gagal Menambahkan!"
        });
    });
}

exports.insertLaptop = (req, res, next) => {
    const laptop = new Barang.Laptop({
        tipe: req.body.tipe,
        merk: req.body.merk
    })

    laptop.save()
    .then(response => {
        console.log(response);
        req.flash('success', "Berhasil Menambahkan!");
    }).catch(err => {
        req.flash('error', "Gagal Menambahkan!");
    });
}

exports.findMerkByJenis = (req, res) => {
    Barang.Merk.find({jenis: req.params.jenis})
    .then(barang => {
        res.send(barang);
    }).catch(err => {
        res.send(err);
    });
}

exports.findAll = (req, res) => {
    res.send('oke');
}