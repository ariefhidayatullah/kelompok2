const bcrypt = require('bcryptjs');
const User = require('../models/user.model.js');

exports.create = (req, res) => {
	const user = new User({
        email: req.body.email
    });
    res.send(user);
}