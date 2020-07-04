const Mitra = require('../../models/mitra.model.js');
const Paket = require('../../models/paket.model.js');
const User = require('../../models/user.model.js');
const bcrypt = require('bcryptjs');

exports.create = (req, res, next) => {

    // Data Mitra
    const mitra = new Mitra.Mitra({
        _id: req.body.email,
        nama: req.body.nama,
        no_tlp: req.body.no_tlp,
        jenis_usaha: req.body.jenis_usaha,
        nama_usaha: req.body.nama_usaha,
        alamat: req.body.alamat,
        lat: req.body.lat,
        lng: req.body.lng,
        foto_ktp: req.body.foto_ktp,
        foto_usaha: req.body.foto_usaha,
        verifikasi: 'Belum Terverifikasi',
        deskripsi: '',
        rating: 0

    });

    //data login
    const user = new User({
        email: req.body.email,
        password: bcrypt.hashSync(req.body.password),
        jenis: "mitra"
    })

    //save ke database
    user.save()
    mitra.save()

    res.redirect('/login');
};

// Cari semua data
exports.findAll = (req, res) => {
    Mitra.Mitra.find()
        .then(mitra => {
            res.send(mitra);
        }).catch(err => {
            res.status(500).send({
                message: err.message || "Some error occurred while retrieving mitra."
            });
        });
};

//cari email
exports.findEmail = (req, res) => {
    Mitra.Mitra.find({}, {
            _id: 1
        })
        .then(mitra => {
            res.send(mitra);
        }).catch(err => {
            res.status(500).send({
                message: err.message || "Server repairme error."
            });
        });
};

//cari email
exports.findUser = (req, res) => {
    User.findOne({
            email: req.params.id
        })
        .then(mitra => {
            res.send(mitra);
        }).catch(err => {
            res.status(500).send({
                message: err.message || "Server repairme error."
            });
        });
};

// Cari Mitra Berdasarkan ID
exports.findOne = (req, res) => {
    Mitra.Mitra.findById(req.params.mitraId)
        .then(mitra => {
            if (!mitra) {
                return res.status(404).send({
                    message: "Mitra tidak ditemukan dengan id " + req.params.mitraId
                });
            }
            res.send(mitra);
        }).catch(err => {
            if (err.kind === 'ObjectId') {
                return res.status(404).send({
                    message: "Mitra tidak ditemukan dengan id " + req.params.mitraId
                });
            }
            return res.status(500).send({
                message: "error 500, server ditolak dengan id" + req.params.mitraId
            });
        });
};

// Update Mitra
exports.update = (req, res) => {
    Mitra.Mitra.findByIdAndUpdate(req.params.mitraId, {
            nama: req.body.nama,
            nama_usaha: req.body.nama_usaha
        }, {
            new: true
        })
        .then(mitra => {
            if (!mitra) {
                return res.status(404).send({
                    message: "Mitra tidak ditemukan dengan id " + req.params.mitraId
                });
            }
            res.send(mitra);
        }).catch(err => {
            if (err.kind === 'ObjectId') {
                return res.status(404).send({
                    message: "Mitra tidak ditemukan dengan id " + req.params.mitraId
                });
            }
            return res.status(500).send({
                message: "Error update mitra dengan id " + req.params.mitraId
            });
        });
};

// Delete a mitra with the specified mitraId in the request
exports.delete = (req, res) => {
    Mitra.Mitra.deleteOne({_id: req.params.mitraId})
        .then((response) => {
            res.send({
                response: response,
                status: "success",
                message: "Berhasil!",
            });
        })
        .catch(err => {
            res.send({
                response: err,
                status: "error",
                message: "Gagal!",
            });
        })
          
};

exports.insertBukti = (req, res, next) => {
    const paket = new Paket.Verifikasi({
        nama_paket: req.body.nama_paket,
        bukti_pembayaran: req.body.bukti_pembayaran,
        email: req.body.email,
        status: "Belum Terverifikasi"
    });

    paket
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

// Cari semua Bukti
exports.findBukti = (req, res) => {
    Paket.Verifikasi.aggregate(
        [{
                "$match": {
                    status: "Belum Terverifikasi"
                }
            },
            {
                "$lookup": {
                    from: "mitra",
                    localField: "email",
                    foreignField: "_id",
                    as: "data_mitra"
                }
            }
        ]
    ).then((response) => {
        res.send(response);
    })
}

exports.terverifikasi = (req, res, next) => {
    Paket.Verifikasi.updateMany({
            email: req.params.email
        }, {
            $set: {
                status: "Terverifikasi"
            }
        })
        .then(() => {
            Mitra.Mitra.updateMany({
                    _id: req.params.email
                }, {
                    $set: {
                        verifikasi: "Terverifikasi"
                    }
                })
                .then((response) => {
                    res.send({
                        response: response,
                        status: "success",
                        message: "Berhasil Terverifikasi!",
                    });
                })
                .catch((err) => {
                    req.flash("error", "Gagal!");
                });
        })


}