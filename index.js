const express = require('express')
const port = process.env.PORT || 3000

const app = express()

app.use(express.static('templates'))
app.get('/', (req, res) => {
    res.sendFile('index')
})

app.listen(port, () => {
    console.log(`Listening on port ${port}`)
})