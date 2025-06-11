<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Insert people into the database here</h1>

    <?php
    $host = "localhost";
    $username = "root";
    $psw = "";
    $dbName = "ppl_countries";

    //step 1
    $connection = mysqli_Connect($host, $username, $psw, $dbName);

    if (isset($_POST["Countryoforigin"], $_POST["firstName"], $_POST["lastname"], $_POST["age"], $_POST["personid"])) {
        if ($_POST["personid"]) {
            $sqlinsert = $connection->prepare("insert into ppl(countryId,firstname,lastname,age) values (?,?,?,?);");
            $sqlinsert->bind_param("issi", $_POST["Countryoforigin"], $_POST["firstName"], $_POST["lastname"], $_POST["age"]);
            $sqlinsert->execute();
        } else {
            $sqlupdate = $connection->prepare("update ppl set countryid=?, firstname = ?, lastname= ?, age= ? where personid =?");
            $sqlupdate->bind_param("issii", $_POST["Countryoforigin"], $_POST["firstName"], $_POST["lastname"], $_POST["age"], $_POST["personid"]);
            $sqlupdate->execute();
        }
        if (isset($_POST["persontodelete"])) {
            $sqldelete = $connection->prepare("delete from ppl where personid = ?");
            $sqldelete->bind_param("i", $_POST["persontodelete"]);
            $sqldelete->execute();
        }
    }

    ?>

    <?php
    $userid = "";
    $country = "";
    $firstname = "";
    $lastname = "";
    $age = "";
    if (isset($_POST["persontoedit"])) {
        // first, het the existing data for this person
        print ("we will edit an existing person");
        $sqlselect = $connection->prepare("select * from ppl where personid =?");
        $sqlselect->bind_param("i", $_POST["persontoedit"]);
        $sqlselect->execute();
        $result = $sqlselect->get_result();
        $mypersontoedit = $result->fetch_assoc();
        $country = $mypersontoedit["countryid"];
        $firstname = $mypersontoedit["firstname"];
        $lastname = $mypersontoedit["lastname"];
        $age = $mypersontoedit["age"];
        $userid = $mypersontoedit["personid"];
    } else {
        print ("new person");
    }
    ?>

    <form method="POST">
        <input type="hidden" value="<?= $userid ?>" name="personid">
        <select name="Countryoforigin">
            <?php
            $sqlselect = $connection->prepare("select * from Countries");
            $sqlselect->execute();
            $result = $sqlselect->get_result();
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value="<?= $row["countryid"]; ?>" <?php
                  if ($row["countryid"] == $row["countryid"])
                      print ("selected")
                          ?>>
                    <?= $row["countryname"]; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <input type="text" placeholder="Firstname" name="firstname" required value="<?= $firstname ?>">
        <input type="text" placeholder="Lastname" name="lastname" required value="<?= $lastname ?>">
        <input type="number" placeholder="age" name="age" required value="<?= $age ?>">
        <input type="submit" value="save">
    </form>

    <h1>This is the full list of people in our database:</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>countries</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>age</th>
        </tr>
    </table>

    <?php
    $sqlselect = $connection->prepare("select * from ppl");
    $sqlselect->execute();
    $result = $sqlselect->get_result();
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td>
                <?= $row["personid"] ?>
            </td>
            <td>
                <?= $row["countryid"] ?>
            </td>
            <td>
                <?= $row["firstname"] ?>
            </td>
            <td>
                <?= $row["lastname"] ?>
            </td>
            <td>
                <?= $row["age"] ?>
            </td>

            <td>
                <form method="post">
                    <input type="hidden" name="persontodelete" value="<?= $row["personid"] ?>">
                    <input type="submit" value="delete">
            </td>
            </form>
            <td>
                <form method="post">
                    <input type="hidden" name="persontoedit" value="<?= $row["personid"] ?>">
                    <input type="submit" value="edit">
            </td>
            </form>
        </tr>
        <?php
    }
    ?>

</body>

</html>