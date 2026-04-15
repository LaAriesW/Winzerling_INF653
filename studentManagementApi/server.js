require('dotenv').config()
const express = require('express'); 
const port = process.env.PORT;
const mongoose = require('mongoose');
const studentRoutes = require('./routes/routes')

const app = express();


app.use(express.json());

app.use('/students', studentRoutes);


mongoose.connect(process.env.MongoDB)
    .then(() =>{
      app.listen(port, (() => {
        console.log(`Server is running at http://localhost:${port}`);
      }));  
    })
    