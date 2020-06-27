const User = require('../models/user.model.js');
const Mitra = require('../models/mitra.model.js');
const bcrypt = require('bcryptjs');

exports.findAllEmail = (req, res) => {
	User.find({}, {email:1})
	.then(data => {
		res.send(data)
	}).catch(err => {
		res.status(500).send({
			message: err.message || "Server repairme error."
		})
	})	
}

exports.auth = (req, res) => {
	User.find({email: req.body.email.toLowerCase()})
	.then(result => {
		if (result.length > 0) {
			bcrypt.compare(req.body.password, result[0].password)
			.then((response) => {
				if (response) {
					if(result[0].jenis === "admin"){
						req.session.user = {
							"email": result[0].email,
							"jenis": result[0].jenis
						}
						res.redirect('/admin');
					}else if(result[0].jenis === "mitra"){
						req.session.user = {
							"email": result[0].email,
							"jenis": result[0].jenis
						}
						res.redirect('/mitra');
					}else if(result[0].jenis === "pelanggan"){
						req.session.user = {
							"email": result[0].email,
							"jenis": result[0].jenis,
						}
						res.redirect('/pelanggan');
					}
				}else{
					req.flash('message', "Password yang anda masukkan salah!");
					res.redirect('/login');
				} 
			})
		}else{
			req.flash('message', "Email tidak terdafar!");
			res.redirect('/login');
		}
	}).catch(err => {
		res.status(500).send({
			message: err.message || "Server repairme error."
		})
		res.status(404).send({
			message: "Akun tidak terdaftar!"
		})
	})	
}