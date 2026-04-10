//Import express module 
const express = require('express');
//create an instance of the express application 
const app = express();
const path = require('path')
const errorHandler = require('./middleware/errorHandler')
const { logger } = require('./middleware/logger')
const PORT = 3000;


app.use(express.json());
app.use('./assets',express.static(path.join(__dirname, "/assets")));
app.use('./data', express.static(path.join(__dirname, "/data")));

app.get(['/', '/index.html'], (req, res) => {
    res.sendFile(path.join(__dirname, "views", "index.html"))
})

app.get('/about.html', (req,res) =>{
    res.sendFile(path.join(__dirname, "about.html"));
})

app.get('/user/:userID/book/:bookID', (req, res)=>{
    const {userID, bookID} = req.params;
    res.send(`user ID: ${userID}, book ID: ${bookID}`)
})

app.get('/user/{:id}', (req, res) => {
    const userId = req.params.id || 'No ID Provided';
    res.send(`User ID: ${userId}`);
});

app.get('/old-page', (req,res)=>{
    res.redirect(301, '/new-page')
})

app.get('/new-page', (req, res)=>{
    res.sendFile(path.join(__dirname, "views", "new-page.html"))
})

app.get('/multi', (req,res,next) => {
    console.log('first Handler executed');
    req.data = 'Data from first handler';
    next();
}, (req,res,next) => {
    console.log('second Handler executed');
    req.data = 'Data from second handler';
    next();
}, (req,res) => {
    console.log('third Handler executed');
   res.send(`final response ${req.data}`)
})

app.get('/errortest.html', (req,res,next)=>{
    const err = new Error('This is an intentional test error');
    err.name = 'TestError';
    next(err);
})

app.get("/*splat", (req,res)=>{
    res.sendFile(path.join(__dirname, "404.html"))
})

app.use(errorHandler)



app.listen(PORT, ()=>{
    console.log(`Server is running on http://localhost:${PORT}`)
})