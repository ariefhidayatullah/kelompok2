const Perbaikan = require("../../models/perbaikan.model.js");

exports.newPerbaikan = (req, res) => {
	const perbaikan = new Perbaikan.Perbaikan({
		mitra :req.body.mitra,
	    pelanggan:req.body.pelanggan,
	    jenis_barang:req.body.jenis_barang,
	    merk:req.body.merk,
	    tipe:req.body.tipe,
	    kerusakan:req.body.kerusakan,
	    keterangan_lain:req.body.keterangan_lain,
	    tanggal:req.body.tanggal
	})

	perbaikan.save();
	res.send('oke');
}

exports.findAllPerbaikan = (req, res) => {
	Perbaikan.Perbaikan.find({}).then(response => {
		res.send(response);
	})
}

