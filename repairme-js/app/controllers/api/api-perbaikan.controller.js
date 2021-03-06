const Perbaikan = require("../../models/perbaikan.model.js");

exports.newPerbaikan = (req, res) => {
	const perbaikan = new Perbaikan.Perbaikan({
		mitra: req.body.mitra,
		pelanggan: req.body.pelanggan,
		jenis_barang: req.body.jenis_barang,
		merk: req.body.merk,
		tipe: req.body.tipe,
		kerusakan: req.body.kerusakan,
		keterangan_lain: req.body.keterangan_lain,
		tanggal: req.body.tanggal,
		status: "Menunggu Persetujuan",
		harga: null,
		voucher: null
	})

	perbaikan.save();
	res.send("oke");
};

exports.findAllPerbaikan = (req, res) => {
	Perbaikan.Perbaikan.find({}).then((response) => {
		res.send(response);
	});
};

// ========================= PELANGGAN ====================

exports.findPerbaikanPelanggan = (req, res) => {
	Perbaikan.Perbaikan.aggregate(
		[{
				"$match": {
					pelanggan: req.params.id
				}
			},
			{
				"$lookup": {
					from: "mitra",
					localField: "mitra",
					foreignField: "_id",
					as: "data_mitra"
				}
			}
		]
	).then((response) => {
		res.send(response);
	})
}

exports.findPerbaikanPelangganByJenis = (req, res) => {
	Perbaikan.Perbaikan.aggregate(
		[{
				"$match": {
					pelanggan: req.params.email,
					jenis_barang: req.params.jenis
				}
			},
			{
				"$lookup": {
					from: "mitra",
					localField: "mitra",
					foreignField: "_id",
					as: "data_mitra"
				}
			}
		]
	).then((response) => {
		res.send(response);
	})
}

exports.findPerbaikanMitra = (req, res) => {
	Perbaikan.Perbaikan.aggregate(
		[{
				"$match": {
					mitra: req.params.id
				}
			},
			{
				"$lookup": {
					from: "pelanggan",
					localField: "pelanggan",
					foreignField: "_id",
					as: "data_pelanggan"
				}
			}
		]
	).then((response) => {
		res.send(response);
	})
}

exports.findPerbaikanPelangganStatus = (req, res) => {
	Perbaikan.Perbaikan.aggregate(
		[{
				"$match": {
					pelanggan: req.params.email,
					status: req.params.status,
					jenis_barang: req.params.jenis
				}
			},
			{
				"$lookup": {
					from: "mitra",
					localField: "mitra",
					foreignField: "_id",
					as: "data_mitra"
				}
			}
		]
	).then((response) => {
		res.send(response);
	})
}

exports.findPerbaikanMitraStatus = (req, res) => {
	Perbaikan.Perbaikan.aggregate(
		[{
				"$match": {
					mitra: req.params.email,
					status: req.params.status,
					jenis_barang: req.params.jenis
				}
			},
			{
				"$lookup": {
					from: "pelanggan",
					localField: "pelanggan",
					foreignField: "_id",
					as: "data_pelanggan"
				}
			}
		]
	).then((response) => {
		res.send(response);
	})
}

exports.putPerbaikanMitra = (req, res) => {
	if (req.params.keterangan === 'update_status') {
		Perbaikan.Perbaikan.updateMany({
				_id: req.params.id
			}, {
				$set: {
					status: req.body.status,
					harga: req.body.harga,
					keterangan_mitra: req.body.keterangan_lain,
					voucher: req.body.voucher
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
	} else if (req.params.keterangan === 'terima_voucher') {
		Perbaikan.Perbaikan.updateMany({
				_id: req.params.id
			}, {
				$set: {
					status: req.body.status,
					lama_perkiraan: req.body.lama_perkiraan
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
	} else if (req.params.keterangan === 'tambah_harga') {
		Perbaikan.Perbaikan.updateMany({
				_id: req.params.id
			}, {
				$set: {
					status: req.body.status,
					harga: req.body.harga
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
	} else if (req.params.keterangan === 'update_harga') {
		Perbaikan.Perbaikan.updateMany({
				_id: req.params.id
			}, {
				$set: {
					harga: req.body.harga
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
	} else if (req.params.keterangan === 'update_keterangan') {
		Perbaikan.Perbaikan.updateMany({
				_id: req.params.id
			}, {
				$set: {
					keterangan_mitra: req.body.keterangan_mitra
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
	} else if (req.params.keterangan === 'update_status_only') {
		Perbaikan.Perbaikan.updateOne({
				_id: req.params.id
			}, {
				$set: {
					status: req.body.status
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
}

exports.findPerbaikanByVoucher = (req, res) => {
	Perbaikan.Perbaikan.aggregate(
		[{
				"$match": {
					voucher: req.params.voucher
				}
			},
			{
				"$lookup": {
					from: "pelanggan",
					localField: "pelanggan",
					foreignField: "_id",
					as: "data_pelanggan"
				}
			}
		]
	).then((response) => {
		res.send(response);
	})
}