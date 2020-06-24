const Pelanggan = require('../../models/pelanggan.model.js');
const User = require('../../models/user.model.js');
const bcrypt = require('bcryptjs');

// ========== API ==========

exports.create = (req, res) => {

    // Create a pelanggan
    const pelanggan = new Pelanggan.Pelanggan({
        _id: req.body.email,
        nama: req.body.nama,
        no_tlp: req.body.no_tlp,
        alamat: req.body.alamat,
        foto_profile: 'pelanggan.png'
    });

    //data login
    const user = new User({
        email: req.body.email,
        password: bcrypt.hashSync(req.body.password),
        jenis: "pelanggan"
    })

    // Save pelanggan in the database
    user.save()
    pelanggan.save()

};

// Retrieve and return all notes from the database.
exports.findAll = (req, res) => {
    Pelanggan.find()
        .then(notes => {
            res.send(notes);
        }).catch(err => {
            res.status(500).send({
                message: err.message || "Some error occurred while retrieving notes."
            });
        });
};

// Find a single note with a noteId
exports.findOne = (req, res) => {
    Pelanggan.findById(req.params.noteId)
        .then(note => {
            if (!note) {
                return res.status(404).send({
                    message: "Pelanggan not found with id " + req.params.noteId
                });
            }
            res.send(note);
        }).catch(err => {
            if (err.kind === 'ObjectId') {
                return res.status(404).send({
                    message: "Pelanggan not found with id " + req.params.noteId
                });
            }
            return res.status(500).send({
                message: "Error retrieving note with id " + req.params.noteId
            });
        });
};

// Update a note identified by the noteId in the request
exports.update = (req, res) => {
    // Validate Request
    if (!req.body.content) {
        return res.status(400).send({
            message: "Pelanggan content can not be empty"
        });
    }

    // Find note and update it with the request body
    Pelanggan.findByIdAndUpdate(req.params.noteId, {
            title: req.body.title || "Untitled Pelanggan",
            content: req.body.content
        }, {
            new: true
        })
        .then(note => {
            if (!note) {
                return res.status(404).send({
                    message: "Pelanggan not found with id " + req.params.noteId
                });
            }
            res.send(note);
        }).catch(err => {
            if (err.kind === 'ObjectId') {
                return res.status(404).send({
                    message: "Pelanggan not found with id " + req.params.noteId
                });
            }
            return res.status(500).send({
                message: "Error updating note with id " + req.params.noteId
            });
        });
};

// Delete a note with the specified noteId in the request
exports.delete = (req, res) => {
    Pelanggan.findByIdAndRemove(req.params.noteId)
        .then(note => {
            if (!note) {
                return res.status(404).send({
                    message: "Pelanggan not found with id " + req.params.noteId
                });
            }
            res.send({
                message: "Pelanggan deleted successfully!"
            });
        }).catch(err => {
            if (err.kind === 'ObjectId' || err.name === 'NotFound') {
                return res.status(404).send({
                    message: "Pelanggan not found with id " + req.params.noteId
                });
            }
            return res.status(500).send({
                message: "Could not delete note with id " + req.params.noteId
            });
        });
};