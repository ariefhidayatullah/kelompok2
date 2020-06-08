const Mitra = require('../../models/mitra.model.js');
const User = require('../../models/user.model.js');
const bcrypt = require('bcryptjs');


// ========== API ==========
//storage upload


exports.create = (req, res, next) => {

    console.log(req.body);

    // Data Mitra
    const mitra = new Mitra({
        _id: req.body.email,
        nama : req.body.nama,
        no_tlp: req.body.no_tlp,
        jenis_usaha: req.body.jenis_usaha,
        nama_usaha: req.body.nama_usaha,
        alamat: req.body.alamat,
        lat : req.body.lat, 
        lng : req.body.lng,
        foto_ktp: req.body.foto_ktp,
        foto_usaha: req.body.foto_usaha,
        verifikasi: 'Belum Terverifikasi'
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

};

// Cari semua data
exports.findAll = (req, res) => {
    Mitra.find()
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
    Mitra.find({},{_id: 1})
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
    Mitra.findById(req.params.mitraId)
    .then(mitra => {
        if(!mitra) {
            return res.status(404).send({
                message: "Mitra tidak ditemukan dengan id " + req.params.mitraId
            });            
        }
        res.send(mitra);
    }).catch(err => {
        if(err.kind === 'ObjectId') {
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
    Mitra.findByIdAndUpdate(req.params.mitraId, {
        nama: req.body.nama,
        nama_usaha: req.body.nama_usaha
    }, {new: true})
    .then(mitra => {
        if(!mitra) {
            return res.status(404).send({
                message: "Mitra tidak ditemukan dengan id " + req.params.mitraId
            });
        }
        res.send(mitra);
    }).catch(err => {
        if(err.kind === 'ObjectId') {
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
    Mitra.findByIdAndRemove(req.params.mitraId)
    .then(mitra => {
        if(!mitra) {
            return res.status(404).send({
                message: "Mitra not found with id " + req.params.mitraId
            });
        }
        res.send({message: "Mitra deleted successfully!"});
    }).catch(err => {
        if(err.kind === 'ObjectId' || err.name === 'NotFound') {
            return res.status(404).send({
                message: "Mitra not found with id " + req.params.mitraId
            });                
        }
        return res.status(500).send({
            message: "Could not delete mitra with id " + req.params.mitraId
        });
    });
};