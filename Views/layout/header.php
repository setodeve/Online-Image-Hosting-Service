<!doctype html>
<html lang="en">
<head id="head-snipet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/003ee0b599.js" crossorigin="anonymous"></script>
    <link rel="icon" href="./favicon.ico" type="image/x-icon">
    <title>Snipet Service</title>
</head>
<body>
<main class="container mt-5 mb-5">
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #fff;
  margin: 0;
  padding: 0;
}
header {
  background-color: #ffcc00;
  padding: 10px;
  color: #fff;
  font-size: larger;
}

footer {
  text-align: center;
  font-weight: bold;
  color: #848484;
}
.container {
  padding: 20px;
}
label{
    font-size: large;
    font-weight: bold;
    color: #848484;
}
input[type="text"] {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: 2px solid #ddd;
  box-sizing: border-box;
}
button {
  background-color: #ffcc00;
  color: #fff;
  padding: 10px 20px;
  border: none;
  cursor: pointer;
  font-weight: bold;
  margin-top: 10px;
}

.snipet-container{
  font-size: large;
  font-weight: bold;
  color: #848484;
  margin-top: 10px;
  .snipet-data{
    margin-left: 10px;
  }
}
.snippet-list {
  padding-left: 10px;
  padding-top: 10px;
  margin-top: 20px;
  border-top: 1px solid lightgray;
  h3 {
    color: #ffcc00;
  }
  h5{
    padding: 10px 0;
    color: #848484;
  }
}

#input-container {
  width: 100%;
  /* padding: 30px ; */
  margin: 10px 0;
  height: 500px;
  border: 2px solid #ddd;
  box-sizing: border-box;
}

.snipets-container{
  display: flex;
  flex-wrap: wrap;

}

.snipet-item:hover{
  color: #797253;
}
.snipet-item{
  width: 45%;
  height: 30%;
  background-color: #f0ebe9;
  color: black;
  padding: 10px;
  margin: 1% 2%;
  text-decoration: none;
}

.no-exist{
  text-align: center;
  h2 {
    padding: 20px;
  }
}

.not-found{
  text-align: center;
  h2 {
    padding: 20px;
  }
}

i {
  color:white;
  font-size: larger;
  font-weight: bolder;
  margin-left: 5px;
}
</style>

<header>
  <div>
    <a href="/"><i class="fa-solid fa-plus"></i></a>
    <a href="snipets"><i class="fa-solid fa-list"></i></a>
  </div>
</header>