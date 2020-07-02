const Notifikasi = require("../../models/notifikasi.model.js");

exports.findAll = (req, res) => {
    Notifikasi.find({}).then(response => {
    	res.send(response)
    })
};

exports.findByPerbaikan = (req, res) => {
	Notifikasi.find({perbaikan: req.params.id})
	.then(response => {
		res.send(response)
	})
}

exports.findByPerbaikanStatus = (req, res) => {
	Notifikasi.find({perbaikan: req.params.id, dibaca: req.params.status, jenis: req.params.keterangan})
	.then(response => {
		res.send(response)
	})
}

exports.findByIdUser = (req, res) => {
	if (req.params.jenis === 'mitra') {
		Notifikasi.find({mitra: req.params.id})
		.then(response => {
			res.send(response)
		})
	}else if (req.params.jenis === 'pelanggan') {
		Notifikasi.find({pelanggan: req.params.id})
		.then(response => {
			res.send(response)
		})	
	}
}

exports.findByStatus = (req, res) => {
	if (req.params.jenis === 'mitra') {
		Notifikasi.find({mitra: req.params.id, dibaca: req.params.status})
		.then(response => {
			res.send(response)
		})
	}else if (req.params.jenis === 'pelanggan') {
		Notifikasi.find({pelanggan: req.params.id, dibaca: req.params.status})
		.then(response => {
			res.send(response)
		})	
	}
}

exports.newNotifikasi = (req, res) => {
	const notif = new Notifikasi({
		mitra: req.body.mitra,
	    pelanggan: req.body.pelanggan,
	    perbaikan: req.body.perbaikan,
	    jenis: req.body.jenis,
	    keterangan: req.body.keterangan,
	    keterangan_mitra: req.body.keterangan_mitra,
	    dibaca: 't',
	    tanggal: req.body.tanggal,
	    barang: req.body.barang
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

exports.newNotifikasiPelanggan = (req, res) => {
	const notif = new Notifikasi({
		mitra: req.body.mitra,
	    pelanggan: req.body.pelanggan,
	    perbaikan: req.body.perbaikan,
	    jenis: req.body.jenis,
	    keterangan: req.body.keterangan,
	    dibaca: 't',
	    tanggal: req.body.tanggal,
	    barang: req.body.barang
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

exports.changeStatus = (req, res) => {
	Notifikasi.updateMany({_id : req.params.id}, { $set: {
			dibaca: 'y'
		}
		}).then((response) => {
	        res.send({
	            response: response,
	            status: "success",
	            message: "Berhasil",
	        });
	    })
	    .catch((err) => {
	        res.send({
	            response: err,
	            status: "error",
	            message: "Gagal!",
	        });
	    });
}