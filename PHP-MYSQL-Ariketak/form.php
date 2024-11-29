<html>
<style>
  
    button{
        border: green solid 1px;
        border-radius: 9rem;
        background-color: green;
        color: white;
        height: 30px;
        width: 80px;
        cursor: pointer;
        margin-top: 10px;
    }
    body{
        position: absolute;
        left: 40%;
    }
</style>
<body>

    <h1>Etxebizitzak gehitu</h1>

    <form action="insert.php" method="POST" enctype="multipart/form-data">
        <label for="mota">Mota:</label>
        <select id="mota" name="mota">
            <option value="pisua" selected>Pisua</option>
            <option value="Txaleta" >Txalet</option>
            <option value="Etxea" >Etxea</option>
        </select><br>

        <label for="zonaldea">Zonaldea:</label>
        <select id="zonaldea" name="zonaldea">
            <option value="Alde zaharra">Alde zaharra</option>
            <option value="Deustu">Deustu</option>
            <option value="Atxuri">Atxuri</option>
            <option value="Miribilla">Miribill</option>
            <option value="Basurto">Basurto</option>
        </select><br>

        <label for="helbidea">Helbidea:</label>
        <input type="text" id="helbidea" name="helbidea" required><br>

        <label for="logelak">Logelak:</label>
        <input type="radio" id="logelak1" name="logelak" value="1"> 1
        <input type="radio" id="logelak2" name="logelak" value="2"> 2
        <input type="radio" id="logelak3" name="logelak" value="3" checked> 3
        <input type="radio" id="logelak4" name="logelak" value="4"> 4
        <input type="radio" id="logelak5" name="logelak" value="5"> 5<br>

        <label for="prezioa">Prezioa:</label>
        <input type="number" id="prezioa" name="prezioa" step="any" required><br>

        <label for="tamaina">Tamaina:</label>
        <input type="number" id="tamaina" name="tamaina" required><br>

        <label>Extrak:</label>
        <select name="extrak">
            <option value="Igerilekua" selected>Igerilekua</option>
            <option value="Lorategia" selected>Lorategia</option>
            <option value="Garajea" selected>Garajea</option>
        </select><br>

        <label for="irudia">Irudia:</label>
        <input type="file" name="irudia" id="irudia" accept="img/*"><br>

        <label for="oharrak">Oharrak:</label><br>
        <textarea id="oharrak" name="oharra" rows="4" cols="50"></textarea><br>

        <button type="submit">Bidali</button>
    </form>
    <a href="index.php">[ Zerrendara itzuli ]</a>
</body>

</html>