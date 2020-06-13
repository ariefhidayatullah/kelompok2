const Barang = require("../../models/barang.model.js");
const {
    response
} = require("express");

exports.insertMerk = (req, res) => {
    const merk = new Barang.Merk({
        merk: req.body.merk,
        jenis: req.body.jenis,
    });

    merk
        .save()
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil Ditambahkan",
            });
        })
        .catch((err) => {
            res.send({
                response: err,
                status: "error",
                message: "Gagal Menambahkan!",
            });
        });
};

exports.insertLaptop = (req, res, next) => {
    const laptop = new Barang.Laptop({
        tipe: req.body.tipe,
        merk: req.body.merk,
    });

    laptop
        .save()
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil Menambahkan!",
            });
        })
        .catch((err) => {
            req.flash("error", "Gagal Menambahkan!");
        });
};

exports.findMerkByJenis = (req, res) => {
    Barang.Merk.find({
            jenis: req.params.jenis,
        })
        .then((barang) => {
            res.send(barang);
        })
        .catch((err) => {
            res.send(err);
        });
};

exports.findAll = (req, res) => {
<<<<<<< HEAD
    res.send('oke');
}

//kerusakan

exports.insertKerusakan = (req, res) => {
    if (req.params.jenis === 'laptop') {
        console.log(req.body);
    }   
}
=======
    res.send("oke");
};

exports.findAllLaptop = (req, res) => {
    Barang.Laptop.find({}).then((response) => {
        res.send(response);
    })
};

exports.updateLaptop = (req, res) => {

    console.log(req.body);
    Barang.Laptop.update({
        _id: req.body._id
    }, {
        tipe: req.body.tipe,
        merk: req.body.merk
    }, {
        new: true
    })
};
>>>>>>> caa07e5ef6fcc48e236bb471819a3c8c57e5813b
