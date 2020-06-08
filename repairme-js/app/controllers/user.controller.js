const User = require('../models/user.model.js');


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