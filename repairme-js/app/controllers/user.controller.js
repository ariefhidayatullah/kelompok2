const bcrypt = require('bcryptjs');
const User = require('../models/user.model.js');
const jwt = require('jsonwebtoken')

exports.create = (req, res) => {
	const user = new User({
        email: req.body.email
    });
    
    // let hash = bcrypt.hashSync(user.email);

    let token = jwt.sign({_id: user._id, email: user.email}, "secret")
    
    res.send(token);
}