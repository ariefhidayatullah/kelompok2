const Notifikasi = require("../../models/notifikasi.model.js");

exports.findAll = (req, res) => {
    Notifikasi.find({}).then(response => {
    	res.send(response)
    })
};

exports.newNotifikasi = (req, res) => {
	const notif = new Notifikasi({
		mitra: req.body.mitra,
	    pelanggan: req.body.pelanggan,
	    perbaikan: req.body.pelanggan,
	    jenis: req.body.jenis,
	    keterangan: req.body.keterangan,
	    keterangan_mitra: req.body.keterangan_mitra
	})

	notif.save()
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
}