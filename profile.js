const express = require("express");
const bodyParser = require("body-parser");
const mongoose = require("mongoose");
const path = require("path");

const app = express();

app.use(bodyParser.json());

app.use(express.static(path.join(__dirname, 'profile')));

app.use(bodyParser.urlencoded({
    extended: true
}));

mongoose.connect('mongodb://localhost:27017/mydb', {
    useNewUrlParser: true,
    useUnifiedTopology: true
});

const db = mongoose.connection;

db.on('error', () => console.log("Error in Connecting to Database"));
db.once('open', () => console.log("Connected to Database"));

app.post("/sign_up", (req, res) => {
    const name = req.body.name;
    const email = req.body.email;
    const contact = req.body.contact;
    const pincode = req.body.pincode;
    const country = req.body.country;
    const state = req.body.state;
    const address1 = req.body.address1;
    const dob = req.body.dob;
    const gender = req.body.gender;
    const age = req.body.age;

    const data = {
        "name": name,
        "email": email,
        "contact": contact,
        "pincode": pincode,
        "country": country,
        "state": state,
        "address1": address1,
        "dob": dob,
        "gender": gender,
        "age": age,
    };

    db.collection('users').insertOne(data, (err, collection) => {
        if (err) {
            throw err;
        }
        console.log("Record Inserted Successfully");
        res.json({ success: true, message: "Record Inserted Successfully" });
    });
});

app.get("/", (req, res) => {
    res.set({
        "Allow-access-Allow-Origin": '*'
    });
    
    res.sendFile(path.join(__dirname, 'profile.html'));
});

app.listen(3000, () => {
    console.log("Listening on PORT 3000");
});
