const Barang = require("../../models/barang.model.js");
const Pakett = require("../../models/paket.model.js");
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

exports.insertPaket = (req, res) => {
    const paket = new Pakett.Paket({
        paket: req.body.paket,
        harga: req.body.harga
    });

    paket
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


exports.insertMerkHp = (req, res) => {
    const merk_hp = new Barang.Merk({
        merk_hp: req.body.merk,
        jenis_hp: req.body.jenis,
    });

    merk_hp
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

exports.insertHp = (req, res, next) => {
    const hp = new Barang.Hp({
        tipe: req.body.tipe_hp,
        merk: req.body.merk_hp,
    });

    hp
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

    res.send('oke');
}


exports.findAllLaptop = (req, res) => {
    Barang.Laptop.find({}).then((response) => {
        res.send(response);
    })
};

exports.findAllHandphone = (req, res) => {
    Barang.Hp.find({}).then((response) => {
        res.send(response);
    })
};

exports.findAllPaket = (req, res) => {
    Pakett.Paket.find({}).then((response) => {
        res.send(response);
    })
};

exports.updateLaptop = (req, res) => {
    Barang.Laptop.findByIdAndUpdate(req.params.id, {
            merk: req.body.merk,
            tipe: req.body.tipe
        }, {
            new: true
        })
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil Diubah!",
            });
        })
        .catch((err) => {
            res.send({
                response: err,
                status: "error",
                message: "Gagal Diubah!",
            });
        });
};

exports.deleteLaptop = (req, res) => {
    console.log(req.params.id)
    Barang.Laptop.findByIdAndRemove(req.params.id)
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil Dihapus!",
            });
        })
        .catch((err) => {
            res.send({
                response: err,
                status: "error",
                message: "Gagal Dihapus!",
            });
        });

};

exports.updateHandphone = (req, res) => {

    Barang.Hp.findByIdAndUpdate(req.params.id, {
            merk: req.body.merk,
            tipe: req.body.tipe
        }, {
            new: true
        })
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil Diubah!",
            });
        })
        .catch((err) => {
            res.send({
                response: err,
                status: "error",
                message: "Gagal Diubah!",
            });
        });
};

exports.deleteHandphone = (req, res) => {
    console.log(req.params.id)
    Barang.Hp.findByIdAndRemove(req.params.id)
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil Dihapus!",
            });
        })
        .catch((err) => {
            res.send({
                response: err,
                status: "error",
                message: "Gagal Dihapus!",
            });
        });

};

exports.updatePaket = (req, res) => {
    Pakett.Paket.findByIdAndUpdate(req.params.id, {
            paket: req.body.paket,
            harga: req.body.harga
        }, {
            new: true
        })
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil Diubah!",
            });
        })
        .catch((err) => {
            res.send({
                response: err,
                status: "error",
                message: "Gagal Diubah!",
            });
        });
};

exports.deletePaket = (req, res) => {
    console.log(req.params.id)
    Pakett.Paket.findByIdAndRemove(req.params.id)
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil Dihapus!",
            });
        })
        .catch((err) => {
            res.send({
                response: err,
                status: "error",
                message: "Gagal Dihapus!",
            });
        });

};

//kerusakan

exports.insertKerusakan = (req, res) => {
    const kerusakan = new Barang.Kerusakan({
        kerusakan: req.body.kerusakan,
        jenis: req.body.jenis
    })
    kerusakan.save()
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

exports.findKerusakan = (req, res) => {
    Barang.Kerusakan.find({
            jenis: req.params.jenis
        })
        .then(response => {
            res.send(response)
        })
}

exports.updateKerusakan = (req, res) => {
    if (req.params.jenis == 'laptop') {
        Barang.Kerusakan.findByIdAndUpdate(req.body.id, {
                kerusakan: req.body.kerusakan,
                jenis: 'laptop'
            }, {
                new: true
            })
            .then((response) => {
                res.send({
                    response: response,
                    status: "success",
                    message: "Berhasil Diubah!",
                });
            })
            .catch((err) => {
                res.send({
                    response: err,
                    status: "error",
                    message: "Gagal Diubah!",
                });
            });
    }
};

exports.deleteKerusakan = (req, res) => {
    Barang.Kerusakan.findByIdAndRemove(req.params.id)
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil Dihapus!",
            });
        })
        .catch((err) => {
            res.send({
                response: err,
                status: "error",
                message: "Gagal Dihapus!",
            });
        });

};

//kerusakan hp

exports.insertKerusakanHp = (req, res) => {
    const kerusakan = new Barang.Kerusakan({
        kerusakan: req.body.kerusakan,
        jenis: req.body.jenis
    })
    kerusakan.save()
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

exports.findKerusakanHp = (req, res) => {
    Barang.Kerusakan.find({
            jenis: req.params.jenis
        })
        .then(response => {
            res.send(response)
        })
}

exports.updateKerusakanHp = (req, res) => {
    if (req.params.jenis == 'handphone') {
        Barang.Kerusakan.findByIdAndUpdate(req.body.id, {
                kerusakan: req.body.kerusakan,
                jenis: 'handphone'
            }, {
                new: true
            })
            .then((response) => {
                res.send({
                    response: response,
                    status: "success",
                    message: "Berhasil Diubah!",
                });
            })
            .catch((err) => {
                res.send({
                    response: err,
                    status: "error",
                    message: "Gagal Diubah!",
                });
            });
    }
};

exports.deleteKerusakanHp = (req, res) => {
    Barang.Kerusakan.findByIdAndRemove(req.params.id)
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil Dihapus!",
            });
        })
        .catch((err) => {
            res.send({
                response: err,
                status: "error",
                message: "Gagal Dihapus!",
            });
        });

};